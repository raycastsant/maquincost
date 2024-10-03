<?php
App::uses('AppController', 'Controller');
/**
 * Plananualregistros Controller
 *
 * @property Plananualregistro $Plananualregistro
 */
class PlananualregistrosController extends AppController 
{

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Plananualregistro->recursive = 0;
		$this->set('plananualregistros', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Plananualregistro->id = $id;
		if (!$this->Plananualregistro->exists()) {
			throw new NotFoundException(__('Invalid plananualregistro'));
		}
		$this->set('plananualregistro', $this->Plananualregistro->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($planId) 
    {
		if ($this->request->is('post')) 
        {
			$this->Plananualregistro->create();
			if ($this->Plananualregistro->save($this->request->data)) 
            {
				$this->Session->showMessage('El registro ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'planesanuales', 'action'=>'edit', $planId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el registro. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
	//	$planesanuales = $this->Plananualregistro->Planesanuale->find('list');
		$piezas = $this->Plananualregistro->Pieza->find('list');
		$materiales = $this->Plananualregistro->Materiale->find('list');
		$this->set(compact('piezas', 'materiales'));
        $this->set('planId', $planId);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $planId) 
    {
		$this->Plananualregistro->id = $id;
		if (!$this->Plananualregistro->exists()) {
			throw new NotFoundException(__('Invalid plananualregistro'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Plananualregistro->save($this->request->data)) 
            {
				$this->Session->showMessage('El registro ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'planesanuales', 'action'=>'edit', $planId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el registro. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Plananualregistro->read(null, $id);
		}
        
		//$planesanuales = $this->Plananualregistro->Planesanuale->find('list');
		$piezas = $this->Plananualregistro->Pieza->find('list');
		$materiales = $this->Plananualregistro->Materiale->find('list');
		$this->set(compact('piezas', 'materiales'));
        $this->set('planId', $planId);
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
		$this->Plananualregistro->id = $id;
		if (!$this->Plananualregistro->exists()) {
			throw new NotFoundException(__('Invalid plananualregistro'));
		}
        
        $data = $this->Plananualregistro->read(null, $id);
        
		if ($this->Plananualregistro->delete()) 
        {
            $this->Session->showMessage('Registro eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('controller'=>'planesanuales', 'action'=>'edit', $data['Plananualregistro']['planesanuale_id']));
		}
		$this->Session->showMessage('No se pudo eliminar el registro', $this->MSG_ERROR);
		$this->redirect(array('action'=>'index'));
	}
}
