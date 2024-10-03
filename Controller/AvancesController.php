<?php
App::uses('AppController', 'Controller');
/**
 * Avances Controller
 *
 * @property Avance $Avance
 */
class AvancesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Avance->recursive = 0;
		$this->set('avances', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Avance->id = $id;
		if (!$this->Avance->exists()) {
			throw new NotFoundException(__('Invalid avance'));
		}
		$this->set('avance', $this->Avance->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($maqunaid=null) 
    {
		if ($this->request->is('post')) 
        {
			$this->Avance->create();
			if ($this->Avance->save($this->request->data)) 
            {
				$this->Session->showMessage('El avance ha sido salvado correctamente', $this->MSG_SUCCESS);
			    $this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maqunaid));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el avance. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		$selectores = $this->Avance->Selectore->find('list');
		$this->set(compact('selectores'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $maqunaid=null) 
    {
		$this->Avance->id = $id;
		if (!$this->Avance->exists()) {
			throw new NotFoundException(__('Invalid avance'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Avance->save($this->request->data)) {
				$this->Session->showMessage('El avance ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maqunaid));
			} else {
				$this->Session->showMessage('No se pudo salvar el avance. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} else {
			$this->request->data = $this->Avance->read(null, $id);
		}
		$selectores = $this->Avance->Selectore->find('list');
		$this->set(compact('selectores'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id=null, $maquinaid=null) 
    {
		if (!$this->request->is('post')) 
        {
			throw new MethodNotAllowedException();
		}
        
		$this->Avance->id = $id;
		if (!$this->Avance->exists()) 
        {
			throw new NotFoundException(__('Invalid avance'));
		}
        
		if ($this->Avance->delete()) 
        {
            $this->Session->showMessage('El valor de avance ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maquinaid));
		}
		$this->Session->showMessage('No se pudo eliminar el valor del avance', $this->MSG_ERROR);
		$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maquinaid));
	}
    
  /** Devuelve los avances del selector pasado por parámetros*/
    public function getAvancesFromSelector($selectorId)
    {
       $options['conditions'] = array('selectore_id' => $selectorId);
       $options['order'] = array('avance');
       
       $this->Avance->recursive = -1;
       $result = $this->Avance->find('all', $options);
       
       return $result;
    }
}