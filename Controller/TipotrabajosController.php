<?php
App::uses('AppController', 'Controller');
/**
 * Tipotrabajos Controller
 *
 * @property Tipotrabajo $Tipotrabajo
 */
class TipotrabajosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tipotrabajo->recursive = 0;
		$this->set('tipotrabajos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tipotrabajo->id = $id;
		if (!$this->Tipotrabajo->exists()) {
			throw new NotFoundException(__('Invalid tipotrabajo'));
		}
		$this->set('tipotrabajo', $this->Tipotrabajo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() 
    {
		if ($this->request->is('post')) 
        {
			$this->Tipotrabajo->create();
            
			if ($this->Tipotrabajo->save($this->request->data)) 
            {
				$this->Session->showMessage('El tipo de trabajo ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el tipo de trabajo. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Tipotrabajo->id = $id;
		if (!$this->Tipotrabajo->exists()) 
        {
			throw new NotFoundException(__('Invalid tipotrabajo'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Tipotrabajo->save($this->request->data)) 
            {
				$this->Session->showMessage('El tipo de trabajo ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el tipo de trabajo. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Tipotrabajo->read(null, $id);
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
		if (!$this->request->is('post')) 
        {
			throw new MethodNotAllowedException();
		}
		$this->Tipotrabajo->id = $id;
		if (!$this->Tipotrabajo->exists()) 
        {
			throw new NotFoundException(__('Invalid tipotrabajo'));
		}
		if ($this->Tipotrabajo->delete()) 
        {
            $this->Session->showMessage('El tipo de trabajo ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el tipo de trabajo', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
