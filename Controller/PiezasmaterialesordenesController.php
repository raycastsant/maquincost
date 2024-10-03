<?php
App::uses('AppController', 'Controller');
/**
 * Piezasmaterialesordenes Controller
 *
 * @property Piezasmaterialesordene $Piezasmaterialesordene
 */
class PiezasmaterialesordenesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Piezasmaterialesordene->recursive = 0;
		$this->set('piezasmaterialesordenes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Piezasmaterialesordene->id = $id;
		if (!$this->Piezasmaterialesordene->exists()) {
			throw new NotFoundException(__('Invalid piezasmaterialesordene'));
		}
		$this->set('piezasmaterialesordene', $this->Piezasmaterialesordene->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Piezasmaterialesordene->create();
			if ($this->Piezasmaterialesordene->save($this->request->data)) {
				$this->Session->showMessage('El piezasmaterialesordene ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el piezasmaterialesordene. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		$ordenreals = $this->Piezasmaterialesordene->Ordenreal->find('list');
		$vales = $this->Piezasmaterialesordene->Vale->find('list');
		$this->set(compact('ordenreals', 'vales'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Piezasmaterialesordene->id = $id;
		if (!$this->Piezasmaterialesordene->exists()) {
			throw new NotFoundException(__('Invalid piezasmaterialesordene'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Piezasmaterialesordene->save($this->request->data)) {
				$this->Session->showMessage('El piezasmaterialesordene ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el piezasmaterialesordene. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Piezasmaterialesordene->read(null, $id);
		}
		$ordenreals = $this->Piezasmaterialesordene->Ordenreal->find('list');
		$vales = $this->Piezasmaterialesordene->Vale->find('list');
		$this->set(compact('ordenreals', 'vales'));
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
		$this->Piezasmaterialesordene->id = $id;
		if (!$this->Piezasmaterialesordene->exists()) {
			throw new NotFoundException(__('Invalid piezasmaterialesordene'));
		}
		if ($this->Piezasmaterialesordene->delete()) {
            $this->Session->showMessage('piezasmaterialesordene eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el piezasmaterialesordene', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
