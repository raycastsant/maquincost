<?php
App::uses('AppController', 'Controller');
/**
 * Instrumentosauxiliares Controller
 *
 * @property Instrumentosauxiliare $Instrumentosauxiliare
 */
class InstrumentosauxiliaresController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Instrumentosauxiliare->recursive = 0;
		$this->set('instrumentosauxiliares', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Instrumentosauxiliare->id = $id;
		if (!$this->Instrumentosauxiliare->exists()) {
			throw new NotFoundException(__('Invalid instrumentosauxiliare'));
		}
		$this->set('instrumentosauxiliare', $this->Instrumentosauxiliare->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Instrumentosauxiliare->create();
			if ($this->Instrumentosauxiliare->save($this->request->data)) {
				$this->Session->showMessage('El instrumento auxiliar ha sido guardado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el instrumento auxiliar. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Instrumentosauxiliare->id = $id;
		if (!$this->Instrumentosauxiliare->exists()) {
			throw new NotFoundException(__('Invalid instrumentosauxiliare'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Instrumentosauxiliare->save($this->request->data)) {
				$this->Session->showMessage('El instrumento auxiliar ha sido guardado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el instrumento auxiliar. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Instrumentosauxiliare->read(null, $id);
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
		$this->Instrumentosauxiliare->id = $id;
		if (!$this->Instrumentosauxiliare->exists()) {
			throw new NotFoundException(__('Invalid instrumentosauxiliare'));
		}
		if ($this->Instrumentosauxiliare->delete()) {
            $this->Session->showMessage('El instrumento auxiliar ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el instrumento auxiliar', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** Devuelve el listado de instrumentos auxiliares por AJAX*/
    public function getInstrumentosAuxiliares_AJAX()
    {
		$values = $this->Instrumentosauxiliare->find('list');
        
        $this->set(compact('values'));

		$this->layout = 'ajax';
		$this->render('/Elements/ajax_dropdown','ajax');
    }
}