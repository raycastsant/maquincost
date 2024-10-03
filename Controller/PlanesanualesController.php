<?php
App::uses('AppController', 'Controller');
/**
 * Planesanuales Controller
 *
 * @property Planesanuale $Planesanuale
 */
class PlanesanualesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Planesanuale->recursive = 0;
        $this->paginate = array('limit' => 8, 'order'=>'Planesanuale.anno');
		$this->set('planesanuales', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id=null) 
    {
		$this->Planesanuale->id = $id;
		if (!$this->Planesanuale->exists()) {
			throw new NotFoundException(__('Invalid planesanuale'));
		}
        
		$this->set('planesanuale', $this->Planesanuale->read(null, $id));
        $this->Planesanuale->Plananualregistro->recursive = 0;
        $plananualregistros = $this->Planesanuale->Plananualregistro->find('all', array('conditions'=>array('Plananualregistro.planesanuale_id'=>$id)));
        $this->set('plananualregistros', $plananualregistros);
        
	}

/**
 * add method
 *
 * @return void
 */
	public function add() 
    {
		if ($this->request->is('post')) 
        {
			$this->Planesanuale->create();
			if ($this->Planesanuale->save($this->request->data)) 
            {
				$this->Session->showMessage('El plan anual ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'edit', $this->Planesanuale->id));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el plan anual. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null) 
    {
		$this->Planesanuale->id = $id;
		if (!$this->Planesanuale->exists()) {
			throw new NotFoundException(__('Invalid planesanuale'));
		}
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Planesanuale->save($this->request->data)) {
				$this->Session->showMessage('El plan anual ha sido salvado correctamente', $this->MSG_SUCCESS);
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el plan anual. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Planesanuale->read(null, $id);
            $this->Planesanuale->Plananualregistro->recursive = 0;
            $plananualregistros = $this->Planesanuale->Plananualregistro->find('all', array('conditions'=>array('Plananualregistro.planesanuale_id'=>$id)));
            $this->set('plananualregistros', $plananualregistros);
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
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Planesanuale->id = $id;
		if (!$this->Planesanuale->exists()) {
			throw new NotFoundException(__('Invalid planesanuale'));
		}
		if ($this->Planesanuale->delete()) {
            $this->Session->showMessage('EL plan anual ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el plan anual', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}