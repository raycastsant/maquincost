<?php
App::uses('AppController', 'Controller');
/**
 * Tipousuarios Controller
 *
 * @property Tipousuario $Tipousuario
 */
class TipousuariosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tipousuario->recursive = 0;
		$this->set('tipousuarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tipousuario->id = $id;
		if (!$this->Tipousuario->exists()) {
			throw new NotFoundException(__('Invalid tipousuario'));
		}
		$this->set('tipousuario', $this->Tipousuario->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipousuario->create();
			if ($this->Tipousuario->save($this->request->data)) {
				$this->Session->showMessage('El tipousuario ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el tipousuario. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Tipousuario->id = $id;
		if (!$this->Tipousuario->exists()) {
			throw new NotFoundException(__('Invalid tipousuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tipousuario->save($this->request->data)) {
				$this->Session->showMessage('El tipousuario ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el tipousuario. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Tipousuario->read(null, $id);
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
		$this->Tipousuario->id = $id;
		if (!$this->Tipousuario->exists()) {
			throw new NotFoundException(__('Invalid tipousuario'));
		}
		if ($this->Tipousuario->delete()) {
            $this->Session->showMessage('tipousuario eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el tipousuario', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
