<?php
App::uses('AppController', 'Controller');
/**
 * Materialelementos Controller
 *
 * @property Materialelemento $Materialelemento
 */
class MaterialelementosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Materialelemento->recursive = 0;
		$this->set('materialelementos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Materialelemento->id = $id;
		if (!$this->Materialelemento->exists()) {
			throw new NotFoundException(__('Invalid materialelemento'));
		}
		$this->set('materialelemento', $this->Materialelemento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Materialelemento->create();
			if ($this->Materialelemento->save($this->request->data)) {
				$this->Session->showMessage('El materialelemento ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el materialelemento. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Materialelemento->id = $id;
		if (!$this->Materialelemento->exists()) {
			throw new NotFoundException(__('Invalid materialelemento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Materialelemento->save($this->request->data)) {
				$this->Session->showMessage('El materialelemento ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el materialelemento. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Materialelemento->read(null, $id);
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
		$this->Materialelemento->id = $id;
		if (!$this->Materialelemento->exists()) {
			throw new NotFoundException(__('Invalid materialelemento'));
		}
		if ($this->Materialelemento->delete()) {
            $this->Session->showMessage('materialelemento eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el materialelemento', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
