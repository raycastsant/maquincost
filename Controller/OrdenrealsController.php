<?php
App::uses('AppController', 'Controller');
/**
 * Ordenreals Controller
 *
 * @property Ordenreal $Ordenreal
 */
class OrdenrealsController extends AppController 
{
    var $uses = array('Ordenreal', 'Pieza', 'Planmensualregistro');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ordenreal->recursive = 0;
		$this->set('ordenreals', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ordenreal->id = $id;
		if (!$this->Ordenreal->exists()) {
			throw new NotFoundException(__('Invalid ordenreal'));
		}
		$this->set('ordenreal', $this->Ordenreal->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ordenreal->create();
			if ($this->Ordenreal->save($this->request->data)) {
				$this->Session->showMessage('El ordenreal ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el ordenreal. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		$ordenes = $this->Ordenreal->Ordene->find('list');
		$this->set(compact('ordenes'));
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
		$this->Ordenreal->id = $id;
		if (!$this->Ordenreal->exists()) {
			throw new NotFoundException(__('Invalid ordenreal'));
		}
		if ($this->request->is('post') || $this->request->is('put')) 
        {
            if($this->request->data['Ordenreal']['cerrada'] === '1')
             $this->request->data['Ordenreal']['fecha_cierre'] = date("Y-m-d");
             
			if ($this->Ordenreal->save($this->request->data)) 
            {
				$this->Session->showMessage('La orden ha sido salvada correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'edit', $id));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar la orden. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		} 
        //else 
        //{
            $this->Ordenreal->recursive = 2;
			$this->request->data = $this->Ordenreal->read(null, $id);
		//}
        
        $this->Pieza->recursive = -1;
        $piezaData = $this->Pieza->read(null, $this->request->data['Ordene']['Planmensualregistro']['pieza_id']);
        $this->set('piezaData', $piezaData);
        
		$materiales = $this->Ordenreal->Materiale->find('list', array('order'=>'Materiale.descripcion'));
        $this->set(compact('materiales'));
        
        $tipotrabajos = $this->Ordenreal->Tipotrabajo->find('list', array('order'=>'Tipotrabajo.descripcion'));
		$this->set(compact('tipotrabajos'));
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
		$this->Ordenreal->id = $id;
		if (!$this->Ordenreal->exists()) {
			throw new NotFoundException(__('Invalid ordenreal'));
		}
		if ($this->Ordenreal->delete()) {
            $this->Session->showMessage('ordenreal eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el ordenreal', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** Calcula el costo real de una pieza según metodología.
        Devuelve un arreglo con el gasto real de salario y el gasto de la pieza*/
    public function calcular_costo_pieza($ordenRealId)
    {
        $result = null;
        
        $this->Ordenreal->recursive = -1;                                
        $sql = "select fuerzatrabajoordenes.tarifa, sum(fuerzatrabajoordenes.totalhoras) as tiempos 
                from fuerzatrabajoordenes 
                where fuerzatrabajoordenes.ordenreal_id=".$ordenRealId. " group by fuerzatrabajoordenes.id";                
        $importeTotalHoras = $this->Ordenreal->query($sql);   //Paso 1 - 3
                
        $ordenData = $this->Ordenreal->findById($ordenRealId);    
        if(count($importeTotalHoras)>0 && count($ordenData)>0)
        {
            $importe = 0;
            $tiempoTT = 0;
            
            foreach($importeTotalHoras as $ith):
            {
                $tiempo = $ith['0']['tiempos'];
                $imp = ($ith['fuerzatrabajoordenes']['tarifa'] * $tiempo);
                $importe += $imp;
                $tiempoTT += $tiempo;
            }
            endforeach;
            
            /*$proyecto = ($ordenData['Ordene']['tarifa_proyectista']*$ordenData['Ordene']['tiempo_proyecto']);
            $tecnologia = ($ordenData['Ordene']['tarifa_tecnologo']*$ordenData['Ordene']['tiempo_tecnologia']);
            $paso5 = $proyecto + $tecnologia + $importe;   */
             
            $paso5 = $importe;    //Paso 4 - 5
            
            $sql = "select sum(maquinas.coef_pieza) as sumcoef 
                    from tiemposmaquinadoreales inner join maquinas on tiemposmaquinadoreales.maquina_id=maquinas.id 
                    where tiemposmaquinadoreales.ordenreal_id=".$ordenRealId;
            $sumaCoefMaq = $this->Ordenreal->query($sql);     //Paso 6
            
            $paso7 = $paso5*$sumaCoefMaq[0][0]['sumcoef'];
             
            $peso = ($ordenData['Ordenreal']['mat_prim_peso_unit'] / 1000);   // de Kg a Toneladas
            $costo = ($peso * $ordenData['Ordenreal']['precio_material']) + $paso7;
            
            $result = array('salario'=>$paso5, 'costo'=>$costo, 'tiempott'=>$tiempoTT);
        }
                        
        return $result;
    }
    
    /** Actualiza los gastos de la orden real via AJAX*/
    public function updateOrdenRealGastos_AJAX($ordenRealId, $cantPiezas, $peso, $precio)
    {
        $res = $this->calcular_costo_pieza($ordenRealId);
        
        if(!is_null($res))
        {
           // $res['costo'] = ($res['costo'] / $cantPiezas);   //!!!!!SEGUN NOTA DE TECNOLOGO!!!!!!
            $pieza_precio = ($res['costo'] / $cantPiezas);   //!!!!!SEGUN NOTA DE TECNOLOGO!!!!!!
            
            $this->Ordenreal->id = $ordenRealId;
            $this->Ordenreal->saveField('consumo_salario', $res['salario']);
            $this->set('gastoSalario', round($res['salario'], 2));
            
            /*$laboriosidad = ($res['tiempott'] * $cantPiezas);
            $this->Ordenreal->saveField('laboriosidad', $laboriosidad); */
        }
        
//        $this->set('res', $res);
        $this->set('cantPiezas', $cantPiezas);
        $gasto_materiales = (($precio * $peso) * $cantPiezas);
        
        $imp = $this->Ordenreal->query("select sum(vales.importe) as importe from ordenreals inner join vales on 
                                        ordenreals.id=vales.ordenreal_id where ordenreals.id=".$ordenRealId);
                                        
        if(!is_null($imp[0][0]['importe']))
         $gasto_materiales += $imp[0][0]['importe'];
        
        $this->Ordenreal->saveField('gasto_materiales', $gasto_materiales);
        $this->set('gasto_materiales', round($gasto_materiales, 2));
        
        $costoPiezaUnitario = (($res['salario']+$gasto_materiales)/$cantPiezas);  // !!!!!SEGUN NOTA DE TECNOLOGO!!!!!!
        $this->Ordenreal->saveField('pieza_costo_unit', $costoPiezaUnitario);
        $this->Ordenreal->saveField('pieza_precio', $pieza_precio);
        $this->set('costoPiezaUnitario', round($costoPiezaUnitario, 2));
        
        $this->layout = 'ajax';
		$this->render('/Elements/orden_real_gastos', 'ajax');
    }
}