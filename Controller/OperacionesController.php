<?php
App::uses('AppController', 'Controller');
/**
 * Operaciones Controller
 *
 * @property Operacione $Operacione
 */
class OperacionesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Operacione->recursive = 0;
        $this->paginate = array('limit' => 8, 'order'=>'Operacione.nombre');
		$this->set('operaciones', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Operacione->id = $id;
		if (!$this->Operacione->exists()) {
			throw new NotFoundException(__('Invalid operacione'));
		}
		$this->set('operacione', $this->Operacione->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Operacione->create();
			if ($this->Operacione->save($this->request->data)) {
				$this->Session->showMessage('El operacione ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el operacione. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Operacione->id = $id;
		if (!$this->Operacione->exists()) {
			throw new NotFoundException(__('Invalid operacione'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Operacione->save($this->request->data)) {
				$this->Session->showMessage('El operacione ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el operacione. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Operacione->read(null, $id);
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
		$this->Operacione->id = $id;
		if (!$this->Operacione->exists()) {
			throw new NotFoundException(__('Invalid operacione'));
		}
		if ($this->Operacione->delete()) {
            $this->Session->showMessage('operacione eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el operacione', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** Devuelve el listado de operaciones por AJAX*/
    public function getOperaciones_AJAX($maquinaId)
    {
        $options['joins'] = array
            (
                array('table' => 'maquinasoperaciones', 'type'=>'INNER',
                      'conditions'=> array('maquinasoperaciones.operacione_id = Operacione.id'))
            );
        $options['order'] = 'nombre';
        $options['conditions'] = array('maquinasoperaciones.maquina_id'=>$maquinaId);
		$values = $this->Operacione->find('list', $options);
        
        $this->set(compact('values'));

		$this->layout = 'ajax';
		$this->render('/Elements/ajax_dropdown','ajax');
    }
}