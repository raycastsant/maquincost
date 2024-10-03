<?php
App::uses('AppController', 'Controller');
/**
 * Ordenes Controller
 *
 * @property Ordene $Ordene
 */
class OrdenesController extends AppController 
{
    var $uses = array('Ordene', 'Pieza', 'Planmensualregistro', 'Cartastecnologica', 'Operario', 'Tipotrabajo', 'Ordenreal');  
/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Ordene->recursive = 1;
        $this->paginate = array('limit'=>7, 'order'=>'Ordene.numero');
        $paginatorData = $this->paginate();
        
        $i = 0;
        foreach ($paginatorData as $pag): 
        {
            $piezaData = $this->Pieza->read(null, $pag['Planmensualregistro']['pieza_id']);
            $pag['Pieza']['nombre'] = $piezaData['Pieza']['nombre'];
            $ordenes[$i] = $pag;
            $i++;
        }
        endforeach;
        
		$this->set('ordenes', $ordenes);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ordene->id = $id;
		if (!$this->Ordene->exists()) {
			throw new NotFoundException(__('Invalid ordene'));
		}
		$this->set('ordene', $this->Ordene->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($pieza_id=null) 
    {
		if ($this->request->is('post')) 
        {          
            /*$dataSource = $this->Planmensualregistro->getDataSource();
            $dataSource->begin(); //Transactions
            try
            {*/
                $this->Planmensualregistro->create();
                $registroData['Planmensualregistro']['planesmensuale_id'] = $this->PLAN_MENSUAL_NO_PLAN_REG;
                $registroData['Planmensualregistro']['pieza_id'] = $this->request->data['Ordene']['pieza_id'];
                $registroData['Planmensualregistro']['materiale_id'] = $this->request->data['Ordene']['materiale_id'];
                $registroData['Planmensualregistro']['planificada'] = 0;
                
                if($this->Planmensualregistro->save($registroData))
                {  
                    $this->request->data['Ordene']['planmensualregistro_id'] = $this->Planmensualregistro->id;
                    
                    if ($this->Ordene->save($this->request->data)) 
                    {
                        $date = date("Y-m-d");
                        $this->Ordenreal->create();
                        $ordenRealData['Ordenreal']['ordene_id'] = $this->Ordene->id;
                        $ordenRealData['Ordenreal']['tipotrabajo_id'] = $this->request->data['Ordene']['tipotrabajo_id'];
                        $ordenRealData['Ordenreal']['materiale_id'] = $this->request->data['Ordene']['materiale_id'];
                        $ordenRealData['Ordenreal']['piezas_elaboradas'] = 0;
                        $ordenRealData['Ordenreal']['gasto_materiales'] = 0;
                        $ordenRealData['Ordenreal']['fecha_inicio'] = $date;
                        $ordenRealData['Ordenreal']['fecha_fin'] = $date;
                        $ordenRealData['Ordenreal']['hora_inicio'] = '00:00:00';
                        $ordenRealData['Ordenreal']['hora_fin'] = '00:00:00';
                        $ordenRealData['Ordenreal']['consumo_salario'] = 0;
                        $ordenRealData['Ordenreal']['cerrada'] = 0;
                        
                        if(!$this->Ordenreal->save($ordenRealData))
                         $this->Session->showMessage('Error al crear la orden de trabajo', $this->MSG_ERROR);
                        else
                        { 
            				$this->Session->showMessage('La orden ha sido emitida correctamente', $this->MSG_SUCCESS);
            				$this->redirect(array('action'=>'edit', $this->Ordene->id));
                        }
        			}
                }
                
                $this->Session->showMessage('Error al emitir la orden', $this->MSG_ERROR);
          /*  }
            catch (Exception $e)
            {
               $dataSource->rollback();
               $this->Session->showMessage('Error al emitir la orden', $this->MSG_ERROR);
            }		*/	
		}	
        
        $orden_number = $this->get_auto_number();
        $this->set('orden_number', $orden_number);
        
        if(is_null($pieza_id))
        {
            $piezas = $this->Pieza->find('list', array('order'=>'Pieza.nombre'));
            $this->set(compact('piezas'));
        }
        else
        {
            $this->Pieza->id = $pieza_id;
		    if($this->Pieza->exists())
            {
              $pieza = $this->Pieza->find('first', array('conditions'=>array('Pieza.id'=>$pieza_id)));
              $this->set('pieza_nombre', $pieza['Pieza']['nombre']);
            }
            else
            {
                $pieza_id = null;
                $piezas = $this->Pieza->find('list', array('order'=>'Pieza.nombre'));
                $this->set(compact('piezas'));
            }
        }
        
        $this->set('pieza_id', $pieza_id);
        
        $materiales = $this->Planmensualregistro->Materiale->find('list', array('order'=>'Materiale.descripcion'));
		$this->set(compact('materiales'));
        
        $tipotrabajos = $this->Tipotrabajo->find('list', array('order'=>'Tipotrabajo.descripcion'));
		$this->set(compact('tipotrabajos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $planMensualId=null) 
    {
		$this->Ordene->id = $id;
		if (!$this->Ordene->exists()) {
			throw new NotFoundException(__('Invalid ordene'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Ordene->save($this->request->data)) 
            {
                $this->Planmensualregistro->id = $this->request->data['Ordene']['planmensualregistro_id'];
                $this->Planmensualregistro->saveField('cantpiezas', $this->request->data['Ordene']['cant_piezas']);
                $this->Planmensualregistro->saveField('materiale_id', $this->request->data['Planmensualregistro']['materiale_id']);
                
                $res = $this->calcular_costo_pieza($id);
                if(!is_null($res))
                {
                    $this->Ordene->saveField('salario_plan', $res['salario']);
                    $this->Ordene->saveField('costo_pieza', $res['costo']);
                    $laboriosidad = ($res['tiempott'] * $this->request->data['Ordene']['cant_piezas']);
                    $this->Ordene->saveField('laboriosidad', $laboriosidad);
                }
                
				$this->Session->showMessage('La orden ha sido salvada correctamente', $this->MSG_SUCCESS);
                /*if(is_null($planMensualId))
                 $this->redirect(array('action'=>'index'));
                else 
				 $this->redirect(array('controller'=>'planesmensuales', 'action'=>'edit', $planMensualId));*/
                                
                $this->redirect(array('action'=>'edit', $id, $planMensualId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar la orden. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        //else 
        //{
			$this->request->data = $this->Ordene->read(null, $id);
		//}
        
        $this->Pieza->recursive = -1;
        $piezaData = $this->Pieza->read(null, $this->request->data['Planmensualregistro']['pieza_id']);
        $this->set('piezaData', $piezaData);
        
        $materiales = $this->Planmensualregistro->Materiale->find('list', array('order'=>'Materiale.descripcion'));
		$this->set(compact('materiales'));
        
        $this->Cartastecnologica->recursive = 0;
        $cartas = $this->Cartastecnologica->find('all', array('conditions'=>array('Cartastecnologica.pieza_id'=>$piezaData['Pieza']['id'])));
        $this->set('cartas', $cartas);
        
        $operarios = $this->Operario->find('list');
		$this->set(compact('operarios'));
        
        $tipotrabajos = $this->Tipotrabajo->find('list', array('order'=>'Tipotrabajo.descripcion'));
		$this->set(compact('tipotrabajos'));
        
        //$this->set('planMensualRegistroId', $planMensualRegistroId);
        
		/*$planmensualregistros = $this->Ordene->Planmensualregistro->find('list');
		$this->set(compact('planmensualregistros'));*/
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) 
    {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Ordene->id = $id;
		if (!$this->Ordene->exists()) {
			throw new NotFoundException(__('Orden no válida'));
		}
		if ($this->Ordene->delete()) {
            $this->Session->showMessage('La orden ha sido eliminada correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar la orden', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** Devuelve lso operarios que están relacionados
        con la orden planificada pasada porparámetros.
        Renderea el rsultado en el element orden_plan_operarios */
    public function getOrdenesPlanOperarios_AJAX($ordenId)
    {
        $this->Ordene->recursive = -1;
        $operarios = $this->Ordene->query("select operarios.*, calificacionoperarios.*, ordenesplanoperarios.id, ordenesplanoperarios.horas, 
                              ordenesplanoperarios.tarifa, ordenesplanoperarios.fecha_inicio, ordenesplanoperarios.fecha_terminacion, ordenesplanoperarios.otros_tiempos 
                              from ((ordenes inner join ordenesplanoperarios on ordenes.id=ordenesplanoperarios.ordene_id)
                              inner join operarios on ordenesplanoperarios.operario_id=operarios.id) inner join calificacionoperarios 
                              on operarios.calificacionoperario_id=calificacionoperarios.id where ordenes.id=".$ordenId." 
                              order by operarios.nombre");
                              
        $this->set('operarios', $operarios);
        $this->set('ordenId', $ordenId);
        
        $this->layout = 'ajax';
		$this->render('/Elements/orden_plan_operarios', 'ajax');
    }
    
    /** Calcula el costo de una pieza según metodología.
        Devuelve un arreglo con el gasto de salario y el costo de la pieza*/
    public function calcular_costo_pieza($ordenId)
    {
        $result = null;
        
        $this->Ordene->recursive = -1;
        /*$sql = "select calificacionoperarios.tarifa, sum(ctregistros.tiempo_corte+ctregistros.tiempo_auxiliar)/60 as tiempo 
                from ((((cartastecnologicas inner join ctregistros on cartastecnologicas.id=ctregistros.cartastecnologica_id)
                inner join cartasordenes on cartastecnologicas.id=cartasordenes.cartastecnologica_id) inner join 
                ordenesplanoperarios on cartasordenes.id=ordenesplanoperarios.cartasordene_id) inner join operarios on
                ordenesplanoperarios.operario_id=operarios.id) inner join calificacionoperarios on 
                operarios.calificacionoperario_id=calificacionoperarios.id 
                where ordenesplanoperarios.ordene_id=".$ordenId." group by calificacionoperarios.tarifa order by operarios.nombre";*/
                
        /*$sql = "select sum(ordenesplanoperarios.tarifa*(ordenesplanoperarios.horas+ordenesplanoperarios.otros_tiempos)) as importe 
                from ordenesplanoperarios 
                where ordenesplanoperarios.ordene_id=".$ordenId;*/
                                
        $sql = "select ordenesplanoperarios.tarifa, sum(ordenesplanoperarios.horas+ordenesplanoperarios.otros_tiempos) as tiempos 
                from ordenesplanoperarios 
                where ordenesplanoperarios.ordene_id=".$ordenId. " group by ordenesplanoperarios.id";                
        $importeTotalHoras = $this->Ordene->query($sql);   //Paso 1 - 3
                
        $ordenData = $this->Ordene->findById($ordenId);    
        if(count($importeTotalHoras)>0 && count($ordenData)>0)
        {
            $importe = 0;
            $tiempoTT = 0;
            
            foreach($importeTotalHoras as $ith):
            {
                $tiempo = $ith['0']['tiempos'];
                $imp = ($ith['ordenesplanoperarios']['tarifa'] * $tiempo);
                $importe += $imp;
                $tiempoTT += $tiempo;
            }
            endforeach;
            
            $proyecto = ($ordenData['Ordene']['tarifa_proyectista']*$ordenData['Ordene']['tiempo_proyecto']);
            $tecnologia = ($ordenData['Ordene']['tarifa_tecnologo']*$ordenData['Ordene']['tiempo_tecnologia']);
            
            $paso5 = $proyecto + $tecnologia + $importe;    //Paso 4 - 5
            
            $sql = "select sum(maquinas.coef_pieza) as sumcoef 
                    from ((ordenesplanoperarios inner join cartasordenes on cartasordenes.id=ordenesplanoperarios.cartasordene_id)
                    inner join cartastecnologicas on cartastecnologicas.id=cartasordenes.cartastecnologica_id) inner join
                    maquinas on cartastecnologicas.maquina_id=maquinas.id
                    where ordenesplanoperarios.ordene_id=".$ordenId;
            $sumaCoefMaq = $this->Ordene->query($sql);     //Paso 6
            
            $paso7 = $paso5*$sumaCoefMaq[0][0]['sumcoef'];
             
            $peso = ($ordenData['Ordene']['peso_pieza'] / 1000);   // de Kg a Toneladas
            $costo = ($peso * $ordenData['Ordene']['precio_material']) + $paso7;
            
            $result = array('salario'=>$paso5, 'costo'=>$costo, 'tiempott'=>$tiempoTT);
        }
                        
        return $result;
    }
    
    /** Actualiza los gastos de la orden via AJAX*/
    public function updateOrdenGastos_AJAX($ordenId, $cantPiezas, $peso, $precio=0)
    {
        $res = $this->calcular_costo_pieza($ordenId);
        
        if(!is_null($res))
        {
            $this->Ordene->id = $ordenId;
            $this->Ordene->saveField('salario_plan', $res['salario']);
            $this->Ordene->saveField('costo_pieza', $res['costo']);   
            $laboriosidad = ($res['tiempott'] * $cantPiezas);
            $this->Ordene->saveField('laboriosidad', $laboriosidad); 
        }
        
        $this->set('res', $res);
        $this->set('cantPiezas', $cantPiezas);
        $costo_total_mat_prim = (($precio * $peso) * $cantPiezas);
        $this->set('costo_total_mat_prim', $costo_total_mat_prim);
        
        $this->layout = 'ajax';
		$this->render('/Elements/orden_gastos', 'ajax');
    }
    
    /** Obtiene el valor de la laboriosidad*/
    public function getLaboriosidad_AJAX($ordenId)
    {   
        $this->Ordene->recursive = -1;
        $data = $this->Ordene->read(null, $ordenId);
        
        $laboriosidad = $data['Ordene']['laboriosidad'];
                 
        $this->set('value', $laboriosidad); 
        
        $this->layout = 'ajax';
        $this->render('/Elements/ajax_input','ajax');
    }
    
    /** Genera el concecutivo de la orden*/
    public function get_auto_number($m=null, $y=null)
    {
        $result = "";
        
        $this->Ordene->recursive = 0;
        $options['fields'] = array('numero');
        $options['order'] = array('numero DESC');
        
        if(!is_null($m) && !is_null($y))
        {
            $options['joins'] = array
            (
                array('table' => 'planmensualregistros', 'type'=>'INNER',
                      'conditions'=> array('Ordene.planmensualregistro_id = planmensualregistros.id')),
                array('table' => 'planesmensuales', 'type'=>'INNER',
                      'conditions'=> array('planmensualregistros.planesmensuale_id = planesmensuales.id'))
            );
            
            $options['conditions'] = array('planesmensuales.anno'=>$y, 'planesmensuales.mes'=>$m);
        }
        
        $orden = $this->Ordene->find('first', $options);
 
        if(is_array($orden) && array_key_exists('Ordene', $orden))
        {
          $number = $orden['Ordene']['numero'];
          $result = $number;
          
          if(strlen($number) === 11)
          {
            $oldlast = substr($number, 8, 11);
            if(is_numeric((int)$oldlast))
            {
                $last = sprintf("%03d", ($oldlast+1));
                
                if(!is_null($m) && !is_null($y))
                {
                    $m = sprintf("%02d", $m);
                    $result = $y.".".$m.".".$last;
                }
                else
                {
                   $result = substr($number, 0, 8).$last;   
                } 
                
                //$number = str_replace($oldlast, $last, $number);
                //$orden['number'] = $number;
                
                /*$anno = date("Y");
                $mes = date("m");
                $dia = date("d");
                $fechaiso = sprintf ("%04d/%02d/%02d", $anno, $mes, $dia);
                $orden['$fechaiso'] = $fechaiso;*/
            } 
          }
        } 
        else
        {
            if(is_null($m))
             $m = date("m");
             
            if(is_null($y)) 
             $y = date("y");
             
            $m = sprintf("%02d", $m);
              
            $result = $y.".".$m.".001";
        }
        
        //echo "<br /><br /><br />".$oldlast;
        
        return $result;
    }
}