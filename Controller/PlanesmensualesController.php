<?php
App::uses('AppController', 'Controller');
/**
 * Planesmensuales Controller
 *
 * @property Planesmensuale $Planesmensuale
 */
class PlanesmensualesController extends AppController 
{
    var $uses = array('Planesmensuale', 'Maquina', 'Planmensualregistro');   
/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
        $this->Planesmensuale->recursive = 0;
        $this->paginate = array('limit' => 8, 'order'=>'Planesmensuale.anno, Planesmensuale.mes', 'conditions'=>array('planificada'=>'1'));
		$this->set('planesmensuales', $this->paginate());
        $this->set('meses', $this->meses);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Planesmensuale->id = $id;
		if (!$this->Planesmensuale->exists()) {
			throw new NotFoundException(__('Invalid planesmensuale'));
		}
		$this->set('planesmensuale', $this->Planesmensuale->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() 
    {
		if ($this->request->is('post')) 
        {
			$this->Planesmensuale->create();
			if ($this->Planesmensuale->save($this->request->data)) 
            {
				$this->Session->showMessage('El plan mensual ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'edit', $this->Planesmensuale->id));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el plan mensual. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
        $this->set('meses', $this->meses);
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
		$this->Planesmensuale->id = $id;
		if (!$this->Planesmensuale->exists()) {
			throw new NotFoundException(__('Invalid planesmensuale'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Planesmensuale->save($this->request->data)) 
            {
				$this->Session->showMessage('El plan mensual ha sido salvado correctamente', $this->MSG_SUCCESS);
				//$this->redirect(array('action' => 'index'));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el plan mensual. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Planesmensuale->read(null, $id);
		}
        
        $this->set('meses', $this->meses);
            
        $this->Planmensualregistro->recursive = -1;
        $sql= "select planmensualregistros.*, ordenes.id, ordenes.numero, ordenes.costo_pieza, piezas.nombre, materiales.descripcion,
               ordenreals.id, ordenreals.piezas_elaboradas, ordenreals.pieza_costo_unit, ordenreals.mat_prim_peso_unit, ordenreals.pieza_peso_unit
               from (((planmensualregistros inner join piezas on planmensualregistros.pieza_id=piezas.id)
               inner join materiales on planmensualregistros.materiale_id=materiales.id)
               left join ordenes on planmensualregistros.id=ordenes.planmensualregistro_id)left join ordenreals on 
               ordenreals.ordene_id=ordenes.id               
               where planmensualregistros.planesmensuale_id=".$id;
        $planmensualregistros = $this->Planmensualregistro->query($sql);
        $this->set('planmensualregistros', $planmensualregistros);
        
        $this->Maquina->recursive = 0;
        $maquinas = $this->Maquina->find('all');
        $this->set('maquinas', $maquinas);
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
		$this->Planesmensuale->id = $id;
		if (!$this->Planesmensuale->exists()) {
			throw new NotFoundException(__('Invalid planesmensuale'));
		}
		if ($this->Planesmensuale->delete()) {
            $this->Session->showMessage('El plan mensual ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el plan mensual', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
     /** 
     * Obtiene los planes mensuales según 
     el año seleccionado*/
    public function getByAnno()
    {       
        $operacionId = -1;
        
        if(array_key_exists('anno', $this->request->data))
         $anno = $this->request->data['anno'];
        
        $this->Planesmensuale->recursive = -1;
        $result = $this->Planesmensuale->find('list', array('order'=>'Planesmensuale.mes', 'conditions'=>array('Planesmensuale.anno'=>$anno)));
        
        $meseslist = array('-1'=>'-- Seleccione el mes --');
        foreach($result as $key=>$value)
        {
            $meseslist[$value] = $this->meses[$value];
        }
        
        $this->set('values', $meseslist);

		$this->layout = 'ajax';
		$this->render('/Elements/ajax_dropdown','ajax');
    }
}
?>