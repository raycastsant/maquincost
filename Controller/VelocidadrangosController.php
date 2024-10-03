<?php
App::uses('AppController', 'Controller');
/**
 * Velocidadrangos Controller
 *
 * @property Velocidadrango $Velocidadrango
 */
class VelocidadrangosController extends AppController 
{
    var $uses = array('Velocidadrango', 'Maquina', 'Tipooperacione', 'Tiposmateriale', 'Vpcamaterialeselementoscortante', 'Avance', 'Velocidade', 'Profcorte');   
/**
 * index method
 *
 * @return void
 */
	public function index($maquinaId) 
    {
		//$this->Velocidadrango->recursive = 0;
		//$this->set('velocidadrangos', $this->paginate());
        
        $this->Maquina->recursive = 0;
        $machine = $this->Maquina->read(null, $maquinaId);
        $this->set('rangos', $this->getRangosFromMachine($maquinaId));
        $this->set('maquinaid', $maquinaId);
        $this->set('maquinanombre', $machine['Maquina']['nombre']);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Velocidadrango->id = $id;
		if (!$this->Velocidadrango->exists()) {
			throw new NotFoundException(__('Invalid velocidadrango'));
		}
		$this->set('velocidadrango', $this->Velocidadrango->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($maquinaId, $maquinaNombre) 
    {
		if ($this->request->is('post')) 
        {
			$this->Velocidadrango->create();
			if ($this->Velocidadrango->save($this->request->data)) 
            {
				$this->Session->showMessage('El rango de velocidad ha sido guardado correctamente', $this->MSG_SUCCESS);
				//$this->redirect(array('controller'=>'maquinas', 'action'=>'edit', $maquinaId));
                $this->redirect(array('action'=>'index', $maquinaId));
			} 
            else {
				$this->Session->showMessage('No se pudo salvar el velocidadrango. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		$maquinas = $this->Velocidadrango->Maquina->find('list');
		$this->set(compact('maquinas'));
        $this->set('maquinaid', $maquinaId);
        $this->set('maquinanombre', $maquinaNombre);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $maquinaId, $maquinaNombre) 
    {
		$this->Velocidadrango->id = $id;
		if (!$this->Velocidadrango->exists()) {
			throw new NotFoundException(__('Invalid velocidadrango'));
		}
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Velocidadrango->save($this->request->data)) 
            {
				$this->Session->showMessage('El rango ha sido salvado', $this->MSG_SUCCESS);
			//	$this->redirect(array('controller'=>'maquinas', 'action'=>'edit', $maquinaId));
                $this->redirect(array('action'=>'index', $maquinaId));
			} 
            else {
				$this->Session->showMessage('No se pudo salvar el rango. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else
        {
			$this->request->data = $this->Velocidadrango->read(null, $id);
		}
        
		$maquinas = $this->Velocidadrango->Maquina->find('list');
		$this->set(compact('maquinas'));
        $this->set('maquinaid', $maquinaId);
        $this->set('maquinanombre', $maquinaNombre);
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id=null, $maquinaId) 
    {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
        
		$this->Velocidadrango->id = $id;
		if (!$this->Velocidadrango->exists()) {
			throw new NotFoundException(__('Invalid velocidadrango'));
		}
		if ($this->Velocidadrango->delete()) {
            $this->Session->showMessage('El rango ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action'=>'index', $maquinaId));
		}
		$this->Session->showMessage('No se pudo eliminar el velocidadrango', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** 
    Devuelve los rangos de velocidad de una 
    maquina determinada*/
    private function getRangosFromMachine($machineId)
    {
       //$options['fields'] = array('id', 'nombre');
       $options['conditions'] = array('maquina_id' => $machineId);
       $options['order'] = array('vel_max');
       
       $this->Velocidadrango->recursive = -1;
       $result = $this->Velocidadrango->find('all', $options);
       
       return $result;
    }
    
    /**
    Cargar el element que muestra los datos de velocidad, 
    avance y profundidad de corte para el rango seleccionado*/
    public function getDataFromRangosAJAX($rangoId, $maquinaid)
    {
        if ($this->request->is('post'))
        {
            $this->Velocidadrango->recursive = -1;
            $this->set('rango', $this->Velocidadrango->read(null, $rangoId));
            $this->set('maquinaid', $maquinaid);
            
            $this->layout = 'ajax';
            $this->render('/Elements/maquina_rangos_element','ajax');
        }
    }
    
    private function getRecomendedVPCA($field_min_name, $field_max_name, $elementoId, $operacionId, $tipoMaterialId)
    {
        $options['fields'] = array('Vpcamaterialeselementoscortante.'.$field_min_name, 'Vpcamaterialeselementoscortante.'.$field_max_name);
        $options['joins'] = array(
                                    array('table'=>'tiposmateriales','type'=>'INNER',
                                          'conditions'=>'Vpcamaterialeselementoscortante.tiposmateriale_id=tiposmateriales.id'),
                                    array('table'=>'elementocortanteoperaciones','type'=>'INNER',
                                          'conditions'=>'Vpcamaterialeselementoscortante.elementocortanteoperacione_id=elementocortanteoperaciones.id')
                                   );
		
        $options['conditions'] = array('elementocortanteoperaciones.elementoscortante_id'=>$elementoId, 
                                       'elementocortanteoperaciones.operacione_id'=>$operacionId, 
                                       'tiposmateriales.id'=>$tipoMaterialId);
        
        $this->Vpcamaterialeselementoscortante->recursive = -1;
        $result = $this->Vpcamaterialeselementoscortante->find('all', $options); 
        
        return $result;
    }
    
    /** 
     * Obtiene los avances recomendados para el elemento cortante,
       operacion, tipo de operacion, tipo de material y maquina utilizados */
    public function getRecomendedAvances($elementoId, $tipoMaterialId, $operacionId, $tipoOperacion, $maquinaId)
    {       
        $mesg = "";
        $mesgHead = "";
        $errorFlag = "0";
        
        $tipoMaterial = $this->Tiposmateriale->read(null, $tipoMaterialId);
        if($tipoMaterial['Tiposmateriale']['nombre'] === $this->UNDEFINED_MATERIAL_NAME)
        {
            $mesg = "El tipo de material para el material seleccionado de la base de datos de productos del inventario está INDEFINIDO.
                     Establezca el tipo de material correspondiente para mostrar los avances recomendados.";
            $mesgHead = "Error";
            $errorFlag = "1"; 
        }
        
       //Primero se busca el rango de avance min-max para el elemento cortante-tipo de material-operacion-tipo de operacion
        if($errorFlag === '0')
        {
            $tipoOp = $this->Tipooperacione->read(null, $tipoOperacion);
            $field_min_name = null;
            $field_max_name = null;
            
            if($tipoOp['Tipooperacione']['nombre'] === $this->TIPO_OPERACION_AFINADO)
            {
                $field_min_name = "av_min_afinar";
                $field_max_name = "av_max_afinar"; 
            }
            else
            if($tipoOp['Tipooperacione']['nombre'] === $this->TIPO_OPERACION_DESBASTE)
            {
                $field_min_name = "av_min_desbaste";
                $field_max_name = "av_max_desbaste"; 
            }
            else
            if($tipoOp['Tipooperacione']['nombre'] === $this->TIPO_OPERACION_VIRUTA)
            {
                $field_min_name = "av_min_viruta";
                $field_max_name = "av_max_viruta"; 
            }
            else
            {
               $mesg = "No se encontró el tipo de operación. Consulte al Admiistrador del sistema.";
               $mesgHead = "Error";
               $errorFlag = "1"; 
            }
        }
        
        if($errorFlag === '0')
        {
            /*$options['fields'] = array('Vpcamaterialeselementoscortante.'.$field_min_name, 'Vpcamaterialeselementoscortante.'.$field_max_name);
            $options['joins'] = array(
                                        array('table'=>'tiposmateriales','type'=>'INNER',
                                              'conditions'=>'Vpcamaterialeselementoscortante.tiposmateriale_id=tiposmateriales.id'),
                                        array('table'=>'elementocortanteoperaciones','type'=>'INNER',
                                              'conditions'=>'Vpcamaterialeselementoscortante.elementocortanteoperacione_id=elementocortanteoperaciones.id')
                                       );
    		
            $options['conditions'] = array('elementocortanteoperaciones.elementoscortante_id'=>$elementoId, 
                                           'elementocortanteoperaciones.operacione_id'=>$operacionId, 
                                           'tiposmateriales.id'=>$tipoMaterialId);
            
            $this->Vpcamaterialeselementoscortante->recursive = -1;
            $result = $this->Vpcamaterialeselementoscortante->find('all', $options); 	*/
            
            $result = $this->getRecomendedVPCA($field_min_name, $field_max_name, $elementoId, $operacionId, $tipoMaterialId);

            if(count($result) > 0)
            {
               //Con el rango de avance obtenido, se buscan los avances soportados 
               //por la maquina y que se encuentran en el rango obtenido
                /* $options['conditions'] = array('Avance.avance >=' => $result[0]['Vpcamaterialeselementoscortante']['av_min_afinar'], 
                                                'Avance.avance >=' => $result[0]['Vpcamaterialeselementoscortante']['av_max_afinar']);*/
                 $this->Avance->recursive = 1;
                 $sql = "select avance, selectores.nombre, velocidadrangos.nombre, velocidadrangos.vel_min, velocidadrangos.vel_max 
                         from (avances inner join selectores on avances.selectore_id=selectores.id) inner join velocidadrangos on 
                         selectores.velocidadrango_id=velocidadrangos.id
                         where avance>=".$result[0]['Vpcamaterialeselementoscortante'][$field_min_name]." 
                         and avance<=".$result[0]['Vpcamaterialeselementoscortante'][$field_max_name]." and maquina_id=".$maquinaId."
                         order by velocidadrangos.vel_min, selectores.nombre, avance";
                 $valuesTemp = $this->Avance->query($sql);
                 
                 if(count($valuesTemp) > 0)   
                 {
                   //Reorganizo el arreglo para que sea más facil de al mostrar los resultados
                    foreach($valuesTemp as $value):
                    {
                        $rangoNombre = $value['velocidadrangos']['nombre'].' '.$value['velocidadrangos']['vel_min'].' - '.$value['velocidadrangos']['vel_max'].' (rpm)';
                        $selector = $value['selectores']['nombre'];
                        
                        $values[$rangoNombre][$selector][] = $value['avances']['avance'];
                    }
                    endforeach;
                    
                    $this->set('values', $values);
                 } 
                 else
                 {
                    $mesg = "No se encontraron valores de avance en el rango ".$result[0]['Vpcamaterialeselementoscortante'][$field_min_name]."-".$result[0]['Vpcamaterialeselementoscortante'][$field_max_name];
                    $mesgHead = "Información";
                    $errorFlag = "1"; 
                 }  
            }
            else
            {
                $mesg = "No se encontraron valores para el elemento cortante, operación y tipo de material seleccionados";
                $mesgHead = "Error";
                $errorFlag = "1"; 
            }
        }
        
        $this->set('mesg', $mesg);
        $this->set('mesgHead', $mesgHead);
        $this->set('errorFlag', $errorFlag);

		$this->layout = 'ajax';
		$this->render('/Elements/dialog_avances_table', 'ajax');
    }
    
    /** 
     * Obtiene las velocidades recomendadas para el elemento cortante,
       operacion, tipo de operacion, tipo de material y maquina utilizados */
    public function getRecomendedVelocidades($elementoId, $tipoMaterialId, $operacionId, $tipoOperacion, $maquinaId)
    {       
        $mesg = "";
        $mesgHead = "";
        $errorFlag = "0";
        
        $tipoMaterial = $this->Tiposmateriale->read(null, $tipoMaterialId);
        if($tipoMaterial['Tiposmateriale']['nombre'] === $this->UNDEFINED_MATERIAL_NAME)
        {
            $mesg = "El tipo de material para el material seleccionado de la base de datos de productos del inventario está INDEFINIDO.
                     Establezca el tipo de material correspondiente para mostrar las velocidades recomendadas.";
            $mesgHead = "Error";
            $errorFlag = "1"; 
        }
        
       //Primero se busca el rango de velocidad min-max para el elemento cortante-tipo de material-operacion-tipo de operacion
        if($errorFlag === '0')
        {
            $tipoOp = $this->Tipooperacione->read(null, $tipoOperacion);
            $field_min_name = null;
            $field_max_name = null;
            
            if($tipoOp['Tipooperacione']['nombre'] === $this->TIPO_OPERACION_AFINADO)
            {
                $field_min_name = "vel_min_afinar";
                $field_max_name = "vel_max_afinar"; 
            }
            else
            if($tipoOp['Tipooperacione']['nombre'] === $this->TIPO_OPERACION_DESBASTE)
            {
                $field_min_name = "vel_min_desbaste";
                $field_max_name = "vel_max_desbaste"; 
            }
            else
            if($tipoOp['Tipooperacione']['nombre'] === $this->TIPO_OPERACION_VIRUTA)
            {
                $field_min_name = "vel_min_viruta";
                $field_max_name = "vel_max_viruta"; 
            }
            else
            {
               $mesg = "No se encontró el tipo de operación. Consulte al Admiistrador del sistema.";
               $mesgHead = "Error";
               $errorFlag = "1"; 
            }
        }
        
        if($errorFlag === '0')
        {            
            $result = $this->getRecomendedVPCA($field_min_name, $field_max_name, $elementoId, $operacionId, $tipoMaterialId);
            
            if(count($result) > 0)
            {
               //Con el rango de velocidad obtenido, se buscan las velocidades soportadas 
               //por la maquina y que se encuentran en el rango obtenido
                $this->Velocidade->recursive = 1;
                $sql = "select velocidad, velocidadrangos.nombre, velocidadrangos.vel_min, velocidadrangos.vel_max 
                         from velocidades inner join velocidadrangos on velocidades.velocidadrango_id=velocidadrangos.id
                         where velocidad>=".$result[0]['Vpcamaterialeselementoscortante'][$field_min_name]." 
                         and velocidad<=".$result[0]['Vpcamaterialeselementoscortante'][$field_max_name]." and maquina_id=".$maquinaId."
                         order by velocidadrangos.vel_min, velocidad";
                 $valuesTemp = $this->Velocidade->query($sql);
                 
                 if(count($valuesTemp) > 0)   
                 {
                   //Reorganizo el arreglo para que sea más facil al mostrar los resultados
                    foreach($valuesTemp as $value):
                    {
                        $rangoNombre = $value['velocidadrangos']['nombre'].' '.$value['velocidadrangos']['vel_min'].' - '.$value['velocidadrangos']['vel_max'].' (rpm)';
                        $values[$rangoNombre][] = $value['velocidades']['velocidad'];
                    }
                    endforeach;
                    
                    $this->set('values', $values);
                 } 
                 else
                 {
                    $mesg = "No se encontraron valores de velocidad en el rango ".$result[0]['Vpcamaterialeselementoscortante'][$field_min_name]."-".$result[0]['Vpcamaterialeselementoscortante'][$field_max_name];
                    $mesgHead = "Información";
                    $errorFlag = "1"; 
                 } 
            }     
            else
            {
                $mesg = "No se encontraron valores para el elemento cortante, operación y tipo de material seleccionados";
                $mesgHead = "Error";
                $errorFlag = "1"; 
            }
        }
        
        $this->set('mesg', $mesg);
        $this->set('mesgHead', $mesgHead);
        $this->set('errorFlag', $errorFlag);

		$this->layout = 'ajax';
		$this->render('/Elements/dialog_velocidades_table', 'ajax');
    }
    
    /** 
     * Obtiene las profundidades de corte recomendadas para el elemento cortante,
       operacion, tipo de operacion, tipo de material y maquina utilizados */
    public function getRecomendedProfCortes($elementoId, $tipoMaterialId, $operacionId, $tipoOperacion, $maquinaId)
    {       
        $mesg = "";
        $mesgHead = "";
        $errorFlag = "0";
        
        $tipoMaterial = $this->Tiposmateriale->read(null, $tipoMaterialId);
        if($tipoMaterial['Tiposmateriale']['nombre'] === $this->UNDEFINED_MATERIAL_NAME)
        {
            $mesg = "El tipo de material para el material seleccionado de la base de datos de productos del inventario está INDEFINIDO.
                     Establezca el tipo de material correspondiente para mostrar los avances recomendados.";
            $mesgHead = "Error";
            $errorFlag = "1"; 
        }
        
       //Primero se busca el rango de profundidad de corte min-max para el elemento cortante-tipo de material-operacion-tipo de operacion
        if($errorFlag === '0')
        {
            $tipoOp = $this->Tipooperacione->read(null, $tipoOperacion);
            $field_min_name = null;
            $field_max_name = null;
            
            if($tipoOp['Tipooperacione']['nombre'] === $this->TIPO_OPERACION_AFINADO)
            {
                $field_min_name = "pfc_min_afinar";
                $field_max_name = "pfc_max_afinar"; 
            }
            else
            if($tipoOp['Tipooperacione']['nombre'] === $this->TIPO_OPERACION_DESBASTE)
            {
                $field_min_name = "pfc_min_desbaste";
                $field_max_name = "pfc_max_desbaste"; 
            }
            else
            if($tipoOp['Tipooperacione']['nombre'] === $this->TIPO_OPERACION_VIRUTA)
            {
                $field_min_name = "pfc_min_viruta";
                $field_max_name = "pfc_max_viruta"; 
            }
            else
            {
               $mesg = "No se encontró el tipo de operación. Consulte al Admiistrador del sistema.";
               $mesgHead = "Error";
               $errorFlag = "1"; 
            }
        }
        
        if($errorFlag === '0')
        {           
            $result = $this->getRecomendedVPCA($field_min_name, $field_max_name, $elementoId, $operacionId, $tipoMaterialId);

            if(count($result) > 0)
            {
               //Con el rango de avance obtenido, se buscan las profundidades de corte soportadas 
               //por la maquina y que se encuentran en el rango obtenido
                 $this->Profcorte->recursive = 1;
                 $sql = "select profcorte, selectores.nombre, velocidadrangos.nombre, velocidadrangos.vel_min, velocidadrangos.vel_max 
                         from (profcortes inner join selectores on profcortes.selectore_id=selectores.id) inner join velocidadrangos on 
                         selectores.velocidadrango_id=velocidadrangos.id
                         where profcorte>=".$result[0]['Vpcamaterialeselementoscortante'][$field_min_name]." 
                         and profcorte<=".$result[0]['Vpcamaterialeselementoscortante'][$field_max_name]." and maquina_id=".$maquinaId."
                         order by velocidadrangos.vel_min, selectores.nombre, profcorte";
                 $valuesTemp = $this->Profcorte->query($sql);
                 
                 if(count($valuesTemp) > 0)   
                 {
                   //Reorganizo el arreglo para que sea más facil al mostrar los resultados
                    foreach($valuesTemp as $value):
                    {
                        $rangoNombre = $value['velocidadrangos']['nombre'].' '.$value['velocidadrangos']['vel_min'].' - '.$value['velocidadrangos']['vel_max'].' (rpm)';
                        $selector = $value['selectores']['nombre'];
                        
                        $values[$rangoNombre][$selector][] = $value['profcortes']['profcorte'];
                    }
                    endforeach;
                    
                    $this->set('values', $values);
                 } 
                 else
                 {
                    $mesg = "No se encontraron valores de profundidad de corte en el rango ".$result[0]['Vpcamaterialeselementoscortante'][$field_min_name]."-".$result[0]['Vpcamaterialeselementoscortante'][$field_max_name];
                    $mesgHead = "Información";
                    $errorFlag = "1"; 
                 }  
            }
            else
            {
                $mesg = "No se encontraron valores para el elemento cortante, operación y tipo de material seleccionados";
                $mesgHead = "Error";
                $errorFlag = "1"; 
            }
        }
        
        $this->set('mesg', $mesg);
        $this->set('mesgHead', $mesgHead);
        $this->set('errorFlag', $errorFlag);

		$this->layout = 'ajax';
		$this->render('/Elements/dialog_profcortes_table', 'ajax');
    }
}