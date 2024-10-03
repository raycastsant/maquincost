<?php
App::uses('AppController', 'Controller');
/**
 * Maquinas Controller
 *
 * @property Maquina $Maquina
 */
class MaquinasController extends AppController 
{
/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Maquina->recursive = 0;
        $this->paginate = array('limit' => 10, 'order'=>'Maquina.nombre');
		$this->set('maquinas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Maquina->id = $id;
		if (!$this->Maquina->exists()) {
			throw new NotFoundException(__('Invalid maquina'));
		}
		$this->set('maquina', $this->Maquina->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() 
    {
		if ($this->request->is('post')) {
			$this->Maquina->create();
			if ($this->Maquina->save($this->request->data)) 
            {
				$this->Session->showMessage('La máquina ha sido guardada correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el maquina. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Maquina->id = $id;
		if (!$this->Maquina->exists()) {
			throw new NotFoundException(__('Invalid maquina'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Maquina->save($this->request->data)) {
				$this->Session->showMessage('La máquina ha sido guardada correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el maquina. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Maquina->read(null, $id);
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
		$this->Maquina->id = $id;
		if (!$this->Maquina->exists()) {
			throw new NotFoundException(__('Invalid maquina'));
		}
		if ($this->Maquina->delete()) {
            $this->Session->showMessage('maquina eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el maquina', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** Devuelve el listado de maquinas por AJAX*/
    public function getMaquinas_AJAX()
    {
        $values = $this->Maquina->find('list');
        $this->set(compact('values'));

		$this->layout = 'ajax';
		$this->render('/Elements/ajax_dropdown','ajax');
    }
}