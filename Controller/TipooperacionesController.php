<?php
App::uses('AppController', 'Controller');
/**
 * Tipooperaciones Controller
 *
 * @property Tipooperacione $Tipooperacione
 */
class TipooperacionesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tipooperacione->recursive = 0;
		$this->set('tipooperaciones', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tipooperacione->id = $id;
		if (!$this->Tipooperacione->exists()) {
			throw new NotFoundException(__('Invalid tipooperacione'));
		}
		$this->set('tipooperacione', $this->Tipooperacione->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipooperacione->create();
			if ($this->Tipooperacione->save($this->request->data)) {
				$this->Session->showMessage('El tipooperacione ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el tipooperacione. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Tipooperacione->id = $id;
		if (!$this->Tipooperacione->exists()) {
			throw new NotFoundException(__('Invalid tipooperacione'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tipooperacione->save($this->request->data)) {
				$this->Session->showMessage('El tipooperacione ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el tipooperacione. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Tipooperacione->read(null, $id);
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
		$this->Tipooperacione->id = $id;
		if (!$this->Tipooperacione->exists()) {
			throw new NotFoundException(__('Invalid tipooperacione'));
		}
		if ($this->Tipooperacione->delete()) {
            $this->Session->showMessage('tipooperacione eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el tipooperacione', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
