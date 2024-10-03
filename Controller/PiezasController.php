<?php
App::uses('AppController', 'Controller');
/**
 * Piezas Controller
 *
 * @property Pieza $Pieza
 */
class PiezasController extends AppController 
{

/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Pieza->recursive = 0;
        $this->paginate = array('order'=>'Pieza.nombre');
		$this->set('piezas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Pieza->id = $id;
		if (!$this->Pieza->exists()) {
			throw new NotFoundException(__('Invalid pieza'));
		}
		$this->set('pieza', $this->Pieza->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() 
    {
		if ($this->request->is('post')) {
			$this->Pieza->create();
			if ($this->Pieza->save($this->request->data)) {
				$this->Session->showMessage('La pieza ha sido salvada correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar la pieza. Inténtelo nuevamente', $this->MSG_ERROR);
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
	public function edit($id = null) 
    {
		$this->Pieza->id = $id;
		if (!$this->Pieza->exists()) {
			throw new NotFoundException(__('Invalid pieza'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pieza->save($this->request->data)) {
				$this->Session->showMessage('La pieza ha sido salvada correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar la pieza. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Pieza->read(null, $id);
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
	public function delete($id = null) 
    {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Pieza->id = $id;
		if (!$this->Pieza->exists()) {
			throw new NotFoundException(__('Invalid pieza'));
		}
		if ($this->Pieza->delete()) {
            $this->Session->showMessage('La pieza ha sido eliminada correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar la pieza', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}