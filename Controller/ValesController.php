<?php
App::uses('AppController', 'Controller');
/**
 * Vales Controller
 *
 * @property Vale $Vale
 */
class ValesController extends AppController 
{
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Vale->recursive = 0;
		$this->set('vales', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Vale->id = $id;
		if (!$this->Vale->exists()) {
			throw new NotFoundException(__('Invalid vale'));
		}
		$this->set('vale', $this->Vale->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($ordenRealId) 
    {
		if ($this->request->is('post')) 
        {
			$this->Vale->create();
            $this->request->data['Vale']['ordenreal_id'] = $ordenRealId;
            
			if ($this->Vale->save($this->request->data)) 
            {
				$this->Session->showMessage('El vale ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'ordenreals', 'action'=>'edit',$ordenRealId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el vale. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
		$materiales = $this->Vale->Materiale->find('list', array('order'=>array('Materiale.descripcion')));
		//$ordenreals = $this->Vale->Ordenreal->find('list');
		$this->set(compact('materiales'));
        $this->set('ordenRealId', $ordenRealId);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $ordenRealId) 
    {
		$this->Vale->id = $id;
		if (!$this->Vale->exists()) {
			throw new NotFoundException(__('Invalid vale'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
            $this->request->data['Vale']['ordenreal_id'] = $ordenRealId;
            
			if ($this->Vale->save($this->request->data)) 
            {
				$this->Session->showMessage('El vale ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'ordenreals', 'action'=>'edit',$ordenRealId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el vale. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Vale->read(null, $id);
		}
        
		$materiales = $this->Vale->Materiale->find('list', array('order'=>array('Materiale.descripcion')));
		//$ordenreals = $this->Vale->Ordenreal->find('list');
		$this->set(compact('materiales'));
        $this->set('ordenRealId', $ordenRealId);
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
		$this->Vale->id = $id;
		if (!$this->Vale->exists()) {
			throw new NotFoundException(__('Invalid vale'));
		}
		if ($this->Vale->delete()) {
            $this->Session->showMessage('vale eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el vale', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** Devuelve los vales de la orden Real pasada por parametros */ 
    public function get_Vales_AJAX($ordenRealId)
    {
        $this->Vale->recursive =0;
        $vales = $this->Vale->find('all', array('conditions'=>array('ordenreal_id'=>$ordenRealId)));
        
        $this->set('vales', $vales);
        $this->set('ordenRealId', $ordenRealId);
        
        $this->layout = 'ajax';
		$this->render('/Elements/orden_real_piezas_materiales', 'ajax');
    }
    
    public function delete_via_AJAX() 
    {
	    $id = -1;
        
        if(array_key_exists('id', $this->request->data['Vale']))
         $id = $this->request->data['Vale']['id'];
         
        $this->Vale->id = $id;
        $this->set('value', $this->Vale->delete()); 
        
        $this->layout = 'ajax';
        $this->render('/Elements/ajax_input','ajax');
	}
}