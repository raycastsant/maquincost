<?php
App::uses('AppController', 'Controller');
App::uses('OrdenesController', 'Controller');

/**
 * Planmensualregistros Controller
 *
 * @property Planmensualregistro $Planmensualregistro
 */
class PlanmensualregistrosController extends AppController 
{
    var $uses = array('Planmensualregistro', 'Ordene', 'Ordenreal', 'Tipotrabajo', 'Pieza');   
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Planmensualregistro->recursive = 0;
		$this->set('planmensualregistros', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Planmensualregistro->id = $id;
		if (!$this->Planmensualregistro->exists()) {
			throw new NotFoundException(__('Invalid planmensualregistro'));
		}
		$this->set('planmensualregistro', $this->Planmensualregistro->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($planMensualId) 
    {
		if ($this->request->is('post')) 
        {
			$this->Planmensualregistro->create();
			if ($this->Planmensualregistro->save($this->request->data)) 
            {
               //Se crea la orden de trabajo                
                $ordenData['Ordene']['numero'] = $this->request->data['Ordene']['numero'];
                $ordenData['Ordene']['planmensualregistro_id'] = $this->Planmensualregistro->id;
                $ordenData['Ordene']['planificada'] = 1;
                $ordenData['Ordene']['cant_piezas'] = $this->request->data['Planmensualregistro']['cantpiezas'];
                $ordenData['Ordene']['tipotrabajo_id'] = $this->request->data['Planmensualregistro']['tipotrabajo_id'];
                
                //$ordenData['Ordene']['precio_material'] = $this->request->data['Ordene']['precio_material'];
                //$ordenData['Ordene']['cerrada'] = 0;
                
                $this->Session->showMessage('El registro ha sido salvado correctamente', $this->MSG_SUCCESS);
                
                $this->Ordene->create();
                if($this->Ordene->save($ordenData))
                {
                    $date = date("Y-m-d");
                    $this->Ordenreal->create();
                    $ordenRealData['Ordenreal']['ordene_id'] = $this->Ordene->id;
                    $ordenRealData['Ordenreal']['tipotrabajo_id'] = $this->request->data['Planmensualregistro']['tipotrabajo_id'];
                    $ordenRealData['Ordenreal']['materiale_id'] = $this->request->data['Planmensualregistro']['materiale_id'];
                    $ordenRealData['Ordenreal']['piezas_elaboradas'] = 0;
                    $ordenRealData['Ordenreal']['gasto_materiales'] = 0;
                    $ordenRealData['Ordenreal']['fecha_inicio'] = $date;
                    $ordenRealData['Ordenreal']['fecha_fin'] = $date;
                    $ordenRealData['Ordenreal']['hora_inicio'] = '00:00:00';
                    $ordenRealData['Ordenreal']['hora_fin'] = '00:00:00';
                    //$ordenRealData['Ordenreal']['fecha_cierre'] = '0000-00-00';
                    $ordenRealData['Ordenreal']['consumo_salario'] = 0;
                    $ordenRealData['Ordenreal']['cerrada'] = 0;
                    
                    if(!$this->Ordenreal->save($ordenRealData))
                     $this->Session->showMessage('Error al crear la orden de trabajo', $this->MSG_ERROR);
                        
				    $this->redirect(array('controller'=>'ordenes', 'action'=>'edit', $this->Ordene->id, $planMensualId));
                }
                else
                 $this->Session->showMessage('Error al crear la orden de trabajo', $this->MSG_ERROR);
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el registro. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
	//	$planesmensuales = $this->Planmensualregistro->Planesmensuale->find('list');
		$piezas = $this->Pieza->find('list', array('order'=>'Pieza.nombre'));
		$materiales = $this->Planmensualregistro->Materiale->find('list', array('order'=>'Materiale.descripcion'));
        $tipotrabajos = $this->Tipotrabajo->find('list');
        
		$this->set(compact('piezas', 'materiales', 'tipotrabajos'));
        $this->set('planMensualId', $planMensualId);
        
        $plan_Mensual = $this->Planmensualregistro->Planesmensuale->read(null, $planMensualId);
        $ordenCont = new OrdenesController();
        $orden_number = $ordenCont->get_auto_number($plan_Mensual['Planesmensuale']['mes'], $plan_Mensual['Planesmensuale']['anno']);
        $this->set('orden_number', $orden_number);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $planMensualId, $numeroorden=null) 
    {
		$this->Planmensualregistro->id = $id;
		if (!$this->Planmensualregistro->exists()) {
			throw new NotFoundException(__('Invalid planmensualregistro'));
		}
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Planmensualregistro->save($this->request->data)) 
            {
               //Se actualiza la orden de trabajo
                $ordenData['Ordene']['numero'] = $this->request->data['Ordene']['numero'];
                $ordenData['Ordene']['cant_piezas'] = $this->request->data['Planmensualregistro']['cantpiezas'];
                //$ordenData['Ordene']['precio_material'] = $this->request->data['Ordene']['precio_material'];
                $this->Ordene->recursive = -1;
                $orden = $this->Ordene->findByPlanmensualregistroId($id);
                $this->Ordene->id = $orden['Ordene']['id'];
                $this->Ordene->save($ordenData);
                
                $ordenCont = new OrdenesController();
                $res = $ordenCont->calcular_costo_pieza($this->Ordene->id);
                if(!is_null($res))
                {
                    $this->Ordene->saveField('salario_plan', $res['salario']);
                    $this->Ordene->saveField('costo_pieza', $res['costo']);
                    $laboriosidad = ($res['tiempott'] * $ordenData['Ordene']['cant_piezas']);
                    $this->Ordene->saveField('laboriosidad', $laboriosidad); 
                }
                
				$this->Session->showMessage('El registro ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'planesmensuales', 'action'=>'edit', $planMensualId));
			} 
            else 
            {
				$this->Session->showMessage('No se pudo salvar el registro. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Planmensualregistro->read(null, $id);
		}
        
		//$planesmensuales = $this->Planmensualregistro->Planesmensuale->find('list');
		$piezas = $this->Planmensualregistro->Pieza->find('list');
		$materiales = $this->Planmensualregistro->Materiale->find('list', array('order'=>'Materiale.descripcion'));
		$this->set(compact('piezas', 'materiales'));
        $this->set('planMensualId', $planMensualId);
        $this->set('numeroorden', $numeroorden);
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id=null, $planMensualId) 
    {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
        
		$this->Planmensualregistro->id = $id;
		if (!$this->Planmensualregistro->exists()) {
			throw new NotFoundException(__('Invalid planmensualregistro'));
		}
        
		if ($this->Planmensualregistro->delete()) 
        {
            $this->Session->showMessage('El registro ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('controller'=>'planesmensuales', 'action'=>'edit', $planMensualId));
		}
        
		$this->Session->showMessage('No se pudo eliminar el registro', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
