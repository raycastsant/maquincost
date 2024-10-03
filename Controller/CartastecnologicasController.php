<?php
App::uses('AppController', 'Controller');
/**
 * Cartastecnologicas Controller
 *
 * @property Cartastecnologica $Cartastecnologica
 */
class CartastecnologicasController extends AppController 
{
    private $extPermitidas = array('image/jpeg', 'image/gif', 'image/png', 'application/octet-stream');

/**
 * index method
 *
 * @return void
 */
	public function index($cleanSession='0') 
    {
        if($cleanSession === '1')
        {
           $this->Session->delete('ct_index_options');
           $this->Session->delete('ct_filter_value1');
           $this->Session->delete('ct_filter_value2');
           $this->Session->delete('ct_filter_value');
           $this->Session->delete('ct_filter_field');
        }
         
        $this->paginate = array('limit'=>6, 'order'=>'Cartastecnologica.codigo');
        $field = 'Cartastecnologica.codigo';
        
        if ($this->request->is('post')) 
        {
            $field = $this->request->data['field'];
            if($field === 'Cartastecnologica.fecha_elaboracion')
            {
                $value1 = $this->request->data['value1'];
                $value2 = $this->request->data['value2'];
                $options = array('Cartastecnologica.fecha_elaboracion >='=>$value1, 'Cartastecnologica.fecha_elaboracion <='=>$value2);
                $this->set('value1', $value1);
                $this->set('value2', $value2);
                $this->Session->write('ct_filter_value1', $value1);
                $this->Session->write('ct_filter_value2', $value2);
            }
            else
            {
                $value = $this->request->data['value'];
                $options = array('lower('.$field.') LIKE' => '%'.strtolower($value).'%');
                $this->set('value', $value);
                $this->Session->write('ct_filter_value', $value);
            }
            
            $this->paginate = array('limit' => 6, 'order'=>'Cartastecnologica.codigo', 'conditions'=>$options);
            $this->Session->write('ct_index_options', $options);
            $this->Session->write('ct_filter_field', $field);
        }   
        else
        {
            $options = $this->Session->read('ct_index_options');
            if(!is_null($options))
             $this->paginate = array('limit'=>6, 'order'=>'Cartastecnologica.codigo', 'conditions'=>$options);
             
            $value = $this->Session->read('ct_filter_value');
            if(!is_null($value))
             $this->set('value', $value);
             
            $value1 = $this->Session->read('ct_filter_value1');
            if(!is_null($value1))
             $this->set('value1', $value1);
             
            $value2 = $this->Session->read('ct_filter_value2');
            if(!is_null($value2))
             $this->set('value2', $value2);
             
            $tfield = $this->Session->read('ct_filter_field');
            if(!is_null($tfield))
             $field = $tfield;
        }
         
		$this->Cartastecnologica->recursive = 0;
		$this->set('cartastecnologicas', $this->paginate());
        $this->set('field', $field);
	}
    
