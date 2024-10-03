<?php
App::uses('AppController', 'Controller');
/**
 * Ordenesplanoperarios Controller
 *
 * @property Ordenesplanoperario $Ordenesplanoperario
 */
class OrdenesplanoperariosController extends AppController 
{

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ordenesplanoperario->recursive = 0;
		$this->set('ordenesplanoperarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ordenesplanoperario->id = $id;
		if (!$this->Ordenesplanoperario->exists()) {
			throw new NotFoundException(__('Invalid ordenesplanoperario'));
		}
		$this->set('ordenesplanoperario', $this->Ordenesplanoperario->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($ordenId) 
    {
		if ($this->request->is('post')) 
        {
			$this->Ordenesplanoperario->create();
			if ($this->Ordenesplanoperario->save($this->request->data)) 
            {
				$this->Session->showMessage('Los datos han sido salvados correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'ordenes', 'action'=>'edit', $ordenId));
			}
            else 
            {
				$this->Session->showMessage('No se pudieron salvar los datos. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
       //Buscando los registros de operarios que ya han sido planificados para la orden en cuestión
        $options['fields'] = array('Ordenesplanoperario.cartasordene_id');
        $options['conditions'] = array('Ordenesplanoperario.ordene_id'=>$ordenId);
        $ordenplanops = $this->Ordenesplanoperario->find('all', $options);
        $notin_condition = "";
        foreach($ordenplanops as $ordenplanop):
        {
            $notin_condition .= $ordenplanop['Ordenesplanoperario']['cartasordene_id'].",";
        }
        endforeach;
        
        if(strlen($notin_condition) > 0)
        {
          $notin_condition = " and cartasordenes.id not in(".substr($notin_condition, 0, strlen($notin_condition)-1).")";
        } 
        
       //Buscando las cartasOrdenes 
        $cartasordenesList = $this->Ordenesplanoperario->query("select cartasordenes.id, cartastecnologicas.codigo 
                            from (ordenes inner join cartasordenes on ordenes.id=cartasordenes.ordene_id)
                            inner join cartastecnologicas on cartasordenes.cartastecnologica_id=cartastecnologicas.id
                            where ordenes.id=".$ordenId.$notin_condition);
              
        if(count($cartasordenesList) > 0)
        {
            foreach($cartasordenesList as $col):
            {
               $cartasordenes[$col['cartasordenes']['id']] = $col['cartastecnologicas']['codigo']; 
            }
            endforeach;
            
            //$ordenes = $this->Ordenesplanoperario->Ordene->find('list');
    		$operarios = $this->Ordenesplanoperario->Operario->find('list');
    		$this->set(compact('operarios', 'cartasordenes'));
            $this->set('ordenId', $ordenId);
            $ordenData = $this->Ordenesplanoperario->Ordene->read(null, $ordenId);
            $this->set('ordennumero', $ordenData['Ordene']['numero']);
        }              
        else
        {
            $this->Session->showMessage('No es posible planificar horas de trabajo. Esto puede ser debido a que no exista 
                                         ninguna carta seleccionada en la orden, o que las que han sido seleccionadas 
                                         ya han sido planificadas.', $this->MSG_INFO);
			$this->redirect(array('controller'=>'ordenes', 'action'=>'edit', $ordenId));
        }
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $ordenId) 
    {
		$this->Ordenesplanoperario->id = $id;
		if (!$this->Ordenesplanoperario->exists()) {
			throw new NotFoundException(__('Invalid ordenesplanoperario'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Ordenesplanoperario->save($this->request->data)) 
            {
                $this->Session->showMessage('Los datos han sido salvados correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'ordenes', 'action'=>'edit', $ordenId));
			}
            else 
            {
				$this->Session->showMessage('No se pudieron salvar los datos. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Ordenesplanoperario->read(null, $id);
		}
        
	   //Buscando los registros de operarios que ya han sido planificados para la orden en cuestión
        $options['fields'] = array('Ordenesplanoperario.cartasordene_id');
        $options['conditions'] = array('Ordenesplanoperario.ordene_id'=>$ordenId, 'not'=>array('Ordenesplanoperario.id'=>$id));
        $ordenplanops = $this->Ordenesplanoperario->find('all', $options);
        $notin_condition = "";
        foreach($ordenplanops as $ordenplanop):
        {
            $notin_condition .= $ordenplanop['Ordenesplanoperario']['cartasordene_id'].",";
        }
        endforeach;
        
        if(strlen($notin_condition) > 0)
        {
          $notin_condition = " and cartasordenes.id not in(".substr($notin_condition, 0, strlen($notin_condition)-1).")";
        } 
        
       //Buscando las cartasOrdenes 
        $cartasordenesList = $this->Ordenesplanoperario->query("select cartasordenes.id, cartastecnologicas.codigo 
                            from (ordenes inner join cartasordenes on ordenes.id=cartasordenes.ordene_id)
                            inner join cartastecnologicas on cartasordenes.cartastecnologica_id=cartastecnologicas.id
                            where ordenes.id=".$ordenId.$notin_condition);
              
        if(count($cartasordenesList) > 0)
        {
            foreach($cartasordenesList as $col):
            {
               $cartasordenes[$col['cartasordenes']['id']] = $col['cartastecnologicas']['codigo']; 
            }
            endforeach;
            
            //$ordenes = $this->Ordenesplanoperario->Ordene->find('list');
    		$operarios = $this->Ordenesplanoperario->Operario->find('list');
    		$this->set(compact('operarios', 'cartasordenes'));
            $this->set('ordenId', $ordenId);
            $ordenData = $this->Ordenesplanoperario->Ordene->read(null, $ordenId);
            $this->set('ordennumero', $ordenData['Ordene']['numero']);
        }              
        else
        {
            $this->Session->showMessage('No es posible mostrar el formulario de inserción ya que no se encontraron 
                                         cartas tecnológicas para mostrar. Esto puede ser debido a que no exista 
                                         ninguna carta seleccionada en la orden, o que las que han sido seleccionadas 
                                         ya han sido planificadas para un operario.', $this->MSG_INFO);
			$this->redirect(array('controller'=>'ordenes', 'action'=>'edit', $ordenId));
        }
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id=null, $ordenId) 
    {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Ordenesplanoperario->id = $id;
		if (!$this->Ordenesplanoperario->exists()) {
			throw new NotFoundException(__('Invalid ordenesplanoperario'));
		}
        
		if ($this->Ordenesplanoperario->delete()) 
        {
            $this->Session->showMessage('Registro eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('controller'=>'ordenes', 'action'=>'edit', $ordenId));
		}
        
		$this->Session->showMessage('No se pudo eliminar el registro', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    public function delete_via_AJAX() 
    {
	    $id = -1;
        
        if(array_key_exists('id', $this->request->data['Ordenplanoperario']))
         $id = $this->request->data['Ordenplanoperario']['id'];
         
        $this->Ordenesplanoperario->id = $id;
        
        $this->set('value', $this->Ordenesplanoperario->delete()); 
        $this->Session->showMessage('Registro eliminado correctamente', $this->MSG_SUCCESS);
        
        $this->layout = 'ajax';
        $this->render('/Elements/ajax_input','ajax');
	}
}