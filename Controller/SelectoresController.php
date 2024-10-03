<?php
App::uses('AppController', 'Controller');
/**
 * Selectores Controller
 *
 * @property Selectore $Selectore
 */
class SelectoresController extends AppController 
{
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Selectore->recursive = 0;
		$this->set('selectores', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Selectore->id = $id;
		if (!$this->Selectore->exists()) {
			throw new NotFoundException(__('Invalid selectore'));
		}
		$this->set('selectore', $this->Selectore->read(null, $id));
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
			$this->Selectore->create();
			if ($this->Selectore->save($this->request->data)) 
            {
				$this->Session->showMessage('El selector ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maqunaid));
			} 
            else 
            {
				$this->Session->showMessage('No se pudo salvar el selectore. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		$velocidadrangos = $this->Selectore->Velocidadrango->find('list');
		$this->set(compact('velocidadrangos'));
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
		$this->Selectore->id = $id;
		if (!$this->Selectore->exists()) {
			throw new NotFoundException(__('Invalid selectore'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Selectore->save($this->request->data)) {
				$this->Session->showMessage('El selector ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maqunaid));
			} 
            else {
				$this->Session->showMessage('No se pudo salvar el selector. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} 
        else 
        {
			$this->request->data = $this->Selectore->read(null, $id);
		}
		$velocidadrangos = $this->Selectore->Velocidadrango->find('list');
		$this->set(compact('velocidadrangos'));
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
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
        
		$this->Selectore->id = $id;
		if (!$this->Selectore->exists()) {
			throw new NotFoundException(__('Invalid selectore'));
		}
		if ($this->Selectore->delete()) 
        {
            $this->Session->showMessage('Selector eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maquinaid));
		}
        
		$this->Session->showMessage('No se pudo eliminar el selector', $this->MSG_ERROR);
		$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maquinaid));
	}
    
    /** 
    Devuelve los selectores de velocidad de un 
    rango determinado*/
    public function getSelectoresFromRango($rangoId)
    {
       $options['conditions'] = array('velocidadrango_id' => $rangoId);
       $options['order'] = array('nombre');
       
       $this->Selectore->recursive = -1;
       $result = $this->Selectore->find('all', $options);
       
       return $result;
    }
}