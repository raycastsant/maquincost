<?php
App::uses('AppController', 'Controller');
/**
 * Tiposmateriales Controller
 *
 * @property Tiposmateriale $Tiposmateriale
 */
class TiposmaterialesController extends AppController 
{
/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Tiposmateriale->recursive = 0;
        $this->paginate = array('order'=>array('nombre'=>'asc', 'resitencia_min'));
		$this->set('tiposmateriales', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tiposmateriale->id = $id;
		if (!$this->Tiposmateriale->exists()) {
			throw new NotFoundException(__('Invalid tiposmateriale'));
		}
		$this->set('tiposmateriale', $this->Tiposmateriale->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tiposmateriale->create();
			if ($this->Tiposmateriale->save($this->request->data)) {
				$this->Session->showMessage('El tiposmateriale ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el tiposmateriale. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		$agrupadormateriales = $this->Tiposmateriale->Agrupadormateriale->find('list');
		$this->set(compact('agrupadormateriales'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Tiposmateriale->id = $id;
		if (!$this->Tiposmateriale->exists()) {
			throw new NotFoundException(__('Invalid tiposmateriale'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tiposmateriale->save($this->request->data)) {
				$this->Session->showMessage('El tiposmateriale ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el tiposmateriale. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Tiposmateriale->read(null, $id);
		}
		$agrupadormateriales = $this->Tiposmateriale->Agrupadormateriale->find('list');
		$this->set(compact('agrupadormateriales'));
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
		$this->Tiposmateriale->id = $id;
		if (!$this->Tiposmateriale->exists()) {
			throw new NotFoundException(__('Invalid tiposmateriale'));
		}
		if ($this->Tiposmateriale->delete()) {
            $this->Session->showMessage('tiposmateriale eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el tiposmateriale', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
