<?php
App::uses('AppController', 'Controller');
/**
 * Tiemposauxiliares Controller
 *
 * @property Tiemposauxiliare $Tiemposauxiliare
 */
class TiemposauxiliaresController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Tiemposauxiliare->recursive = 0;
		$this->set('tiemposauxiliares', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tiemposauxiliare->id = $id;
		if (!$this->Tiemposauxiliare->exists()) {
			throw new NotFoundException(__('Invalid tiemposauxiliare'));
		}
		$this->set('tiemposauxiliare', $this->Tiemposauxiliare->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tiemposauxiliare->create();
			if ($this->Tiemposauxiliare->save($this->request->data)) {
				$this->Session->showMessage('El tiemposauxiliare ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el tiemposauxiliare. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Tiemposauxiliare->id = $id;
		if (!$this->Tiemposauxiliare->exists()) {
			throw new NotFoundException(__('Invalid tiemposauxiliare'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tiemposauxiliare->save($this->request->data)) {
				$this->Session->showMessage('El tiemposauxiliare ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el tiemposauxiliare. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Tiemposauxiliare->read(null, $id);
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
		$this->Tiemposauxiliare->id = $id;
		if (!$this->Tiemposauxiliare->exists()) {
			throw new NotFoundException(__('Invalid tiemposauxiliare'));
		}
		if ($this->Tiemposauxiliare->delete()) {
            $this->Session->showMessage('tiemposauxiliare eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el tiemposauxiliare', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
     /** 
     * Obtiene los tiempos auxiliares para mostrar su resultado a través
       de un element. Ver las vistas de Ctregistros add y edit. */
    public function getTiemposAxiliaresAJAX()
    {       
        $mesg = "";
        $mesgHead = "";
        $errorFlag = "0";
        
        $this->Tiemposauxiliare->recursive = 0;
		$this->set('values', $this->paginate());
                
        $this->set('mesg', $mesg);
        $this->set('mesgHead', $mesgHead);
        $this->set('errorFlag', $errorFlag);

		$this->layout = 'ajax';
		$this->render('/Elements/dialog_tiempos_auxiliares', 'ajax');
    }
}