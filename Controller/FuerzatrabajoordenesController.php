<?php
App::uses('AppController', 'Controller');
/**
 * Fuerzatrabajoordenes Controller
 *
 * @property Fuerzatrabajoordene $Fuerzatrabajoordene
 */
class FuerzatrabajoordenesController extends AppController 
{

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Fuerzatrabajoordene->recursive = 0;
		$this->set('fuerzatrabajoordenes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Fuerzatrabajoordene->id = $id;
		if (!$this->Fuerzatrabajoordene->exists()) {
			throw new NotFoundException(__('Invalid fuerzatrabajoordene'));
		}
		$this->set('fuerzatrabajoordene', $this->Fuerzatrabajoordene->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($ordenrealId) 
    {
		if ($this->request->is('post')) 
        {
			$this->Fuerzatrabajoordene->create();
			if ($this->Fuerzatrabajoordene->save($this->request->data)) 
            {
				$this->Session->showMessage('El registro ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'ordenreals', 'action'=>'edit', $ordenrealId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el fuerzatrabajoordene. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
		$operarios = $this->Fuerzatrabajoordene->Operario->find('list');
		//$formapagos = $this->Fuerzatrabajoordene->Formapago->find('list');
		$this->set(compact('operarios'));
        $this->set('ordenrealId', $ordenrealId);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $ordenrealId) 
    {
		$this->Fuerzatrabajoordene->id = $id;
		if (!$this->Fuerzatrabajoordene->exists()) {
			throw new NotFoundException(__('Invalid fuerzatrabajoordene'));
		}
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Fuerzatrabajoordene->save($this->request->data)) 
            {
				$this->Session->showMessage('El registro ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'ordenreals', 'action'=>'edit', $ordenrealId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el fuerzatrabajoordene. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Fuerzatrabajoordene->read(null, $id);
		}
        
		$operarios = $this->Fuerzatrabajoordene->Operario->find('list');
		//$formapagos = $this->Fuerzatrabajoordene->Formapago->find('list');
		$this->set(compact('operarios'));
        $this->set('ordenrealId', $ordenrealId);
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
		$this->Fuerzatrabajoordene->id = $id;
		if (!$this->Fuerzatrabajoordene->exists()) {
			throw new NotFoundException(__('Invalid fuerzatrabajoordene'));
		}
		if ($this->Fuerzatrabajoordene->delete()) {
            $this->Session->showMessage('fuerzatrabajoordene eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el fuerzatrabajoordene', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
     /** Devuelve los operarios que están relacionados
        con la orden real pasada por parámetros. */
    public function getOrdenesRealOperarios_AJAX($ordenrealId)
    {
        $this->Fuerzatrabajoordene->recursive = -1;
        $options['fields'] = array('Fuerzatrabajoordene.*', 'operarios.nombre');
        $options['conditions'] = array('Fuerzatrabajoordene.ordenreal_id'=>$ordenrealId);
        $options['joins'] = array
                            (
                                array('table' => 'operarios', 'type'=>'INNER',
                                      'conditions'=> array('operarios.id = Fuerzatrabajoordene.operario_id'))
                            );
        $operarios = $this->Fuerzatrabajoordene->find('all', $options);
                              
        $this->set('operarios', $operarios);
        $this->set('ordenrealId', $ordenrealId);
        
        $this->layout = 'ajax';
		$this->render('/Elements/orden_real_operarios', 'ajax');
    }
    
    /** Devuelve el gasto de salario real de la orden*/
    public function getOrdenReal_gasto_salario_AJAX($ordenrealId)
    {
        $this->Fuerzatrabajoordene->recursive = -1;
        $salario = $this->Fuerzatrabajoordene->query("select sum(salario) as salario from fuerzatrabajoordenes where ordenreal_id=".$ordenrealId);
                              
        $this->set('value', $salario[0][0]['salario']);
        
        $this->layout = 'ajax';
		$this->render('/Elements/ajax_input', 'ajax');
    }
    
    public function delete_via_AJAX() 
    {
	    $id = -1;
        
        if(array_key_exists('id', $this->request->data['Fuerzatrabajoordene']))
         $id = $this->request->data['Fuerzatrabajoordene']['id'];
         
        $this->Fuerzatrabajoordene->id = $id;
        
        $this->set('value', $this->Fuerzatrabajoordene->delete()); 
        //$this->Session->showMessage('Registro eliminado correctamente', $this->MSG_SUCCESS);
        
        $this->layout = 'ajax';
        $this->render('/Elements/ajax_input','ajax');
	}
}