<?php
App::uses('AppController', 'Controller');
/**
 * Calificacionoperarios Controller
 *
 * @property Calificacionoperario $Calificacionoperario
 */
class CalificacionoperariosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Calificacionoperario->recursive = 0;
        $this->paginate = array('limit' => 7, 'order'=>'Calificacionoperario.nombre');
		$this->set('calificacionoperarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function view($id = null) {
		$this->Calificacionoperario->id = $id;
		if (!$this->Calificacionoperario->exists()) {
			throw new NotFoundException(__('Invalid calificacionoperario'));
		}
		$this->set('calificacionoperario', $this->Calificacionoperario->read(null, $id));
	}*/

/**
 * add method
 *
 * @return void
 */
	public function add() 
    {
		if ($this->request->is('post')) {
			$this->Calificacionoperario->create();
			if ($this->Calificacionoperario->save($this->request->data)) {
				$this->Session->showMessage('El calificador de operarios ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el calificador de operarios. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Calificacionoperario->id = $id;
		if (!$this->Calificacionoperario->exists()) {
			throw new NotFoundException(__('Invalid calificador de operarios'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Calificacionoperario->save($this->request->data)) {
				$this->Session->showMessage('El calificador de operarios ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el calificador de operarios. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Calificacionoperario->read(null, $id);
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
		$this->Calificacionoperario->id = $id;
		if (!$this->Calificacionoperario->exists()) {
			throw new NotFoundException(__('Invalid calificador de operarios'));
		}
		if ($this->Calificacionoperario->delete()) {
            $this->Session->showMessage('El calificador de operarios eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el calificador de operarios', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
