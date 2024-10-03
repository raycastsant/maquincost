<?php
App::uses('AppController', 'Controller');
/**
 * Tipoelementoscortantes Controller
 *
 * @property Tipoelementoscortante $Tipoelementoscortante
 */
class TipoelementoscortantesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tipoelementoscortante->recursive = 0;
		$this->set('tipoelementoscortantes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tipoelementoscortante->id = $id;
		if (!$this->Tipoelementoscortante->exists()) {
			throw new NotFoundException(__('Invalid tipoelementoscortante'));
		}
		$this->set('tipoelementoscortante', $this->Tipoelementoscortante->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipoelementoscortante->create();
			if ($this->Tipoelementoscortante->save($this->request->data)) {
				$this->Session->showMessage('El tipoelementoscortante ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el tipoelementoscortante. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Tipoelementoscortante->id = $id;
		if (!$this->Tipoelementoscortante->exists()) {
			throw new NotFoundException(__('Invalid tipoelementoscortante'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tipoelementoscortante->save($this->request->data)) {
				$this->Session->showMessage('El tipoelementoscortante ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el tipoelementoscortante. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Tipoelementoscortante->read(null, $id);
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
		$this->Tipoelementoscortante->id = $id;
		if (!$this->Tipoelementoscortante->exists()) {
			throw new NotFoundException(__('Invalid tipoelementoscortante'));
		}
		if ($this->Tipoelementoscortante->delete()) {
            $this->Session->showMessage('tipoelementoscortante eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el tipoelementoscortante', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
