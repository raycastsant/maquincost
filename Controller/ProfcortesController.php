<?php
App::uses('AppController', 'Controller');
/**
 * Profcortes Controller
 *
 * @property Profcorte $Profcorte
 */
class ProfcortesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Profcorte->recursive = 0;
		$this->set('profcortes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Profcorte->id = $id;
		if (!$this->Profcorte->exists()) {
			throw new NotFoundException(__('Invalid profcorte'));
		}
		$this->set('profcorte', $this->Profcorte->read(null, $id));
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
			$this->Profcorte->create();
			if ($this->Profcorte->save($this->request->data)) 
            {
				$this->Session->showMessage('El valor de la profundidad de corte ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maqunaid));
			}
             else 
             {
				$this->Session->showMessage('No se pudo salvar el valor de profundidad de corte. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		$selectores = $this->Profcorte->Selectore->find('list');
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
		$this->Profcorte->id = $id;
		if (!$this->Profcorte->exists()) {
			throw new NotFoundException(__('Invalid profcorte'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Profcorte->save($this->request->data)) {
				$this->Session->showMessage('El valor de profundidad de corte ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maqunaid));
			} else {
				$this->Session->showMessage('No se pudo salvar el valor de profundidad de corte. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Profcorte->read(null, $id);
		}
		$selectores = $this->Profcorte->Selectore->find('list');
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
		/*if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}*/
        
		$this->Profcorte->id = $id;
		if (!$this->Profcorte->exists()) {
			throw new NotFoundException(__('Invalid profcorte'));
		}
		if ($this->Profcorte->delete()) 
        {
            $this->Session->showMessage('El valor de profundidad de corte ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maquinaid));
		}
		$this->Session->showMessage('No se pudo eliminar la profundidad de corte', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
   /** Devuelve las profundidades de corte del selector pasado por parámetros*/
    public function getProfcortesFromSelector($selectorId)
    {
       $options['conditions'] = array('selectore_id' => $selectorId);
       $options['order'] = array('profcorte');
       
       $this->Profcorte->recursive = -1;
       $result = $this->Profcorte->find('all', $options);
       
       return $result;
    }
}