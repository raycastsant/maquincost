<?php
App::uses('AppController', 'Controller');
/**
 * Operarios Controller
 *
 * @property Operario $Operario
 */
class OperariosController extends AppController 
{

/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Operario->recursive = 0;
        $this->paginate = array('limit' => 7, 'order'=>'Operario.nombre');
		$this->set('operarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Operario->id = $id;
		if (!$this->Operario->exists()) {
			throw new NotFoundException(__('Invalid operario'));
		}
		$this->set('operario', $this->Operario->read(null, $id));
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
			$this->Operario->create();
			if ($this->Operario->save($this->request->data)) 
            {
				$this->Session->showMessage('El operario ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el operario. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		$calificacionoperarios = $this->Operario->Calificacionoperario->find('list');
		$this->set(compact('calificacionoperarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Operario->id = $id;
		if (!$this->Operario->exists()) {
			throw new NotFoundException(__('Invalid operario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Operario->save($this->request->data)) {
				$this->Session->showMessage('El operario ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el operario. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Operario->read(null, $id);
		}
		$calificacionoperarios = $this->Operario->Calificacionoperario->find('list');
		$this->set(compact('calificacionoperarios'));
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
		$this->Operario->id = $id;
		if (!$this->Operario->exists()) {
			throw new NotFoundException(__('Invalid operario'));
		}
		if ($this->Operario->delete()) {
            $this->Session->showMessage('Operario eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el operario', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** Obtiene la tarifa en dependencia del operario.
        Ver vista ADD de ordenesplanoperarios */
    public function getTarifaFromOperario_AJAX($modelName='Ordenesplanoperario' )
    {
        $operarioId = -1;
        
        if(array_key_exists('operario_id', $this->request->data[$modelName]))
         $operarioId = $this->request->data[$modelName]['operario_id'];
         
        $this->Operario->recursive = 0;
        $data = $this->Operario->read(null, $operarioId);

        $tarifa = -1;
        if(count($data) > 0)
         $tarifa = $data['Calificacionoperario']['tarifa'];
         
        $this->set('value', $tarifa); 
        $this->layout = 'ajax';
        $this->render('/Elements/ajax_input','ajax');
    }
}