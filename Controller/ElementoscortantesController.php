<?php
App::uses('AppController', 'Controller');
/**
 * Elementoscortantes Controller
 *
 * @property Elementoscortante $Elementoscortante
 */
class ElementoscortantesController extends AppController 
{

/**
 * index method
 *
 * @return void
 */
	public function index($cleanSession='0') 
    {
        if($cleanSession === '1')
        {
           $this->Session->delete('ec_index_options');
           $this->Session->delete('ec_filter_value');
           $this->Session->delete('ec_filter_field');
        }
        
        $this->paginate = array('limit' => 6, 'order'=>'Elementoscortante.nombre');
        $field = 'Tipoelementoscortante.nombre';
        
        if($this->request->is('post')) 
        {
            $field = $this->request->data['field'];
            {
                $value = $this->request->data['value'];
                $options = array('lower('.$field.') LIKE' => '%'.strtolower($value).'%');
                $this->set('value', $value);
                $this->Session->write('ec_filter_value', $value);
            }
            
            $this->paginate = array('limit' => 6, 'order'=>'Elementoscortante.nombre', 'conditions'=>$options);
            $this->Session->write('ec_index_options', $options);
            $this->Session->write('ec_filter_field', $field);
        }   
        else
        {
            $options = $this->Session->read('ec_index_options');
            if(!is_null($options))
             $this->paginate = array('limit'=>6, 'order'=>'Elementoscortante.nombre', 'conditions'=>$options);
             
            $value = $this->Session->read('ec_filter_value');
            if(!is_null($value))
             $this->set('value', $value);
             
            $tfield = $this->Session->read('ec_filter_field');
            if(!is_null($tfield))
             $field = $tfield;
        }
         
		$this->Elementoscortante->recursive = 1;
		$this->set('elementoscortantes', $this->paginate());
        $this->set('field', $field);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Elementoscortante->id = $id;
		if (!$this->Elementoscortante->exists()) {
			throw new NotFoundException(__('Invalid elementoscortante'));
		}
		$this->set('elementoscortante', $this->Elementoscortante->read(null, $id));
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
			$this->Elementoscortante->create();
			if ($this->Elementoscortante->save($this->request->data)) {
				$this->Session->showMessage('El elemento cortante ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el elemento cortante. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
		$materialelementos = $this->Elementoscortante->Materialelemento->find('list');
		$formascortes = $this->Elementoscortante->Formascorte->find('list');
		$tipoelementoscortantes = $this->Elementoscortante->Tipoelementoscortante->find('list');
		$this->set(compact('materialelementos', 'formascortes', 'tipoelementoscortantes'));
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
		$this->Elementoscortante->id = $id;
		if (!$this->Elementoscortante->exists()) 
        {
			throw new NotFoundException(__('Invalid elementoscortante'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Elementoscortante->save($this->request->data)) {
				$this->Session->showMessage('El elemento cortante ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el elemento cortante. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->Elementoscortante->read(null, $id);
		}
        
		$materialelementos = $this->Elementoscortante->Materialelemento->find('list');
		$formascortes = $this->Elementoscortante->Formascorte->find('list');
		$tipoelementoscortantes = $this->Elementoscortante->Tipoelementoscortante->find('list');
		$this->set(compact('materialelementos', 'formascortes', 'tipoelementoscortantes'));
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
        
		$this->Elementoscortante->id = $id;
		if (!$this->Elementoscortante->exists()) {
			throw new NotFoundException(__('Invalid elementoscortante'));
		}
		if ($this->Elementoscortante->delete()) {
            $this->Session->showMessage('El elemento cortante eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el elemento cortante', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** 
     * Obtiene los elementos cortantes según la operación seleccionada 
       en el formulario ADD de ctregistros.*/
    public function getByOperacion()
    {       
        $operacionId = -1;
        
        if(array_key_exists('operacione_id', $this->request->data['Ctregistro']))
         $operacionId = $this->request->data['Ctregistro']['operacione_id'];
        
        $options['fields'] = array('Elementoscortante.id','Elementoscortante.nombre', 'tipoelementoscortante.nombre');
        $options['joins'] = array(
                                    array('table'=>'elementocortanteoperaciones','type'=>'INNER',
                                          'conditions'=>'elementocortanteoperaciones.elementoscortante_id=Elementoscortante.id'),
                                    array('table'=>'tipoelementoscortante','type'=>'INNER',
                                          'conditions'=>'tipoelementoscortante.id=Elementoscortante.tipoelementoscortante_id')
                                   );
		
        $options['conditions'] = array('elementocortanteoperaciones.operacione_id'=>$operacionId);
        $options['order'] = array('tipoelementoscortante.nombre');
        
        $this->Elementoscortante->recursive = -1;
        $result = $this->Elementoscortante->find('all', $options); 	
       
        foreach($result as $value):
        { 
           $elementos[$value['Elementoscortante']['id']] = $value['tipoelementoscortante']['nombre']." ".$value['Elementoscortante']['nombre'];
        }
        endforeach; 
          
		$this->set('values', $elementos);

		$this->layout = 'ajax';
		$this->render('/Elements/ajax_dropdown','ajax');
    }
}