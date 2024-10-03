<?php
App::uses('AppController', 'Controller');
/**
 * Maquinasoperaciones Controller
 *
 * @property Maquinasoperacione $Maquinasoperacione
 */
class MaquinasoperacionesController extends AppController 
{
    var $uses = array('Maquinasoperacione', 'Maquina');   
/**
 * index method
 *
 * @return void
 */
	public function index($maquinaId=null) 
    {      
		$this->Maquinasoperacione->recursive = 0;
        if(!is_null($maquinaId))
         $this->paginate = array('conditions'=>array('maquina_id'=>$maquinaId));
         
		$this->set('maquinasoperaciones', $this->paginate());
        $this->set('maquinaid', $maquinaId);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Maquinasoperacione->id = $id;
		if (!$this->Maquinasoperacione->exists()) {
			throw new NotFoundException(__('Invalid maquinasoperacione'));
		}
		$this->set('maquinasoperacione', $this->Maquinasoperacione->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($maquinaId) 
    {
		if ($this->request->is('post')) {
			$this->Maquinasoperacione->create();
			if ($this->Maquinasoperacione->save($this->request->data)) {
				$this->Session->showMessage('La operación ha sido definina correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'index', $maquinaId));
			} else {
				$this->Session->showMessage('No se pudo definir la operación. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
        $this->Maquina->recursive = 0;
        $maquinaData = $this->Maquina->read(null, $maquinaId);
        $maquinanombre = "Nombre no encontrado";
        
        if(count($maquinaData) > 0)
         $maquinanombre = $maquinaData['Maquina']['nombre'];
        
		//$maquinas = $this->Maquinasoperacione->Maquina->find('list');
		$operaciones = $this->Maquinasoperacione->Operacione->find('list', array('order'=>array('nombre'=>'asc')));
		$this->set(compact('operaciones'));
        $this->set('maquinaid', $maquinaId);
        $this->set('maquinanombre', $maquinanombre);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $maquinaId) 
    {
		$this->Maquinasoperacione->id = $id;
		if (!$this->Maquinasoperacione->exists()) {
			throw new NotFoundException(__('Invalid maquinasoperacione'));
		}
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Maquinasoperacione->save($this->request->data)) {
				$this->Session->showMessage('La operación ha sido definina correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'index', $maquinaId));
			} else {
				$this->Session->showMessage('No se pudo definir la operación. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
		  $this->request->data = $this->Maquinasoperacione->read(null, $id);
		}
        
        $this->Maquina->recursive = 0;
        $maquinaData = $this->Maquina->read(null, $maquinaId);
        $maquinanombre = "Nombre no encontrado";
        
        if(count($maquinaData) > 0)
         $maquinanombre = $maquinaData['Maquina']['nombre'];
         
		//$maquinas = $this->Maquinasoperacione->Maquina->find('list');
		$operaciones = $this->Maquinasoperacione->Operacione->find('list');
		$this->set(compact('operaciones'));
        $this->set('maquinaid', $maquinaId);
        $this->set('maquinanombre', $maquinanombre);
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $maquinaId) 
    {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Maquinasoperacione->id = $id;
		if (!$this->Maquinasoperacione->exists()) {
			throw new NotFoundException(__('Invalid maquinasoperacione'));
		}
		if ($this->Maquinasoperacione->delete()) {
            $this->Session->showMessage('Relación Operación-Máquina eliminada correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action'=>'index', $maquinaId));
		}
		$this->Session->showMessage('No se pudo eliminar la relación Operación-Máquina', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
