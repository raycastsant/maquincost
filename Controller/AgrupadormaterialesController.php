<?php
App::uses('AppController', 'Controller');
/**
 * Agrupadormateriales Controller
 *
 * @property Agrupadormateriale $Agrupadormateriale
 */
class AgrupadormaterialesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Agrupadormateriale->recursive = 0;
		$this->set('agrupadormateriales', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Agrupadormateriale->id = $id;
		if (!$this->Agrupadormateriale->exists()) {
			throw new NotFoundException(__('Invalid agrupadormateriale'));
		}
		$this->set('agrupadormateriale', $this->Agrupadormateriale->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Agrupadormateriale->create();
			if ($this->Agrupadormateriale->save($this->request->data)) {
				$this->Session->showMessage('El agrupadormateriale ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el agrupadormateriale. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Agrupadormateriale->id = $id;
		if (!$this->Agrupadormateriale->exists()) {
			throw new NotFoundException(__('Invalid agrupadormateriale'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Agrupadormateriale->save($this->request->data)) {
				$this->Session->showMessage('El agrupadormateriale ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el agrupadormateriale. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Agrupadormateriale->read(null, $id);
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
		$this->Agrupadormateriale->id = $id;
		if (!$this->Agrupadormateriale->exists()) {
			throw new NotFoundException(__('Invalid agrupadormateriale'));
		}
		if ($this->Agrupadormateriale->delete()) {
            $this->Session->showMessage('agrupadormateriale eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el agrupadormateriale', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
