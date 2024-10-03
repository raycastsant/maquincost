<?php
App::uses('AppController', 'Controller');

/**
 * Ctregistros Controller
 *
 * @property Ctregistro $Ctregistro
 */
class CtregistrosController extends AppController 
{
   var $uses = array('Ctregistro', 'Operacione', 'Elementoscortante', 'Instrumentosauxiliare','Instrumentosmedicion');
      
/**
 * index method
 *
 * @return void
 */
	public function index() 
    {
		$this->Ctregistro->recursive = 0;
		$this->set('ctregistros', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ctregistro->id = $id;
		if (!$this->Ctregistro->exists()) {
			throw new NotFoundException(__('Invalid ctregistro'));
		}
		$this->set('ctregistro', $this->Ctregistro->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($cartaId, $tipoMaterialId) 
    {
		if ($this->request->is('post')) 
        {
            $msg = "";
            $this->Operacione->id = $this->request->data['Ctregistro']['operacione_id'];
            if (!$this->Operacione->exists()) 
            {
			     $msg = "La operación seleccionada no existe.";
		    }
            
            $this->Elementoscortante->id = $this->request->data['Ctregistro']['elementoscortante_id'];
            if (!$this->Elementoscortante->exists()) 
            {
			     $msg .= "<br />El elemento cortante seleccionado no existe.";
		    }
            
            $this->Instrumentosauxiliare->id = $this->request->data['Ctregistro']['instrumentosauxiliare_id'];
            if (!$this->Instrumentosauxiliare->exists()) 
            {
			     $msg .= "<br />El instrumento auxiliar seleccionado no existe.";
		    }
            
            $this->Instrumentosmedicion->id = $this->request->data['Ctregistro']['instrumentosmedicion_id'];
            if (!$this->Instrumentosmedicion->exists()) 
            {
			     $msg .= "<br />El instrumento de medición seleccionado no existe.";
		    }
            
            if(strlen($msg) > 0)
            {
                $msg .= "<br />Inténtelo nuevamente.";
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->setFormData($cartaId, $tipoMaterialId);
                
                return;
            }
            
			$this->Ctregistro->create();
			if ($this->Ctregistro->save($this->request->data)) 
            {
				$this->Session->showMessage('El registro ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'cartastecnologicas', 'action'=>'edit', $cartaId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el registro. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
        $this->setFormData($cartaId, $tipoMaterialId);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id=null, $cartaId, $tipoMaterialId) 
    {
		$this->Ctregistro->id = $id;
		if (!$this->Ctregistro->exists()) {
			throw new NotFoundException(__('Invalid ctregistro'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
            $msg = "";
            $this->Operacione->id = $this->request->data['Ctregistro']['operacione_id'];
            if (!$this->Operacione->exists()) 
            {
			     $msg = "La operación seleccionada no existe.";
		    }
            
            $this->Elementoscortante->id = $this->request->data['Ctregistro']['elementoscortante_id'];
            if (!$this->Elementoscortante->exists()) 
            {
			     $msg .= "<br />El elemento cortante seleccionado no existe.";
		    }
            
            $this->Instrumentosauxiliare->id = $this->request->data['Ctregistro']['instrumentosauxiliare_id'];
            if (!$this->Instrumentosauxiliare->exists()) 
            {
			     $msg .= "<br />El instrumento auxiliar seleccionado no existe.";
		    }
            
            $this->Instrumentosmedicion->id = $this->request->data['Ctregistro']['instrumentosmedicion_id'];
            if (!$this->Instrumentosmedicion->exists()) 
            {
			     $msg .= "<br />El instrumento de medición seleccionado no existe.";
		    }
            
            if(strlen($msg) > 0)
            {
                $msg .= "<br />Inténtelo nuevamente.";
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->setFormData($cartaId, $tipoMaterialId);
                
                return;
            }
            
			if ($this->Ctregistro->save($this->request->data)) 
            {
				$this->Session->showMessage('El registro ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('controller'=>'cartastecnologicas', 'action'=>'edit', $cartaId));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el registro. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Ctregistro->read(null, $id);
		}
        
		$this->setFormData($cartaId, $tipoMaterialId, true);
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
		$this->Ctregistro->id = $id;
		if (!$this->Ctregistro->exists()) {
			throw new NotFoundException(__('Invalid ctregistro'));
		}
        
        $data = $this->Ctregistro->read(null, $id);
        
		if ($this->Ctregistro->delete()) 
        {
            $this->Session->showMessage('El registro ha sido eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('controller'=>'cartastecnologicas', 'action'=>'edit', $data['Ctregistro']['cartastecnologica_id']));
		}
        
		$this->Session->showMessage('No se pudo eliminar el registro', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    private function setFormData($cartaId, $tipoMaterialId, $editing=false)
    {
        //$cartastecnologicas = $this->Ctregistro->Cartastecnologica->find('list');
        
        $this->Ctregistro->Cartastecnologica->recursive = 0;
        $carta = $this->Ctregistro->Cartastecnologica->read(null, $cartaId);
        
        $orderNombre = array('order'=>'nombre');
        
        $options['joins'] = array
            (
                array('table' => 'maquinasoperaciones', 'type'=>'INNER',
                      'conditions'=> array('maquinasoperaciones.operacione_id = Operacione.id'))
            );
        $options['order'] = 'nombre';
        $options['conditions'] = array('maquinasoperaciones.maquina_id'=>$carta['Maquina']['id']);
		$operaciones = $this->Operacione->find('list', $options);
        
        if(count($operaciones) > 0)
        {
            $firstOp = -1;
            if($editing === false)
            {
                foreach($operaciones as $key=>$value):
                {
                    $firstOp = $key;
                    break;
                }
                endforeach;   
            }
            else
            {
                $firstOp = $this->request->data['Ctregistro']['operacione_id'];
            }
             
            $this->set('firstOp', $firstOp);
        }        
        
		$tipooperaciones = $this->Ctregistro->Tipooperacione->find('list', $orderNombre);
		$elementoscortantes['-1'] = "-- Seleccionar elemento --";   //$this->Ctregistro->Elementoscortante->find('list', $orderNombre);
        
		$instrumentosauxiliares = $this->Ctregistro->Instrumentosauxiliare->find('list', $orderNombre);
		$instrumentosmedicions = $this->Ctregistro->Instrumentosmedicion->find('list', $orderNombre);
		$this->set(compact('operaciones', 'tipooperaciones', 'elementoscortantes', 'instrumentosauxiliares', 'instrumentosmedicions'));
        
        $this->set("carta", $carta);
        $this->set("tipoMaterialId", $tipoMaterialId);
    }
}