    public function index_pdf()
    {
        $this->Cartastecnologica->recursive = 0;
        
        $options = $this->Session->read('ct_index_options');
        if(!is_null($options))
         $cartastecnologicas = $this->Cartastecnologica->find('all', array('order'=>'Cartastecnologica.codigo', 'conditions'=>$options));
        else
         $cartastecnologicas = $this->Cartastecnologica->find('all', array('order'=>'Cartastecnologica.codigo'));
             
        $this->set('cartastecnologicas', $cartastecnologicas); 
        
        $params = array(
                'download' => false,
                'name' => 'ct_listado.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
        $this->set($params);
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($piezaId, $cartaId=null) 
    {
		//$this->Cartastecnologica->id = $id;
        
	/*	if (!$this->Cartastecnologica->exists()) {
			throw new NotFoundException(__('Invalid cartastecnologica'));
		}*/
        
        $this->Cartastecnologica->recursive = 0;
        
        if(is_null($cartaId))
         $cartas = $this->Cartastecnologica->find('all', array('conditions'=>array('pieza_id'=>$piezaId), 'order'=>array('Cartastecnologica.codigo')));
        else
         $cartas = $this->Cartastecnologica->find('all', array('conditions'=>array('Cartastecnologica.id'=>$cartaId))); 
         
		$this->set('cartas', $cartas);
        $this->set('piezaid', $piezaId);
        
        if(count($cartas) > 0)
         $this->setFormData($piezaId);
	}
    
    public function add_pieza_selector_form()
    {
        if ($this->request->is('post')) 
        {
           $this->redirect(array('action'=>'add', $this->request->data['Pieza']['pieza_id']));
        }
            
        $piezas = $this->Cartastecnologica->Pieza->find('list', array('order'=>'Pieza.nombre'));
        $this->set(compact('piezas'));
    }

/**
 * add method
 *
 * @return void
 */
	public function add($piezaId) 
    {
		if ($this->request->is('post')) 
        {
			$this->Cartastecnologica->create();
            
          //Ver si selecciono un aechivo imagen del plano
            if($this->data['Cartastecnologica']['file']['size'] > 0)
            {
                 $file = $this->data['Cartastecnologica']['file'];
                 if(in_array($file['type'], $this->extPermitidas))
                 {
                    if(!$this->uploadFile($file, APP.'webroot'.DS.'img'.DS.'planos'))
                    {
                        $this->Session->showMessage('<b>Ocurrió un error al subir el fichero de imagen.</b> Contacte al Administrador del sistema.', $this->MSG_ERROR);
                        $this->setFormData($piezaId);
                        
                        return;
                    }
                    else
                     $this->request->data['Cartastecnologica']['urlplano'] = $file['name'];
                 }
                 else
                 {
                    $this->Session->showMessage('No se reconoce el formato de la imagen seleccionada', $this->MSG_ERROR);
                    $this->setFormData($piezaId);
                    
				    return;
                 }
            }
            
            $msg = "";
            $this->Cartastecnologica->Maquina->id = $this->request->data['Cartastecnologica']['maquina_id'];
            if (!$this->Cartastecnologica->Maquina->exists()) 
            {
			     $msg = "La máquina seleccionada no existe.";
		    }
            
            $this->Cartastecnologica->Semiproductoforma->id = $this->request->data['Cartastecnologica']['semiproductoforma_id'];
            if (!$this->Cartastecnologica->Semiproductoforma->exists()) 
            {
			     $msg .= "<br />La forma seleccionada no existe.";
		    }
            
            if(strlen($msg) > 0)
            {
                $msg .= "<br />Inténtelo nuevamente.";
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->setFormData($piezaId);
                
                return;
            }
            
           //Guardando los datos 
			if ($this->Cartastecnologica->save($this->request->data)) 
            {
				$this->Session->showMessage('La carta tecnológica ha sido salvada correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'edit', $this->Cartastecnologica->id, $piezaId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar la carta tecnológica. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
        $this->setFormData($piezaId);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $piezaId=null) 
    {      
		$this->Cartastecnologica->id = $id;
        
        if(is_null($piezaId))
        {
            $cartaData = $this->Cartastecnologica->read(null, $id);
            $piezaId = $cartaData['Cartastecnologica']['pieza_id'];
        }
        
		if (!$this->Cartastecnologica->exists()) 
        {
			$this->redirect(array('action'=>'index'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
           //Ver si selecciono un aechivo imagen del plano
            if($this->data['Cartastecnologica']['file']['size'] > 0)
            {
                 $file = $this->data['Cartastecnologica']['file'];
                 if(in_array($file['type'], $this->extPermitidas))
                 {
                    if(!$this->uploadFile($file, APP.'webroot'.DS.'img'.DS.'planos'))
                    {
                        $this->Session->showMessage('<b>Ocurrió un error al subir el fichero de imagen.</b> Contacte al Administrador del sistema.', $this->MSG_ERROR);
                        $this->setFormData($piezaId, $id);
                        
                        return;
                    }
                    else
                     $this->request->data['Cartastecnologica']['urlplano'] = $file['name'];
                 }
                 else
                 {
                    $this->Session->showMessage('No se reconoce el formato de la imagen seleccionada', $this->MSG_ERROR);
                    $this->setFormData($piezaId, $id);
                    
				    return;
                 }
            }
            
            $msg = "";
            $this->Cartastecnologica->Maquina->id = $this->request->data['Cartastecnologica']['maquina_id'];
            if (!$this->Cartastecnologica->Maquina->exists()) 
            {
			     $msg = "La máquina seleccionada no existe.";
		    }
            
            $this->Cartastecnologica->Semiproductoforma->id = $this->request->data['Cartastecnologica']['semiproductoforma_id'];
            if (!$this->Cartastecnologica->Semiproductoforma->exists()) 
            {
			     $msg .= "<br />La forma seleccionada no existe.";
		    }
            
            if(strlen($msg) > 0)
            {
                $msg .= "<br />Inténtelo nuevamente.";
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->setFormData($piezaId, $id);
            }
            else
            {
               //Guardando los datos 
    			if ($this->Cartastecnologica->save($this->request->data)) 
                {
    				$this->Session->showMessage('La carta tecnológica ha sido salvada correctamente', $this->MSG_SUCCESS);
    				$this->redirect(array('action'=>'edit', $id, $piezaId));
    			}
                else 
                {
    				$this->Session->showMessage('No se pudo salvar la carta tecnológica. Inténtelo nuevamente', $this->MSG_ERROR);
                    $this->request->data = $this->Cartastecnologica->read(null, $id);
    			}
            }
		}
        else 
        {
			$this->request->data = $this->Cartastecnologica->read(null, $id);
		}
        
        $this->setFormData($piezaId, $id);
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id=null, $piezaId=null) 
    {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
        
		$this->Cartastecnologica->id = $id;
		if (!$this->Cartastecnologica->exists()) {
			throw new NotFoundException(__('Invalid cartastecnologica'));
		}
        
		if ($this->Cartastecnologica->delete()) {
            $this->Session->showMessage('La carta tecnológica ha sido eliminada correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action'=>'view', $piezaId));
		}
        
		$this->Session->showMessage('No se pudo eliminar el carta tecnológica', $this->MSG_ERROR);
		//$this->redirect(array('action' => 'index'));
	}
    
    private function setFormData($piezaId, $cartaId=null)
    {
        //$tauxliar = 0;
        //$tcorte = 0;
         
        $materiales = $this->Cartastecnologica->Materiale->find('list');
		$semiproductoformas = $this->Cartastecnologica->Semiproductoforma->find('list');
		$maquinas = $this->Cartastecnologica->Maquina->find('list');
		//$piezas = $this->Cartastecnologica->Pieza->find('list');
		$this->set(compact('materiales', 'semiproductoformas', 'maquinas'));
        $this->set("pieza", $this->Cartastecnologica->Pieza->read(null, $piezaId));
        
        if(!is_null($cartaId))
        {
            $cartaData = $this->getTiemposAndCtregistros($cartaId);
            $this->set("ctregistros", $cartaData['ctregistros']);
            $this->set("tcorte", $cartaData['tcorte']);
            $this->set("tauxiliar", $cartaData['tauxiliar']);
            
       /*     $this->Cartastecnologica->Ctregistro->recursive = 2;
            $sql = "select ctregistros.id, operaciones.nombre as operacion, tipooperaciones.nombre as tipooperacion, ctregistros.diametro_ini, 
                    ctregistros.diametro_fin, elementoscortantes.nombre as elementocortante, tipoelementoscortante.nombre as tipoelementocortante, 
                    instrumentosauxiliares.nombre as inst_auxiliar, instrumentosmedicions.nombre as inst_medicion, ctregistros.longitud_diametro, 
                    ctregistros.longitud, ctregistros.prof_corte, ctregistros.cantidad_pasadas, ctregistros.avance, ctregistros.velocidad, 
                    ctregistros.revoluciones, ctregistros.tiempo_corte, ctregistros.tiempo_auxiliar 
                    from (((((ctregistros inner join operaciones on ctregistros.operacione_id=operaciones.id) inner join 
                    tipooperaciones on ctregistros.tipooperacione_id=tipooperaciones.id) inner join elementoscortantes on
                    ctregistros.elementoscortante_id=elementoscortantes.id) inner join tipoelementoscortante on 
                    elementoscortantes.tipoelementoscortante_id=tipoelementoscortante.id) inner join instrumentosauxiliares on
                    ctregistros.instrumentosauxiliare_id=instrumentosauxiliares.id) inner join instrumentosmedicions on 
                    ctregistros.instrumentosmedicion_id=instrumentosmedicions.id 
                    where ctregistros.cartastecnologica_id=".$cartaId. " order by ctregistros.id";
            $ctregistros = $this->Cartastecnologica->Ctregistro->query($sql);
            $this->set("ctregistros", $ctregistros);
            
            $this->Cartastecnologica->Ctregistro->recursive = 0;
            $tiempos = $this->Cartastecnologica->Ctregistro->query("select sum(tiempo_corte) as tc, sum(tiempo_auxiliar) as ta 
                            from ctregistros where cartastecnologica_id=".$cartaId);
            
            if(!is_null($tiempos[0][0]['ta']))
             $tauxliar = $tiempos[0][0]['ta']; 
            
            if(!is_null($tiempos[0][0]['tc']))
             $tcorte = $tiempos[0][0]['tc']; */
        }
        
       // $this->set("tauxliar", $tauxliar);
       // $this->set("tcorte", $tcorte);
    }
    
    /** Devuelve los tiempos de corte y auxiliares, además de los
        registros de operación de la carta tecnológica pasada por parámetros*/
    public function getTiemposAndCtregistros($cartaId)
    {
        $tauxiliar = 0;
        $tcorte = 0;
        $result = array();
        
        if(!is_null($cartaId))
        {
            $this->Cartastecnologica->Ctregistro->recursive = 2;
            $sql = "select ctregistros.id, operaciones.nombre as operacion, tipooperaciones.nombre as tipooperacion, ctregistros.diametro_ini, 
                    ctregistros.diametro_fin, elementoscortantes.nombre as elementocortante, tipoelementoscortante.nombre as tipoelementocortante, 
                    instrumentosauxiliares.nombre as inst_auxiliar, instrumentosmedicions.nombre as inst_medicion, ctregistros.longitud_diametro, 
                    ctregistros.longitud, ctregistros.prof_corte, ctregistros.cantidad_pasadas, ctregistros.avance, ctregistros.velocidad, 
                    ctregistros.revoluciones, ctregistros.tiempo_corte, ctregistros.tiempo_auxiliar 
                    from (((((ctregistros inner join operaciones on ctregistros.operacione_id=operaciones.id) inner join 
                    tipooperaciones on ctregistros.tipooperacione_id=tipooperaciones.id) inner join elementoscortantes on
                    ctregistros.elementoscortante_id=elementoscortantes.id) inner join tipoelementoscortante on 
                    elementoscortantes.tipoelementoscortante_id=tipoelementoscortante.id) inner join instrumentosauxiliares on
                    ctregistros.instrumentosauxiliare_id=instrumentosauxiliares.id) inner join instrumentosmedicions on 
                    ctregistros.instrumentosmedicion_id=instrumentosmedicions.id 
                    where ctregistros.cartastecnologica_id=".$cartaId. " order by ctregistros.id";
            $ctregistros = $this->Cartastecnologica->Ctregistro->query($sql);
            $result['ctregistros'] = $ctregistros;
            
            $this->Cartastecnologica->Ctregistro->recursive = 0;
            $tiempos = $this->Cartastecnologica->Ctregistro->query("select sum(tiempo_corte) as tc, sum(tiempo_auxiliar) as ta 
                            from ctregistros where cartastecnologica_id=".$cartaId);
            
            if(!is_null($tiempos[0][0]['ta']))
             $tauxiliar = $tiempos[0][0]['ta']; 
            
            if(!is_null($tiempos[0][0]['tc']))
             $tcorte = $tiempos[0][0]['tc']; 
        }
        
        $result['tauxiliar'] = $tauxiliar;
        $result['tcorte'] = $tcorte;
        
        return $result;
    }
    
    /** Devuelve los tiempos de corte de las maquinas involucradas 
        en las cartas tecnologicas de una pieza*/ 
    public function get_tiempos_maquinado_pieza($piezaId, $ordenId)
    {
        $this->Cartastecnologica->Ctregistro->recursive = -1;
        $sql = "select cartastecnologicas.maquina_id, sum(ctregistros.tiempo_corte) as tcorte, sum(ctregistros.tiempo_auxiliar) as tauxiliar 
                from (cartastecnologicas inner join ctregistros on cartastecnologicas.id=ctregistros.cartastecnologica_id)
                inner join cartasordenes on cartastecnologicas.id=cartasordenes.cartastecnologica_id
                where cartastecnologicas.pieza_id=".$piezaId." and cartasordenes.ordene_id=".$ordenId." 
                group by cartastecnologicas.maquina_id";
        $data = $this->Cartastecnologica->Ctregistro->query($sql);
        
        return $data;
    }
    
     /** Devuelve los tiempos de corte de las maquinas involucradas 
        en las cartas tecnologicas de una pieza, y los renderea via AJAX
        en el element orden_plan_tiempos_maquinado */ 
    public function get_tiempos_maquinado_pieza_AJAX($piezaId, $ordenId)
    {
        $this->Cartastecnologica->Ctregistro->recursive = -1;
        $sql = "select maquinas.nombre, sum(ctregistros.tiempo_corte) as tcorte, sum(ctregistros.tiempo_auxiliar) as tauxiliar 
                from ((cartastecnologicas inner join ctregistros on cartastecnologicas.id=ctregistros.cartastecnologica_id)
                inner join cartasordenes on cartastecnologicas.id=cartasordenes.cartastecnologica_id) inner join 
                maquinas on cartastecnologicas.maquina_id=maquinas.id
                where cartastecnologicas.pieza_id=".$piezaId." and cartasordenes.ordene_id=".$ordenId." 
                group by maquinas.nombre order by maquinas.nombre";
        $tiempos = $this->Cartastecnologica->Ctregistro->query($sql);
        
        $this->set('tiempos', $tiempos);
        
        $this->layout = 'ajax';
		$this->render('/Elements/orden_plan_tiempos_maquinado', 'ajax');
    }
    
    /** Obtiene el listado de cartas tecnologicas pertenecientes 
        a la pieza pasada por parametros y renderea el resultado a traves del 
        element dialog_cartas_list */
    public function get_cartas_from_pieza($piezaId)
    {
        $this->Cartastecnologica->recursive = -1;
        $ct_list = $this->Cartastecnologica->find('all', array('conditions'=>array('Cartastecnologica.pieza_id'=>$piezaId)));
        
        $this->set('ct_list', $ct_list);
        
        $this->layout = 'ajax';
		$this->render('/Elements/dialog_cartas_list', 'ajax');
    }
    
 /** Obtiene 2 listado de cartas tecnologicas pertenecientes 
    a la pieza pasada por parametros. Un listado es el que se relaciona con las 
    ordenes planificadas y el otro es el que no está relacionado.
    El resultado se renderea a traves del element cartas_ordenes_plan.
    Si  $option no es nulo, entonces se verifica que sea una de las 2 opciones 
    (add o delete), para agregar o eliminar una relación en la tabla cartasordenes */
    public function get_cartas_from_pieza_ordenplan($piezaId, $ordenId, $option=null, $cartaId=null)
    {
       //Verificando si hay que actualizar alguna relación
        if(!is_null($option) && !is_null($cartaId))
        {
            if($option === 'add')
            {
                $this->Cartastecnologica->Cartasordene->create();
                $data['Cartasordene']['ordene_id'] = $ordenId;
                $data['Cartasordene']['cartastecnologica_id'] = $cartaId;
                $this->Cartastecnologica->Cartasordene->save($data);
            }
            else
            if($option === 'delete')
            {
                $this->Cartastecnologica->Cartasordene->query("delete from cartasordenes where ordene_id=".$ordenId." and cartastecnologica_id=".$cartaId);
            }
        }
                
       //Recuperando las cartas relacionadas con la orden
        $this->Cartastecnologica->recursive = -1; 
        $cartas_relacionadas = $this->Cartastecnologica->query("select Cartastecnologicas.*, maquinas.nombre from (Cartastecnologicas inner join 
            cartasordenes on Cartastecnologicas.id=cartasordenes.cartastecnologica_id) inner join maquinas on 
            Cartastecnologicas.maquina_id=maquinas.id
            where Cartastecnologicas.pieza_id=".$piezaId." and cartasordenes.ordene_id=".$ordenId);
            
        $cartaid_not_in_condition = "";
        if(count($cartas_relacionadas))
        {
            $cartaid_not_in_condition = " and Cartastecnologicas.id not in(";
            foreach($cartas_relacionadas as $cartaR):
            {
                $cartaid_not_in_condition .= $cartaR['Cartastecnologicas']['id'].",";
            }
            endforeach;
            
            $cartaid_not_in_condition = substr($cartaid_not_in_condition, 0, strlen($cartaid_not_in_condition)-1).")";
        }
       
       //Recuperando las cartas no relacionadas con la orden                 
        $cartas_no_relacionadas = $this->Cartastecnologica->query("select Cartastecnologicas.*, maquinas.nombre from Cartastecnologicas
            inner join maquinas on Cartastecnologicas.maquina_id=maquinas.id 
            where Cartastecnologicas.pieza_id=".$piezaId.$cartaid_not_in_condition);
        
        $this->set('cartas_relacionadas', $cartas_relacionadas);
        $this->set('cartas_no_relacionadas', $cartas_no_relacionadas);
        $this->set('piezaId', $piezaId);
        $this->set('ordenId', $ordenId);
        
        $this->layout = 'ajax';
		$this->render('/Elements/cartas_ordenes_plan', 'ajax');
    }
    
    /** Obtiene las horas de trabajo que contiene una carta tecnológica */
    public function get_horas_trabajo_carta_AJAX()
    {
        $cartaId = -1;
        
        if(array_key_exists('cartasordene_id', $this->request->data['Ordenesplanoperario']))
         $cartaId = $this->request->data['Ordenesplanoperario']['cartasordene_id'];
                  
        $this->Cartastecnologica->Ctregistro->recursive = -1;
        $sql = "select sum(ctregistros.tiempo_corte+ctregistros.tiempo_auxiliar) as minutos 
                from (cartastecnologicas inner join ctregistros on cartastecnologicas.id=ctregistros.cartastecnologica_id)
                inner join cartasordenes on cartastecnologicas.id=cartasordenes.cartastecnologica_id
                where cartasordenes.id=".$cartaId." group by cartastecnologicas.id";
        $minutos = $this->Cartastecnologica->Ctregistro->query($sql);
        
        $horasValue = 0;
        if(count($minutos) > 0)
         $horasValue = round(($minutos[0][0]['minutos'] / 60), 2);
         
        $this->set('value', $horasValue); 
        
        $this->layout = 'ajax';
        $this->render('/Elements/ajax_input','ajax');
    }
}