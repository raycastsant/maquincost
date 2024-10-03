<?php

App::uses('AppController', 'Controller');
App::import('Vendor', 'NewADOConnection', array('file' => 'adodb' . DS . 'adodb.inc.php'));

/**
 * Materiales Controller
 *
 * @property Materiale $Materiale
 */
class MaterialesController extends AppController 
{
  private $mdbConnection;
    
/**
 * index method
 *
 * @return void
 */
	public function index($cleanSession='0') 
    {
        if($cleanSession === '1')
        {
           $this->Session->delete('mat_index_options');
           $this->Session->delete('mat_filter_value');
           $this->Session->delete('mat_filter_field');
        }
        
        $this->paginate = array('limit'=>10, 'order'=>'Materiale.descripcion');
        $field = 'Materiale.almacen_desc';
        
        if ($this->request->is('post')) 
        {
            $field = $this->request->data['field'];
            $value = $this->request->data['value'];
            $options = array('lower('.$field.') LIKE' => '%'.strtolower($value).'%');
            $this->set('value', $value);
            $this->Session->write('mat_filter_value', $value);
            
            $this->paginate = array('limit' => 10, 'order'=>'Materiale.descripcion', 'conditions'=>$options);
            $this->Session->write('mat_index_options', $options);
            $this->Session->write('mat_filter_field', $field);
        }   
        else
        {
            $options = $this->Session->read('mat_index_options');
            if(!is_null($options))
             $this->paginate = array('limit'=>10, 'order'=>'Materiale.descripcion', 'conditions'=>$options);
             
            $value = $this->Session->read('mat_filter_value');
            if(!is_null($value))
             $this->set('value', $value);
             
            $tfield = $this->Session->read('mat_filter_field');
            if(!is_null($tfield))
             $field = $tfield;
        }
        
		$this->Materiale->recursive = 0;
		$this->set('materiales', $this->paginate());
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
		$this->Materiale->id = $id;
		if (!$this->Materiale->exists()) {
			throw new NotFoundException(__('Invalid materiale'));
		}
		$this->set('materiale', $this->Materiale->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) 
        {
            print_r($this->request->data);
            
			$this->Materiale->create();
			if ($this->Materiale->save($this->request->data)) {
				$this->Session->showMessage('El materiale ha sido salvado', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el materiale. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
		$tiposmateriales = $this->Materiale->Tiposmateriale->find('list');
		$this->set(compact('tiposmateriales'));
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
		$this->Materiale->id = $id;
		if (!$this->Materiale->exists()) {
			throw new NotFoundException(__('Invalid materiale'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
			if ($this->Materiale->save($this->request->data)) {
				$this->Session->showMessage('El material ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el material. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
		  $this->request->data = $this->Materiale->read(null, $id);
		}
        
        $this->Materiale->Tiposmateriale->recursive = -1;
		$result = $this->Materiale->Tiposmateriale->find('all', array('order'=>'Tiposmateriale.nombre'));
        
        foreach($result as $value):
        {
           if(strlen($value['Tiposmateriale']['resistencia_min'])>0 && strlen($value['Tiposmateriale']['resistencia_max'])>0)
            $tiposmateriales[$value['Tiposmateriale']['id']] = $value['Tiposmateriale']['nombre']." ".$value['Tiposmateriale']['resistencia_min']."-".$value['Tiposmateriale']['resistencia_max']." ".$value['Tiposmateriale']['um'];
           else
            $tiposmateriales[$value['Tiposmateriale']['id']] = $value['Tiposmateriale']['nombre']." ".$value['Tiposmateriale']['um'];      
        }
        endforeach;
        
		$this->set(compact('tiposmateriales'));
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
		$this->Materiale->id = $id;
		if (!$this->Materiale->exists()) {
			throw new NotFoundException(__('Invalid materiale'));
		}
		if ($this->Materiale->delete()) {
            $this->Session->showMessage('materiale eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el materiale', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
    
    /** Importar productos de la 
        BD de Contabilidad*/
    public function importFromMDB()
    {       
        $whereCond = "";
        
        //Condicion para el codigo
        if(trim($this->request->data['filter_codigo']) !== "")
        {
            $splitConds = explode("+", $this->request->data['filter_codigo']);
            foreach($splitConds as $cond):
            {
                if($whereCond === "")
                 $whereCond .= "where StrConv(producto.procod, 2) like '%".strtolower($cond)."%'";
                else
                 $whereCond .= " or StrConv(producto.procod, 2) like '%".strtolower($cond)."%'";    
            }endforeach;
        }
        
        //Condicion para la descripcion
        if(trim($this->request->data['filter_desc']) !== "")
        {
            $splitConds = explode("+", $this->request->data['filter_desc']);
            foreach($splitConds as $cond):
            {
                if($whereCond === "")
                 $whereCond .= "where StrConv(LISTAPRODUCTO.ProDes, 2) like '%".strtolower($cond)."%'"; 
                else
                 $whereCond .= " or StrConv(LISTAPRODUCTO.ProDes, 2) like '%".strtolower($cond)."%'";     
            }endforeach;
        }      
        
      //Buscando el material INDEFINIDO
        $this->Materiale->Tiposmateriale->recursive = -1;
        $res = $this->Materiale->Tiposmateriale->find('first', array('conditions'=>array('Tiposmateriale.nombre'=>$this->UNDEFINED_MATERIAL_NAME)));
        
        $this->mdbConnection =  ADONewConnection('ado_access');
        
        if($this->ConnectDbMDB($this->BD_PROD_URL, $this->BD_PROD_PASS))
        {
            if($this->mdbConnection->IsConnected())
            {
                $sql = "select producto.procod as codigo, LISTAPRODUCTO.ProDes AS descripcion, LISTAPRODUCTO.UMCod AS um, 
                        PRODUCTO.ProFisFin AS existencia, PRODUCTO.ProPrecioMN AS precio_mn, PRODUCTO.ProPrecioMLC AS precio_mlc, 
                        PRODUCTO.fechaultimasalida, ALMACEN.AlmCod, ALMACEN.AlmDes
                        from (producto inner join LISTAPRODUCTO on producto.procod=LISTAPRODUCTO.procod) inner join 
                        ALMACEN on producto.AlmCod=ALMACEN.AlmCod ".$whereCond." order by LISTAPRODUCTO.ProDes";
                $resultset = $this->mdbConnection->SelectLimit($sql);
                //print_r($resultset);
                //echo $sql;
                 
                if($resultset->RecordCount() > 0)
                {
                    $this->Materiale->recursive = -1;
                    
                    while(!$resultset->EOF)
                    {
                        $codigo = $resultset->fields[0];
                        $data['Materiale']['codigo'] = $codigo;
                        $data['Materiale']['descripcion'] = $resultset->fields[1];
                        $data['Materiale']['um'] = $resultset->fields[2];
                        $data['Materiale']['existencia'] = $resultset->fields[3];
                        $data['Materiale']['precio_mn'] = $resultset->fields[4];
                        $data['Materiale']['precio_mlc'] = $resultset->fields[5];
                        $data['Materiale']['fecha_ultima_salida'] = $resultset->fields[6];
                        $data['Materiale']['almacen_codigo'] = $resultset->fields[7];
                        $data['Materiale']['almacen_desc'] = $resultset->fields[8];
                        
                      //Primero busco si existe, para entonces actualizar el material. Sino lo inserto
                        $material = $this->Materiale->find('all', array('fields'=>array('id'), 'conditions'=>array('Materiale.codigo'=>$codigo)));
                        
                        if(count($material) === 0)  //Inserto
                        {
                          //$this->Materiale->query("insert into materiales(codigo, tiposmateriale_id, descripcion, um, existencia, precio_mn, precio_mlc, fecha_ultima_salida)
                          //                       values('".$resultset->fields[0]."', 1, '".$resultset->fields[1]."', '".$resultset->fields[2]."', ".$resultset->fields[3].", 
                          //                       ".$resultset->fields[4].", ".$resultset->fields[5].", '".$resultset->fields[6]."')");
                            
                            $data['Materiale']['tiposmateriale_id'] = $res['Tiposmateriale']['id']; 
                            $this->Materiale->create(); 
                        } 
                        else                        //Actualizo
                        {
                            $this->Materiale->id = $material[0]['Materiale']['id'];
                        }
                        
                        $this->Materiale->save($data);
                         
                        $resultset->MoveNext();
                    }
                }     
                else
                 $this->Session->showMessage("No se encontraron datos para los filtros especificados", $this->MSG_INFO);                        
            }
        }
        
        $this->redirect(array('action' => 'index'));
    }
    
    /** Establecer la conexión con la base de datos
        en Access'*/
    private function ConnectDbMDB($pathMDB, $pPass)
    {
        $flag = false;
        $dsn = "Driver={Microsoft Access Driver (*.mdb)};Dbq=".$pathMDB.";Uid=Admin;Pwd=$pPass;";
        
        if(!$this->mdbConnection->Connect($dsn))
         $this->Session->showMessage('<b>Error: </b>No se estableció la conexión con la base de datos de los Productos', $this->MSG_ERROR);
        else
         $flag = true;
         
         return $flag;
    }
    
    /** Devuelve el precio del material por AJAX*/
    public function getCostoMaterial($key1, $key2)
    {
        $materialId = -1;
        
        /*if(array_key_exists('materiale_id', $this->request->data['Planmensualregistro']))
         $materialId = $this->request->data['Planmensualregistro']['materiale_id'];*/
         
        if(array_key_exists($key2, $this->request->data[$key1]))
         $materialId = $this->request->data[$key1][$key2]; 
         
        $this->Materiale->recursive = 0;
        $data = $this->Materiale->read(null, $materialId);

        $costo = -1;
        if(count($data) > 0)
         $costo = $data['Materiale']['precio_mn'];
         
        $this->set('value', $costo); 
        $this->layout = 'ajax';
        $this->render('/Elements/ajax_input','ajax');
    }
}
?>