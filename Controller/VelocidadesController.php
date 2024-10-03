<?php
App::uses('AppController', 'Controller');
/**
 * Velocidades Controller
 *
 * @property Velocidade $Velocidade
 */
class VelocidadesController extends AppController 
{
/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Velocidade->recursive = 0;
		$this->set('velocidades', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) 
    {
		$this->Velocidade->id = $id;
		if (!$this->Velocidade->exists()) {
			throw new NotFoundException(__('Invalid velocidade'));
		}
		$this->set('velocidade', $this->Velocidade->read(null, $id));
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
			$this->Velocidade->create();
			if ($this->Velocidade->save($this->request->data)) 
            {
				$this->Session->showMessage('El valor de velocidad ha sido guardado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maqunaid));
			}
             else {
				$this->Session->showMessage('No se pudo salvar el valor de velocidad. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		$velocidadrangos = $this->Velocidade->Velocidadrango->find('list');
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
		$this->Velocidade->id = $id;
		if (!$this->Velocidade->exists()) {
			throw new NotFoundException(__('Invalid velocidade'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Velocidade->save($this->request->data)) 
            {
				$this->Session->showMessage('El valor de velocidad ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maqunaid));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el valor de velocidad. Inténtelo nuevamente', $this->MSG_ERROR);
                $this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maqunaid));
			}
		} else {
			$this->request->data = $this->Velocidade->read(null, $id);
		}
        
    //  $velocidadrangos = $this->Velocidade->Velocidadrango->find('list');
	//	$this->set(compact('velocidadrangos'));
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
        
		$this->Velocidade->id = $id;
		if (!$this->Velocidade->exists()) {
			throw new NotFoundException(__('Invalid velocidade'));
		}
		if ($this->Velocidade->delete()) {
            $this->Session->showMessage('El valor ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maquinaid));
		}
		$this->Session->showMessage('No se pudo eliminar el valor', $this->MSG_ERROR);
        
		$this->redirect(array('controller'=>'velocidadrangos', 'action'=>'index', $maquinaid));
	}
    
    /** Devuelve las velocidades del rango 
        pasado por parametros*/
    public function getVelocidadesFromRango($rangoId)
    {
       $options['conditions'] = array('velocidadrango_id' => $rangoId);
       $options['order'] = array('velocidad');
       
       $this->Velocidade->recursive = -1;
       $result = $this->Velocidade->find('all', $options);
       
       return $result;
    }
}
