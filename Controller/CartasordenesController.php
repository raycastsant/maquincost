<?php
App::uses('AppController', 'Controller');
/**
 * Cartasordenes Controller
 *
 * @property Cartasordene $Cartasordene
 */
class CartasordenesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cartasordene->recursive = 0;
		$this->set('cartasordenes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Cartasordene->id = $id;
		if (!$this->Cartasordene->exists()) {
			throw new NotFoundException(__('Invalid cartasordene'));
		}
		$this->set('cartasordene', $this->Cartasordene->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cartasordene->create();
			if ($this->Cartasordene->save($this->request->data)) {
				$this->Session->showMessage('El cartasordene ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el cartasordene. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		$ordenes = $this->Cartasordene->Ordene->find('list');
		$cartastecnologicas = $this->Cartasordene->Cartastecnologica->find('list');
		$this->set(compact('ordenes', 'cartastecnologicas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Cartasordene->id = $id;
		if (!$this->Cartasordene->exists()) {
			throw new NotFoundException(__('Invalid cartasordene'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cartasordene->save($this->request->data)) {
				$this->Session->showMessage('El cartasordene ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el cartasordene. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Cartasordene->read(null, $id);
		}
		$ordenes = $this->Cartasordene->Ordene->find('list');
		$cartastecnologicas = $this->Cartasordene->Cartastecnologica->find('list');
		$this->set(compact('ordenes', 'cartastecnologicas'));
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
		$this->Cartasordene->id = $id;
		if (!$this->Cartasordene->exists()) {
			throw new NotFoundException(__('Invalid cartasordene'));
		}
		if ($this->Cartasordene->delete()) {
            $this->Session->showMessage('cartasordene eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el cartasordene', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
