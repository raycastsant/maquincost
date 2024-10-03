<?php
App::uses('AppController', 'Controller');
/**
 * Vpcamaterialeselementoscortantes Controller
 *
 * @property Vpcamaterialeselementoscortante $Vpcamaterialeselementoscortante
 */
class VpcamaterialeselementoscortantesController extends AppController 
{
 var $uses = array('Vpcamaterialeselementoscortante', 'Elementoscortante', 'Tiposmateriale', 'Operacione');
/**
 * index method
 *
 * @return void
 */
	public function index($elementocteId, $activematerial=null) 
    {        
		$this->Elementoscortante->recursive = 1;
        $elementData = $this->Elementoscortante->read(null, $elementocteId);
        $elementname = "No encontrado";
        if(count($elementData) > 0)
         $elementname = $elementData['Tipoelementoscortante']['nombre']." ".$elementData['Elementoscortante']['nombre'];
        
		//$this->set('vpcamaterialeselementoscortantes', $this->paginate());
        //$tmateriales = $this->getTiposMaterrialesFromElementoCte($elementocteId);
        
        $this->Tiposmateriale->recursive = -1;
        $tmateriales = $this->Tiposmateriale->query("select * from tiposmateriales order by nombre, resistencia_min");
        
        $this->set('tmateriales', $tmateriales);
        $this->set('elementname', $elementname);
        $this->set('elementocteid', $elementocteId);
        
        if(!is_null($activematerial))
         $this->set('activematerial', $activematerial); 
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Vpcamaterialeselementoscortante->id = $id;
		if (!$this->Vpcamaterialeselementoscortante->exists()) {
			throw new NotFoundException(__('Invalid vpcamaterialeselementoscortante'));
		}
		$this->set('vpcamaterialeselementoscortante', $this->Vpcamaterialeselementoscortante->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($elementoId, $tmaterialId) 
    {
		if ($this->request->is('post')) 
        {
			$this->Vpcamaterialeselementoscortante->create();
			if ($this->Vpcamaterialeselementoscortante->save($this->request->data)) 
            {
				$this->Session->showMessage('Los datos han sido salvados correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'index', $elementoId, $tmaterialId));
			}
            else 
            {
				$this->Session->showMessage('No se pudieron salvar los datos. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
        $this->Elementoscortante->recursive = 0;
        $this->Tiposmateriale->recursive = -1;
        $elementoData = $this->Elementoscortante->read(null, $elementoId);
        $tmaterialData = $this->Tiposmateriale->read(null, $tmaterialId);
        $this->set('elementoName', $elementoData['Tipoelementoscortante']['nombre']." ".$elementoData['Elementoscortante']['nombre']);
        $this->set('elementoid', $elementoId);
        $this->set('tmaterialData', $tmaterialData);
        
		//$elementoscortantes = $this->Vpcamaterialeselementoscortante->Elementoscortante->find('list');
		//$tiposmateriales = $this->Vpcamaterialeselementoscortante->Tiposmateriale->find('list');
        
       /** Buscar las operaciones que soporta el elemento cortante, y que no se encuentren registradas en la tabla de vpca 
           para el material en cuestión*/ 
        $result = $this->Operacione->query("SELECT elementocortanteoperaciones.id, Operacione.nombre 
                    FROM operaciones AS Operacione INNER JOIN elementocortanteoperaciones ON (elementocortanteoperaciones.operacione_id = Operacione.id) 
                    WHERE elementocortanteoperaciones.elementoscortante_id = ".$elementoId." and Operacione.id not in(
                        select operacione_id from vpcamaterialeselementoscortantes inner join elementocortanteoperaciones on 
                        vpcamaterialeselementoscortantes.elementocortanteoperacione_id=elementocortanteoperaciones.id 
                        where elementoscortante_id=".$elementoId." and tiposmateriale_id=".$tmaterialId.")
                    ORDER BY Operacione.nombre ASC");
                                       
        if(count($result) > 0)
        {
            foreach($result as $value):
            {
                $elementocortanteoperaciones[$value['elementocortanteoperaciones']['id']] = $value['Operacione']['nombre'];
            }
            endforeach;
            
            $this->set(compact('elementocortanteoperaciones'));
        }
        else
        {
        	$this->Session->showMessage('Todas las operaciones han sido registradas para el material seleccionado', $this->MSG_WARNING);
			$this->redirect(array('action'=>'index', $elementoId, $tmaterialId));
        }
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $elementoId, $tmaterialId) 
    {
		$this->Vpcamaterialeselementoscortante->id = $id;
		if (!$this->Vpcamaterialeselementoscortante->exists()) {
			throw new NotFoundException(__('Invalid vpcamaterialeselementoscortante'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Vpcamaterialeselementoscortante->save($this->request->data)) {
				$this->Session->showMessage('El vpcamaterialeselementoscortante ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'index', $elementoId, $tmaterialId));
			} else {
				$this->Session->showMessage('No se pudo salvar el vpcamaterialeselementoscortante. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Vpcamaterialeselementoscortante->read(null, $id);
		}
        
	/*	$elementoscortantes = $this->Vpcamaterialeselementoscortante->Elementoscortante->find('list');
		$tiposmateriales = $this->Vpcamaterialeselementoscortante->Tiposmateriale->find('list');
		$operaciones = $this->Vpcamaterialeselementoscortante->Operacione->find('list');
		$this->set(compact('elementoscortantes', 'tiposmateriales', 'operaciones')); */
        
        $this->Elementoscortante->recursive = 0;
        $this->Tiposmateriale->recursive = -1;
        $elementoData = $this->Elementoscortante->read(null, $elementoId);
        $tmaterialData = $this->Tiposmateriale->read(null, $tmaterialId);
        $this->set('elementoName', $elementoData['Tipoelementoscortante']['nombre']." ".$elementoData['Elementoscortante']['nombre']);
        $this->set('elementoid', $elementoId);
        $this->set('tmaterialData', $tmaterialData);
        
       /** Buscar las operaciones que soporta el elemento cortante, y que no se encuentren registradas en la tabla de vpca 
           para el material en cuestión*/ 
        $result = $this->Operacione->query("SELECT elementocortanteoperaciones.id, Operacione.nombre 
                    FROM operaciones AS Operacione INNER JOIN elementocortanteoperaciones ON (elementocortanteoperaciones.operacione_id = Operacione.id) 
                    WHERE elementocortanteoperaciones.elementoscortante_id = ".$elementoId." and Operacione.id not in(
                        select operacione_id from vpcamaterialeselementoscortantes inner join elementocortanteoperaciones on 
                        vpcamaterialeselementoscortantes.elementocortanteoperacione_id=elementocortanteoperaciones.id 
                        where elementoscortante_id=".$elementoId." and tiposmateriale_id=".$tmaterialId." and vpcamaterialeselementoscortantes.id<>".$id.")
                    ORDER BY Operacione.nombre ASC");
                                       
        if(count($result) > 0)
        {
            foreach($result as $value):
            {
                $elementocortanteoperaciones[$value['elementocortanteoperaciones']['id']] = $value['Operacione']['nombre'];
            }
            endforeach;
            
            $this->set(compact('elementocortanteoperaciones'));
        }
        else
        {
        	$this->Session->showMessage('Todas las operaciones han sido registradas para el material seleccionado', $this->MSG_WARNING);
			$this->redirect(array('action'=>'index', $elementoId, $tmaterialId));
        }
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id=null, $elementoId, $tmaterialId) 
    {
		if (!$this->request->is('post')) 
        {
			throw new MethodNotAllowedException();
		}
        
		$this->Vpcamaterialeselementoscortante->id = $id;
		if (!$this->Vpcamaterialeselementoscortante->exists()) {
			throw new NotFoundException(__('Invalid vpcamaterialeselementoscortante'));
		}
        
		if ($this->Vpcamaterialeselementoscortante->delete()) 
        {
            $this->Session->showMessage('El registro ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action'=>'index', $elementoId, $tmaterialId));
		}
        
		$this->Session->showMessage('No se pudo eliminar el registro. Inténtelo nuevamente', $this->MSG_ERROR);
		$this->redirect(array('action'=>'index', $elementoId, $tmaterialId));
	}
    
    /** 
      Devuelve los registros que pertenecen al material y elemento cortante
      pasados por parametros*/
    public function getRegistrosFromMaterial($elementoId, $tmaterialId)
    {
       $options['fields'] = array('operaciones.id, operaciones.nombre, Vpcamaterialeselementoscortante.id, vel_min_viruta, vel_max_viruta, av_min_viruta, av_max_viruta, pfc_min_viruta, pfc_max_viruta, 
                                   vel_min_desbaste, vel_max_desbaste, av_min_desbaste, av_max_desbaste, pfc_min_desbaste, pfc_max_desbaste, 
                                   vel_min_afinar, vel_max_afinar, av_min_afinar, av_max_afinar, pfc_min_afinar, pfc_max_afinar');
       $options['joins'] = array
            (
                array
                    (   
                        'table' => 'elementocortanteoperaciones',
                        'type'=>'INNER',
                        'conditions'=> array('Vpcamaterialeselementoscortante.elementocortanteoperacione_id = elementocortanteoperaciones.id')
                    ),
                array
                    (   
                        'table' => 'operaciones',
                        'type'=>'INNER',
                        'conditions'=> array('elementocortanteoperaciones.operacione_id = operaciones.id')
                    )
            );
       $options['conditions'] = array('elementocortanteoperaciones.elementoscortante_id'=>$elementoId, 'Vpcamaterialeselementoscortante.tiposmateriale_id'=>$tmaterialId);
       $options['order'] = array('operaciones.nombre');
       
       $this->Vpcamaterialeselementoscortante->recursive = -1;
       $result = $this->Vpcamaterialeselementoscortante->find('all', $options);
       
       $this->set('registros', $result);
       $this->set('elementoid', $elementoId);
       $this->set('tmaterialid', $tmaterialId);
       
       $this->layout = 'ajax';
       $this->render('/Elements/elemntocte_vpca_material_element','ajax');
    }
}