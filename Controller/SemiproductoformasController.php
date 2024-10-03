<?php
App::uses('AppController', 'Controller');
/**
 * Semiproductoformas Controller
 *
 * @property Semiproductoforma $Semiproductoforma
 */
class SemiproductoformasController extends AppController 
{
/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Semiproductoforma->recursive = 0;
        $this->paginate = array('limit' => 8, 'order'=>'Semiproductoforma.nombre');
		$this->set('semiproductoformas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 
	public function view($id = null) {
		$this->Semiproductoforma->id = $id;
		if (!$this->Semiproductoforma->exists()) {
			throw new NotFoundException(__('Invalid semiproductoforma'));
		}
		$this->set('semiproductoforma', $this->Semiproductoforma->read(null, $id));
	} */

/**
 * add method
 *
 * @return void
 */
	public function add() 
    {
		if ($this->request->is('post')) 
        {
			$this->Semiproductoforma->create();
			if ($this->Semiproductoforma->save($this->request->data)) {
				$this->Session->showMessage('La forma de semiproductos ha sido salvada correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar la forma de semiproductos. Inténtelo nuevamente', $this->MSG_ERROR);
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
		$this->Semiproductoforma->id = $id;
		if (!$this->Semiproductoforma->exists()) {
			throw new NotFoundException(__('Invalid semiproductoforma'));
		}
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Semiproductoforma->save($this->request->data)) {
				$this->Session->showMessage('La forma de semiproductos ha sido salvada correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar la forma de semiproductos. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Semiproductoforma->read(null, $id);
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
		$this->Semiproductoforma->id = $id;
		if (!$this->Semiproductoforma->exists()) {
			throw new NotFoundException(__('Invalid semiproductoforma'));
		}
		if ($this->Semiproductoforma->delete()) {
            $this->Session->showMessage('La forma de semiproductos ha sido eliminada correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar la forma de semiproductos', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** Devuelve el listado de formas de lso semiproductos por AJAX*/
    public function getSemiproductoFormas_AJAX()
    {
        $values = $this->Semiproductoforma->find('list');
        $this->set(compact('values'));

		$this->layout = 'ajax';
		$this->render('/Elements/ajax_dropdown','ajax');
    }
}
?>