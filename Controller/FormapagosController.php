<?php
App::uses('AppController', 'Controller');
/**
 * Formapagos Controller
 *
 * @property Formapago $Formapago
 */
class FormapagosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Formapago->recursive = 0;
		$this->set('formapagos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Formapago->id = $id;
		if (!$this->Formapago->exists()) {
			throw new NotFoundException(__('Invalid formapago'));
		}
		$this->set('formapago', $this->Formapago->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Formapago->create();
			if ($this->Formapago->save($this->request->data)) {
				$this->Session->showMessage('El formapago ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el formapago. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Formapago->id = $id;
		if (!$this->Formapago->exists()) {
			throw new NotFoundException(__('Invalid formapago'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Formapago->save($this->request->data)) {
				$this->Session->showMessage('El formapago ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el formapago. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Formapago->read(null, $id);
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
		$this->Formapago->id = $id;
		if (!$this->Formapago->exists()) {
			throw new NotFoundException(__('Invalid formapago'));
		}
		if ($this->Formapago->delete()) {
            $this->Session->showMessage('formapago eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el formapago', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
