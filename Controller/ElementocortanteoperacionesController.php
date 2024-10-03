<?php
App::uses('AppController', 'Controller');
/**
 * Elementocortanteoperaciones Controller
 *
 * @property Elementocortanteoperacione $Elementocortanteoperacione
 */
class ElementocortanteoperacionesController extends AppController 
{
    var $uses = array('Elementocortanteoperacione', 'Elementoscortante');   
/**
 * index method
 *
 * @return void
 */
	public function index($elementoId=null) 
    {
        if(!is_null($elementoId))
         $this->paginate = array('conditions'=>array('elementoscortante_id'=>$elementoId));
         
		$this->Elementocortanteoperacione->recursive = 2;
		$this->set('elementocortanteoperaciones', $this->paginate());
        $this->set('elementoid', $elementoId);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Elementocortanteoperacione->id = $id;
		if (!$this->Elementocortanteoperacione->exists()) {
			throw new NotFoundException(__('Invalid elementocortanteoperacione'));
		}
		$this->set('elementocortanteoperacione', $this->Elementocortanteoperacione->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($elementoId) 
    {
		if ($this->request->is('post')) 
        {
			$this->Elementocortanteoperacione->create();
			if ($this->Elementocortanteoperacione->save($this->request->data)) 
            {
				$this->Session->showMessage('La operación ha sido definina correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'index', $elementoId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo definir la operación. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
        $this->Elementoscortante->recursive = 1;
        $elementoData = $this->Elementoscortante->read(null, $elementoId);
        $elementonombre = "Nombre no encontrado";
        
        if(count($elementoData) > 0)
         $elementonombre = $elementoData['Tipoelementoscortante']['nombre'].' '.$elementoData['Elementoscortante']['nombre'];
        
		$operaciones = $this->Elementocortanteoperacione->Operacione->find('list');
		$elementoscortantes = $this->Elementocortanteoperacione->Elementoscortante->find('list');
		$this->set(compact('operaciones'));
        $this->set('elementoid', $elementoId);
        $this->set('elementonombre', $elementonombre);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $elementoId) 
    {
		$this->Elementocortanteoperacione->id = $id;
		if (!$this->Elementocortanteoperacione->exists()) {
			throw new NotFoundException(__('Invalid elementocortanteoperacione'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Elementocortanteoperacione->save($this->request->data)) {
				$this->Session->showMessage('La operación ha sido definina correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'index', $elementoId));
			} else {
				$this->Session->showMessage('No se pudo definir la operación. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Elementocortanteoperacione->read(null, $id);
		}
        
        $this->Elementoscortante->recursive = 1;
        $elementoData = $this->Elementoscortante->read(null, $elementoId);
        $elementonombre = "Nombre no encontrado";
        
        if(count($elementoData) > 0)
         $elementonombre = $elementoData['Tipoelementoscortante']['nombre'].' '.$elementoData['Elementoscortante']['nombre'];
        
        
		$operaciones = $this->Elementocortanteoperacione->Operacione->find('list');
		$elementoscortantes = $this->Elementocortanteoperacione->Elementoscortante->find('list');
		$this->set(compact('operaciones'));
        $this->set('elementoid', $elementoId);
        $this->set('elementonombre', $elementonombre);
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $elementoId) 
    {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
        
		$this->Elementocortanteoperacione->id = $id;
		if (!$this->Elementocortanteoperacione->exists()) 
        {
			throw new NotFoundException(__('Invalid elementocortanteoperacione'));
		}
        
		if ($this->Elementocortanteoperacione->delete()) {
            $this->Session->showMessage('Relación Operación-Elemento cortante eliminada correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action'=>'index', $elementoId));
		}
		$this->Session->showMessage('No se pudo eliminar la relación Operación-Elemento cortante', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}