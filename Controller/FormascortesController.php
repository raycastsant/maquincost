<?php
App::uses('AppController', 'Controller');
/**
 * Formascortes Controller
 *
 * @property Formascorte $Formascorte
 */
class FormascortesController extends AppController 
{

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Formascorte->recursive = 0;
        $this->paginate = array('limit' => 7, 'order'=>'Formascorte.nombre');
		$this->set('formascortes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Formascorte->id = $id;
		if (!$this->Formascorte->exists()) {
			throw new NotFoundException(__('Invalid formascorte'));
		}
		$this->set('formascorte', $this->Formascorte->read(null, $id));
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
			$this->Formascorte->create();
			if ($this->Formascorte->save($this->request->data)) {
				$this->Session->showMessage('La forma de corte ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar la forma de corte. Inténtelo nuevamente', $this->MSG_ERROR);
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
	public function edit($id = null) {
		$this->Formascorte->id = $id;
		if (!$this->Formascorte->exists()) {
			throw new NotFoundException(__('Invalid formascorte'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Formascorte->save($this->request->data)) {
				$this->Session->showMessage('La forma de corte ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar la forma de corte. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Formascorte->read(null, $id);
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
		$this->Formascorte->id = $id;
		if (!$this->Formascorte->exists()) {
			throw new NotFoundException(__('Invalid formascorte'));
		}
		if ($this->Formascorte->delete()) {
            $this->Session->showMessage('La forma de corte ha sido eliminada correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar la forma de corte', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
