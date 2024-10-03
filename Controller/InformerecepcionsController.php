<?php
App::uses('AppController', 'Controller');
/**
 * Informerecepcions Controller
 *
 * @property Informerecepcion $Informerecepcion
 */
class InformerecepcionsController extends AppController 
{
    var $uses = array('Ordenreal', 'Informerecepcion');
/**
 * index method
 *
 * @return void
 */
	/*public function index() {
		$this->Informerecepcion->recursive = 0;
		$this->set('informerecepcions', $this->paginate());
	}*/

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($ordenrealId) 
    {
        $this->Ordenreal->id = $ordenrealId;
        if($this->Ordenreal->exists())
        {
            $this->Informerecepcion->recursive = 0;
            $informe = $this->Informerecepcion->find('first', array('conditions'=>array('ordenreal_id'=>$ordenrealId)));
            if(empty($informe))
             $this->redirect(array('action'=>'add', $ordenrealId));
            else
            {
                $this->Ordenreal->rcursive = -1;
                $orden = $this->Ordenreal->query('select piezas.nombre from ((piezas inner join planmensualregistros on piezas.id=planmensualregistros.pieza_id)
                                                  inner join ordenes on ordenes.planmensualregistro_id=planmensualregistros.id) 
                                                  inner join ordenreals on ordenes.id=ordenreals.ordene_id 
                                                  where ordenreals.id='.$ordenrealId);
                                                  
                $this->set('informerecepcion', $informe);
                $this->set('piezanombre', $orden[0]['piezas']['nombre']);   
                
                $params = array(
                    'download' => false,
                    'name' => 'informe_recepcion.pdf',
                    'paperOrientation' => 'landscape',
                    'paperSize' => 'letter'
                );
                $this->set($params);
            }
        } 
        
	/*	$this->Informerecepcion->id = $id;
		if (!$this->Informerecepcion->exists()) 
        {
			throw new NotFoundException(__('Invalid informerecepcion'));
		}
		$this->set('informerecepcion', $this->Informerecepcion->read(null, $id)); */
	}

/**
 * add method
 *
 * @return void
 */
	public function add($ordenrealId) 
    {
		if ($this->request->is('post')) 
        {
			$this->Informerecepcion->create();
			if ($this->Informerecepcion->save($this->request->data)) 
            {
				$this->Session->showMessage('El informe de recepción ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'view', $ordenrealId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el informe de recepción. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		
        $this->Ordenreal->recursive = 0;
        $ordenreal = $this->Ordenreal->read(null, $ordenrealId);
        $this->set('ordenreal', $ordenreal);
        
        /*$ordenreals = $this->Informerecepcion->Ordenreal->find('list');
		$this->set(compact('ordenreals'));*/
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
		$this->Informerecepcion->id = $id;
		if (!$this->Informerecepcion->exists()) {
			throw new NotFoundException(__('Invalid informerecepcion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Informerecepcion->save($this->request->data)) 
            {
				$this->Session->showMessage('El informe de recepción ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'view', $this->request->data['Informerecepcion']['ordenreal_id']));
			} 
            else 
            {
				$this->Session->showMessage('No se pudo salvar el informe de recepción. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} 
        else 
        {
			$this->request->data = $this->Informerecepcion->read(null, $id);
            $this->Ordenreal->recursive = 0;
            $ordenreal = $this->Ordenreal->read(null, $this->request->data['Informerecepcion']['ordenreal_id']);
            $this->set('ordenreal', $ordenreal);
		}
		
        /*$ordenreals = $this->Informerecepcion->Ordenreal->find('list');
		$this->set(compact('ordenreals'));*/
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
		$this->Informerecepcion->id = $id;
		if (!$this->Informerecepcion->exists()) {
			throw new NotFoundException(__('Invalid informerecepcion'));
		}
		if ($this->Informerecepcion->delete()) {
            $this->Session->showMessage('informerecepcion eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el informerecepcion', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
