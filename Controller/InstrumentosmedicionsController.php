<?php
App::uses('AppController', 'Controller');
/**
 * Instrumentosmedicions Controller
 *
 * @property Instrumentosmedicion $Instrumentosmedicion
 */
class InstrumentosmedicionsController extends AppController 
{

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Instrumentosmedicion->recursive = 0;
		$this->set('instrumentosmedicions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*	public function view($id = null) {
		$this->Instrumentosmedicion->id = $id;
		if (!$this->Instrumentosmedicion->exists()) {
			throw new NotFoundException(__('Invalid instrumentosmedicion'));
		}
		$this->set('instrumentosmedicion', $this->Instrumentosmedicion->read(null, $id));
	}*/

/**
 * add method
 *
 * @return void
 */
	public function add() 
    {
		if ($this->request->is('post')) 
        {
			$this->Instrumentosmedicion->create();
			if ($this->Instrumentosmedicion->save($this->request->data)) {
				$this->Session->showMessage('El instrumento de medición ha sido guardado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el instrumento de medición. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Instrumentosmedicion->id = $id;
		if (!$this->Instrumentosmedicion->exists()) {
			throw new NotFoundException(__('Invalid instrumentosmedicion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Instrumentosmedicion->save($this->request->data)) {
				$this->Session->showMessage('El instrumento de medición ha sido guardado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el instrumento de medición. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Instrumentosmedicion->read(null, $id);
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
		$this->Instrumentosmedicion->id = $id;
		if (!$this->Instrumentosmedicion->exists()) {
			throw new NotFoundException(__('Invalid instrumentosmedicion'));
		}
		if ($this->Instrumentosmedicion->delete()) {
            $this->Session->showMessage('El instrumento de medición ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el instrumento de medición', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** Devuelve el listado de instrumentos de medición por AJAX*/
    public function getInstrumentosMedicion_AJAX()
    {
		$values = $this->Instrumentosmedicion->find('list');
        
        $this->set(compact('values'));

		$this->layout = 'ajax';
		$this->render('/Elements/ajax_dropdown','ajax');
    }
}
