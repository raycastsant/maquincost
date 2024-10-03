<?php
App::uses('AppController', 'Controller');
/**
 * Tiemposmaquinadoreales Controller
 *
 * @property Tiemposmaquinadoreale $Tiemposmaquinadoreale
 */
class TiemposmaquinadorealesController extends AppController 
{

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tiemposmaquinadoreale->recursive = 0;
		$this->set('tiemposmaquinadoreales', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		$this->Tiemposmaquinadoreale->id = $id;
		if (!$this->Tiemposmaquinadoreale->exists()) {
			throw new NotFoundException(__('Invalid tiemposmaquinadoreale'));
		}
		$this->set('tiemposmaquinadoreale', $this->Tiemposmaquinadoreale->read(null, $id));
	}*/

/**
 * add method
 *
 * @return void
 */
	public function add($ordenrealId) 
    {
		if ($this->request->is('post')) 
        {
			$this->Tiemposmaquinadoreale->create();
			if ($this->Tiemposmaquinadoreale->save($this->request->data)) 
            {
				$this->Session->showMessage('El registro ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'ordenreals', 'action'=>'edit', $ordenrealId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el registro. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
		//$ordenreals = $this->Tiemposmaquinadoreale->Ordenreal->find('list');
		$maquinas = $this->Tiemposmaquinadoreale->Maquina->find('list', array('order'=>'Maquina.nombre'));
		$this->set(compact('maquinas'));
        $this->set('ordenrealId', $ordenrealId);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $ordenrealId) 
    {
		$this->Tiemposmaquinadoreale->id = $id;
		if (!$this->Tiemposmaquinadoreale->exists()) {
			throw new NotFoundException(__('Invalid tiemposmaquinadoreale'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Tiemposmaquinadoreale->save($this->request->data)) 
            {
				$this->Session->showMessage('El registro ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'ordenreals', 'action'=>'edit', $ordenrealId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el registro. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Tiemposmaquinadoreale->read(null, $id);
		}
        
		//$ordenreals = $this->Tiemposmaquinadoreale->Ordenreal->find('list');
		$maquinas = $this->Tiemposmaquinadoreale->Maquina->find('list', array('order'=>'Maquina.nombre'));
		$this->set(compact('maquinas'));
        $this->set('ordenrealId', $ordenrealId);
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
		$this->Tiemposmaquinadoreale->id = $id;
		if (!$this->Tiemposmaquinadoreale->exists()) {
			throw new NotFoundException(__('Invalid tiemposmaquinadoreale'));
		}
		if ($this->Tiemposmaquinadoreale->delete()) {
            $this->Session->showMessage('tiemposmaquinadoreale eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el tiemposmaquinadoreale', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** Devuelve los tiempos de maquinado de la orden real pasada
        por parámetros*/ 
    public function get_tiempos_maquinado_ordenreal_AJAX($ordenrealId)
    {
        $this->Tiemposmaquinadoreale->recursive = 0;
        $tiempos = $this->Tiemposmaquinadoreale->find('all', array('conditions'=>array('ordenreal_id'=>$ordenrealId)));
        
        $this->set('tiempos', $tiempos);
        
        $this->layout = 'ajax';
		$this->render('/Elements/orden_real_tiempos_maquinado', 'ajax');
    }
    
    public function delete_via_AJAX() 
    {
	    $id = -1;
        
        if(array_key_exists('id', $this->request->data['Tiemposmaquinadoreale']))
         $id = $this->request->data['Tiemposmaquinadoreale']['id'];
         
        $this->Tiemposmaquinadoreale->id = $id;
        
        $this->set('value', $this->Tiemposmaquinadoreale->delete());
        //$this->set('value', $id);
        //$this->Session->showMessage('Registro eliminado correctamente', $this->MSG_SUCCESS);
        
        $this->layout = 'ajax';
        $this->render('/Elements/ajax_input','ajax');
	}
    
    public function get_tiempos_maquinado_reales($ordenRealId)
    {
        $this->Tiemposmaquinadoreale->recursive = -1;
        $options['fields'] = array('Tiemposmaquinadoreale.maquina_id', 'Tiemposmaquinadoreale.tiempo_auxiliar', 'Tiemposmaquinadoreale.tiempo_corte');
      /*  $options['joins'] = array(
                                array(   
                                        'table' => 'ordenreals',
                                        'type'=>'INNER',
                                        'conditions'=> array('ordenreals.id = Tiemposmaquinadoreale.ordenreal_id')
                                     ),
                                array(   
                                        'table' => 'ordenes',
                                        'type'=>'INNER',
                                        'conditions'=> array('ordenreals.ordenes_id = ordenes.id')
                                     )
                             );*/
        $options['conditions'] = array('Tiemposmaquinadoreale.ordenreal_id'=>$ordenRealId);
        $tiemposMaquinado = $this->Tiemposmaquinadoreale->find('all', $options);
        
        return $tiemposMaquinado;
    }
}