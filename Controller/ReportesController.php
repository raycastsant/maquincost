<?php
App::uses('AppController', 'Controller');

class ReportesController extends AppController 
{
    var $uses = array('Ordenreal', 'Pieza', 'Planmensualregistro', 'Vale', 'Ordene', 'Maquina', 'Maquinasoperacione', 'Velocidadrango', 'Operario', 
                      'Elementoscortante', 'Elementocortanteoperacione', 'Tiposmateriale', 'Planesanuale', 'Planesmensuale');
    
    /** Reporte de una orden de trabajo*/
    public function reporte_orden($ordenRealId, $pdf=false)
    {
        if($pdf === false)
        {
            $this->Ordenreal->recursive = -1;
           //Datos principales 
            $data = $this->Ordenreal->query("select ordenreals.ueb, ordenreals.responsable, ordenreals.equipo, tipotrabajos.descripcion,
                                    ordenes.laboriosidad, ordenes.fecha_inicio, ordenes.fecha_fin, ordenes.salario_plan, ordenes.numero, ordenes.cant_piezas,
                                    ordenes.costo_pieza, ordenes.salario_plan, ordenreals.piezas_elaboradas, ordenreals.fecha_inicio, ordenreals.fecha_fin,
                                    ordenreals.gasto_materiales, ordenreals.pieza_costo_unit
                                    from (ordenreals inner join ordenes on ordenreals.ordene_id=ordenes.id) inner join tipotrabajos on 
                                    ordenreals.tipotrabajo_id=tipotrabajos.id
                                    where ordenreals.id=".$ordenRealId);
            if(array_key_exists(0, $data))
            {
               //Gastos de salario y laboriosidad real 
                $temp = $this->Ordenreal->query("select sum(salario) as salario, sum(totalhoras) as totalhoras from fuerzatrabajoordenes where ordenreal_id=".$ordenRealId);
                $data['salario_real'] = $temp[0][0]['salario'];
                $data['laboriosidad_real'] = ($temp[0][0]['totalhoras'] * $data[0]['ordenreals']['piezas_elaboradas']);
                                          
               //Fuerza de trabajo 
                $fuerzatrabajo = $this->Ordenreal->query("select * from fuerzatrabajoordenes inner join operarios on 
                                                          fuerzatrabajoordenes.operario_id=operarios.id 
                                                          where ordenreal_id=".$ordenRealId);
                                                          
               //Gastos de piezas y materiales      
                $this->Vale->recursive = 0;
                $piezasmateriales = $this->Vale->find('all', array('conditions'=>array('ordenreal_id'=>$ordenRealId)));
                      
                $this->set('data', $data);
                $this->set('fuerzatrabajo', $fuerzatrabajo);
                $this->set('piezasmateriales', $piezasmateriales);
                
                $pdfData['data'] = $data;
                $pdfData['fuerzatrabajo'] = $fuerzatrabajo;
                $pdfData['piezasmateriales'] = $piezasmateriales;
                $this->Session->write('rep_orden', $pdfData);
            }
            else
             $this->set('data', null);
        }
        else
        {
            $pdfData = $this->Session->read('rep_orden');  
            $this->set('data', $pdfData['data']);
            $this->set('fuerzatrabajo', $pdfData['fuerzatrabajo']);
            $this->set('piezasmateriales', $pdfData['piezasmateriales']);
              
            $params = array(
                'download' => false,
                'name' => 'reporte_orden.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
            $this->set($params);
        }
    }
    
    /** Formulario de parámetros del reporte de orden de trabajo*/
    public function form_param_reporte_orden()
    {
        if ($this->request->is('post')) 
        {
            $this->redirect(array('action'=>'reporte_orden', $this->request->data['reporte_orden']['ordene_id']));
        }
        
        $this->Ordenreal->recursive = 0;
        $ordeneslist = $this->Ordenreal->find('all', array('order'=>'Ordene.numero'));
        //$this->set(compact('ordenes'));
        
        foreach($ordeneslist as $orden):
        {
            $ordenes[$orden['Ordenreal']['id']] = $orden['Ordene']['numero']; 
        }
        endforeach;
        
        $this->set('ordenes', $ordenes);
    }
    
    /** Informe de recepcion de la pieza de una orden de trabajo*/
    public function informe_recepcion($ordenRealId=2)
    {
        
    }
    
    /** Formulario de parámetros del reporte 
        de listado de elementos cortantes*/
    public function fp_listado_elementos_cortantes()
    {
        if ($this->request->is('post')) 
        {
            $this->redirect(array('action'=>'listado_elementos_cortantes', $this->request->data['reporte_orden']['ordene_id']));
        }
        
        $this->Elementoscortante->recursive = 0;
        $result = $this->Elementoscortante->query("select elementoscortantes.id, concat(tipoelementoscortante.nombre, ' ', elementoscortantes.nombre) as name 
                                                   from elementoscortantes inner join tipoelementoscortante on elementoscortantes.tipoelementoscortante_id=tipoelementoscortante.id
                                                   order by name");
        
        $elementos[-1] = "-- Todos --";
        foreach($result as $element):
        {
            $elementos[$element['elementoscortantes']['id']] = $element[0]['name'];
        }
        endforeach;
        
        $this->set(compact('elementos'));
    }
    
    /** Listado de elementos cortantes*/
    public function listado_elementos_cortantes($pdf=false)
    {
        if($this->request->is('post'))
        {
            $filter = (int)$this->request->data['elemento_id'];
            if($filter > 0)
             $options['conditions'] = array('Elementoscortante.id'=>$filter); 
             
            $this->Elementoscortante->recursive = 2;
            $options['order'] = 'Elementoscortante.nombre';
            $elementos = $this->Elementoscortante->find('all', $options);
            
            $materiales_id = array();
            foreach($elementos as $elemento):
            {
                foreach($elemento['Elementocortanteoperacione'] as $operacion):
                {
                    foreach($operacion['Vpcamaterialeselementoscortante'] as $vpca):
                    {
                        $materiales_id[$vpca['tiposmateriale_id']] = $vpca['tiposmateriale_id'];
                    }
                    endforeach;
                }
                endforeach;
            }
            endforeach;
            
            $this->Tiposmateriale->recursive = -1;                                   
            $result = $this->Tiposmateriale->find('all', array('fields'=>array('id', 'nombre', 'resistencia_min', 'resistencia_max', 'um'), 
                                                  'conditions'=>array('Tiposmateriale.id'=>$materiales_id), 
                                                  'order'=>array('Tiposmateriale.nombre', 'Tiposmateriale.resistencia_min')));
                                                                   
            $tipos_materiales = array();
            foreach($result as $tm):
            {
               $tipos_materiales[$tm['Tiposmateriale']['id']] = $tm['Tiposmateriale']['nombre']." ".$tm['Tiposmateriale']['resistencia_min']."-".$tm['Tiposmateriale']['resistencia_max']." ".$tm['Tiposmateriale']['um']; 
            }
            endforeach;
            
            $i = 0;
            foreach($elementos as $elemento):
            {
                $elementos[$i]['Ctregistro'] = array();
                $k = 0;
                foreach($elemento['Elementocortanteoperacione'] as $operacion):
                {
                    $j = 0;
                    foreach($operacion['Vpcamaterialeselementoscortante'] as $vpca):
                    {
                        $tipo_mat_id = $elementos[$i]['Elementocortanteoperacione'][$k]['Vpcamaterialeselementoscortante'][$j]['tiposmateriale_id'];
                        $elementos[$i]['Elementocortanteoperacione'][$k]['Vpcamaterialeselementoscortante'][$j]['material_name'] = $tipos_materiales[$tipo_mat_id]; 
                        
                        $j++;
                    }
                    endforeach;
                    
                    $k++;
                }
                endforeach;
                
                $i++;
            }
            endforeach;
            
            $this->Session->write($elementos, 'elementos');
            $this->set('elementos', $elementos);
        }
        
        if($pdf === 'true')
        {
            $elementos = $this->Session->read('elementos');
            $this->set('elementos', $elementos);
                  
            $params = array(
                'download' => false,
                'name' => 'listado_elementoscortantes.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
            $this->set($params);
        }
    }
    
    /** Listado de máquinas*/
    public function listado_maquinas($pdf=false)
    {
        if($pdf === false)
        {
            $this->Maquina->recursive = 0;
            $this->Velocidadrango->recursive = 0;
            $this->Maquinasoperacione->recursive = 0;
            
            $options['fields'] = array('Maquina.id', 'Maquina.nombre', 'Maquina.modelo', 'Maquina.coef_pieza', 'Maquina.imagen');
            $maquinas = $this->Maquina->find('all', $options);
            
            $i = 0;               
            $options = array();
            $options['order'] = 'Velocidadrango.nombre';
            
            foreach($maquinas as $maquina):
            {
                $rangos = $this->Maquinasoperacione->query("select concat(velocidadrangos.nombre, ' ', velocidadrangos.vel_min, ' - ', velocidadrangos.vel_max) as rango, 
                                                            min(avances.avance) as avance_min, max(avances.avance) as avance_max, min(profcortes.profcorte) as profcorte_min, max(profcortes.profcorte) as profcorte_max
                                                            from ((velocidadrangos inner join selectores on velocidadrangos.id=selectores.velocidadrango_id) inner join avances on avances.selectore_id=selectores.id) 
                                                            left join profcortes on profcortes.selectore_id=selectores.id
                                                            where velocidadrangos.maquina_id=".$maquina['Maquina']['id']." group by rango order by rango");
                                                        
                $operaciones = $this->Maquinasoperacione->find('all', array('conditions'=>array('Maquinasoperacione.maquina_id'=>$maquina['Maquina']['id'])));
                 
                $maquinas[$i]['rangos'] = $rangos;
                $maquinas[$i]['operaciones'] = $operaciones;
                $i++;
            }
            endforeach;
            
            $this->set('maquinas', $maquinas);
            $this->Session->write('rep_maquinas', $maquinas);
        }
        else
        {
            $maquinas = $this->Session->read('rep_maquinas');
            $this->set('maquinas', $maquinas);
            
           //Vista PDF      
            $params = array(
                'download' => false,
                'name' => 'listado_maquinas.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
            $this->set($params);
        }
    }
    
    /** Listado de operarios*/
    public function listado_operarios($pdf=false)
    {
        if($pdf == false)
        {
            $this->Operario->recursive = 0;
            $operarios = $this->Operario->find('all', array('order'=>'Operario.nombre'));
            
            $this->set('operarios', $operarios);
            $this->Session->write($operarios, 'operarios');
        }
        else
        {
           //Vista PDF
           $operarios = $this->Session->read('operarios');
           $this->set('operarios', $operarios);
                 
            $params = array(
                'download' => false,
                'name' => 'listado_operarios.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
            $this->set($params);
        }
    }
    
     /** Formulario de parámetros del reporte 
        de tiempo de operación de las máquinas*/
    public function fp_tiempo_operacion_maquinas()
    {

    }
    
    /** Tiempo de operacion REAL de las maquinas*/
    public function tiempo_operacion_maquinas($pdf=false)
    {
        if($this->request->is('post'))
        {
            $msg = "";
            $desde = "";
            $hasta = "";
            if(empty($this->request->data['desde']))
             $msg .= "Debe seleccionar una fecha de inicio.<br />";
            else 
             $desde = $this->request->data['desde'];
            
            if(empty($this->request->data['hasta']))
             $msg .= "Debe seleccionar una fecha de fin";
            else
             $hasta = $this->request->data['hasta']; 
             
            if(strlen($msg) > 0)
            {
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->redirect(array('action'=>'fp_tiempo_operacion_maquinas'));
            } 
            else
            {
                $this->Ordenreal->recursive = -1;
                $maquinas = $this->Ordenreal->query("select concat(maquinas.nombre, ' ', maquinas.modelo) as maquina, maquinas.imagen,
                                         sum(tiemposmaquinadoreales.tiempo_auxiliar)/60 as tauxiliar, sum(tiemposmaquinadoreales.tiempo_corte)/60 as toperacion
                                         from (maquinas inner join tiemposmaquinadoreales on maquinas.id=tiemposmaquinadoreales.maquina_id)inner join 
                                         ordenreals on tiemposmaquinadoreales.ordenreal_id=ordenreals.id 
                                         where ordenreals.fecha_cierre>='".$desde."' and ordenreals.fecha_cierre<='".$hasta."' and ordenreals.cerrada=1
                                         group by maquina order by maquina");
                                         
                $this->Session->write($maquinas, 'maquinas');
                $this->set('maquinas', $maquinas);
            }
        }
        
        if($pdf === 'true')
        {
            $maquinas = $this->Session->read('maquinas');
            $this->set('maquinas', $maquinas);
                  
            $params = array(
                'download' => false,
                'name' => 'tiempo_op_maquinas.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
            $this->set($params);
        }
    }
    
     /** Formulario de parámetros del reporte 
        de cantidad de surtidos*/
    public function fp_cantidad_surtidos()
    {

    }
    
    /** Cantidad de surtidos*/
    public function cantidad_surtidos($pdf=false)
    {
        if($this->request->is('post'))
        {
            $msg = "";
            $desde = "";
            $hasta = "";
            if(empty($this->request->data['desde']))
             $msg .= "Debe seleccionar una fecha de inicio.<br />";
            else 
             $desde = $this->request->data['desde'];
            
            if(empty($this->request->data['hasta']))
             $msg .= "Debe seleccionar una fecha de fin";
            else
             $hasta = $this->request->data['hasta']; 
             
            if(strlen($msg) > 0)
            {
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->redirect(array('action'=>'fp_cantidad_surtidos'));
            } 
            else
            {
                $this->Ordenreal->recursive = -1;
                $result = $this->Ordenreal->query("select piezas.nombre, piezas.imagen, count(ordenreals.id) as cantsurtidos 
                                                    from ((piezas inner join  planmensualregistros on piezas.id=planmensualregistros.pieza_id) inner join ordenes on planmensualregistros.id=ordenes.planmensualregistro_id)
                                                    inner join ordenreals on ordenes.id=ordenreals.ordene_id
                                                    where ordenreals.fecha_cierre>='".$desde."' and ordenreals.fecha_cierre<='".$hasta."' and ordenreals.cerrada=1 
                                                    group by piezas.nombre order by piezas.nombre");
                $surtidos = array();             
                foreach($result as $row)
                {
                    $surtidos[$row['piezas']['nombre']]['cantsurtidos'] = $row[0]['cantsurtidos'];
                    $surtidos[$row['piezas']['nombre']]['imagen'] = $row['piezas']['imagen'];
                }
                
                $result = $this->Ordenreal->query("select piezas.nombre, sum(ordenreals.piezas_elaboradas) as recuperadas 
                                                    from ((piezas inner join  planmensualregistros on piezas.id=planmensualregistros.pieza_id) inner join ordenes on planmensualregistros.id=ordenes.planmensualregistro_id)
                                                    inner join ordenreals on ordenes.id=ordenreals.ordene_id
                                                    where ordenreals.tipotrabajo_id=1 and ordenreals.fecha_cierre>='".$desde."' and ordenreals.fecha_cierre<='".$hasta."' and ordenreals.cerrada=1 
                                                    group by piezas.nombre order by piezas.nombre");            
                foreach($result as $row)
                {
                    $surtidos[$row['piezas']['nombre']]['recuperadas'] = $row[0]['recuperadas'];
                }
                
                $result = $this->Ordenreal->query("select piezas.nombre, sum(ordenreals.piezas_elaboradas) as construidas 
                                                    from ((piezas inner join  planmensualregistros on piezas.id=planmensualregistros.pieza_id) inner join ordenes on planmensualregistros.id=ordenes.planmensualregistro_id)
                                                    inner join ordenreals on ordenes.id=ordenreals.ordene_id
                                                    where ordenreals.tipotrabajo_id=2 and ordenreals.fecha_cierre>='".$desde."' and ordenreals.fecha_cierre<='".$hasta."' and ordenreals.cerrada=1
                                                    group by piezas.nombre order by piezas.nombre");        
                foreach($result as $row)
                {
                    $surtidos[$row['piezas']['nombre']]['construidas'] = $row[0]['construidas'];
                }
                                         
                $this->Session->write($surtidos, 'surtidos');
                $this->set('surtidos', $surtidos);
            }
        }
        
        if($pdf === 'true')
        {
            $maquinas = $this->Session->read('surtidos');
            $this->set('surtidos', $surtidos);
                  
            $params = array(
                'download' => false,
                'name' => 'cantidad_surtidos.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
            $this->set($params);
        }
    }
    
     /** Formulario de parámetros del reporte 
        de horas-hombre trabajadas*/
    public function fp_horas_hombre()
    {

    }
    
    /** Horas-hombre trabajadas reales*/
    public function horas_hombre($pdf=false)
    {
        if($this->request->is('post'))
        {
            $msg = "";
            $desde = "";
            $hasta = "";
            if(empty($this->request->data['desde']))
             $msg .= "Debe seleccionar una fecha de inicio.<br />";
            else 
             $desde = $this->request->data['desde'];
            
            if(empty($this->request->data['hasta']))
             $msg .= "Debe seleccionar una fecha de fin";
            else
             $hasta = $this->request->data['hasta']; 
             
            if(strlen($msg) > 0)
            {
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->redirect(array('action'=>'fp_horas_hombre'));
            } 
            else
            {
                $this->Operario->recursive = -1;
                $operarios = $this->Operario->query("select operarios.nombre, calificacionoperarios.nombre, sum(fuerzatrabajoordenes.totalhoras) as horas
                                                     from ((operarios inner join calificacionoperarios on operarios.calificacionoperario_id=calificacionoperarios.id)
                                                     inner join fuerzatrabajoordenes on fuerzatrabajoordenes.operario_id=operarios.id)  inner join ordenreals on fuerzatrabajoordenes.ordenreal_id=ordenreals.id
                                                     where ordenreals.fecha_cierre>='".$desde."' and ordenreals.fecha_cierre<='".$hasta."'
                                                     group by operarios.nombre order by operarios.nombre");
                               
                $this->Session->write('operarios', $operarios);
                $this->set('operarios', $operarios);
            }
        }
        
        if($pdf === 'true')
        {
            $operarios = $this->Session->read('operarios');
            $this->set('operarios', $operarios);
                  
            $params = array(
                'download' => false,
                'name' => 'horas_hombre.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
            $this->set($params);
        }
    }
    
    /** Formulario de parámetros del reporte 
        de gastos de materia prima*/
    public function fp_gasto_materia_prima()
    {

    }
    
    /** Gastos de materia prima*/
    public function gasto_materia_prima($pdf=false)
    {
        if($this->request->is('post'))
        {
            $msg = "";
            $desde = "";
            $hasta = "";
            if(empty($this->request->data['desde']))
             $msg .= "Debe seleccionar una fecha de inicio.<br />";
            else 
             $desde = $this->request->data['desde'];
            
            if(empty($this->request->data['hasta']))
             $msg .= "Debe seleccionar una fecha de fin";
            else
             $hasta = $this->request->data['hasta']; 
             
            if(strlen($msg) > 0)
            {
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->redirect(array('action'=>'fp_gasto_materia_prima'));
            } 
            else
            {
                $this->Ordenreal->recursive = -1;
                $materiales = $this->Ordenreal->query("select materiales.descripcion, tiposmateriales.nombre, sum(ordenreals.mat_prim_peso_unit) as peso
                                                     from (materiales inner join tiposmateriales on materiales.tiposmateriale_id=tiposmateriales.id)
                                                     inner join ordenreals on ordenreals.materiale_id=materiales.id
                                                     where ordenreals.fecha_cierre>='".$desde."' and ordenreals.fecha_cierre<='".$hasta."' and ordenreals.cerrada=1
                                                     group by materiales.descripcion, tiposmateriales.nombre
                                                     order by materiales.descripcion, tiposmateriales.nombre");
                               
                $this->Session->write($materiales, 'materiales');
                $this->set('materiales', $materiales);
            }
        }
        
        if($pdf === 'true')
        {
            $maquinas = $this->Session->read('materiales');
            $this->set('materiales', $materiales);
                  
            $params = array(
                'download' => false,
                'name' => 'horas_hombre.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
            $this->set($params);
        }
    }
    
    /** Formulario de parámetros del reporte 
        de registro de órdenes */
    public function fp_registro_ordenes()
    {

    }
    
    /** Registro de ordenes*/
    public function registro_ordenes($pdf=false)
    {
        if($this->request->is('post'))
        {
            $msg = "";
            $desde = "";
            $hasta = "";
            if(empty($this->request->data['desde']))
             $msg .= "Debe seleccionar una fecha de inicio.<br />";
            else 
             $desde = $this->request->data['desde'];
            
            if(empty($this->request->data['hasta']))
             $msg .= "Debe seleccionar una fecha de fin";
            else
             $hasta = $this->request->data['hasta']; 
             
            if(strlen($msg) > 0)
            {
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->redirect(array('action'=>'fp_registro_ordenes'));
            } 
            else
            {
                $this->Ordenreal->recursive = -1;
                $ordenes = $this->Ordenreal->query("select ordenes.numero, piezas.nombre, ordenreals.fecha_inicio, 
                                                    ordenreals.fecha_cierre, ordenreals.cerrada, tipotrabajos.descripcion, 
                                                    ordenreals.gasto_materiales, sum(fuerzatrabajoordenes.salario) as salario, ordenreals.piezas_elaboradas, ordenreals.id
                                                    from ((((ordenreals inner join ordenes on ordenreals.ordene_id=ordenes.id) inner join 
                                                    planmensualregistros on ordenes.planmensualregistro_id=planmensualregistros.id) inner join 
                                                    piezas on planmensualregistros.pieza_id=piezas.id) inner join tipotrabajos on 
                                                    ordenreals.tipotrabajo_id=tipotrabajos.id) left join fuerzatrabajoordenes on 
                                                    fuerzatrabajoordenes.ordenreal_id=ordenreals.id
                                                    where ordenreals.fecha_cierre>='".$desde."' and ordenreals.fecha_cierre<='".$hasta."'
                                                    group by ordenes.numero, ordenreals.fecha_inicio, ordenreals.fecha_cierre, ordenreals.cerrada, 
                                                    ordenreals.gasto_materiales, tipotrabajos.descripcion, piezas.nombre order by ordenes.numero");
                               
                $laboriosidadData = $this->Ordenreal->query("select ordenes.numero, calificacionoperarios.nombre, sum(fuerzatrabajoordenes.totalhoras) as horas
                                                        from (((ordenreals inner join ordenes on ordenreals.ordene_id=ordenes.id) left join fuerzatrabajoordenes on 
                                                        fuerzatrabajoordenes.ordenreal_id=ordenreals.id) inner join operarios on fuerzatrabajoordenes.operario_id=operarios.id) 
                                                        inner join calificacionoperarios on operarios.calificacionoperario_id=calificacionoperarios.id
                                                        where ordenreals.fecha_cierre>='".$desde."' and ordenreals.fecha_cierre<='".$hasta."'
                                                        group by ordenes.numero, calificacionoperarios.nombre
                                                        order by ordenes.numero, calificacionoperarios.nombre");
                                                        
                foreach($laboriosidadData as $lab)
                {
                    $laboriosidad[$lab['calificacionoperarios']['nombre']][$lab['ordenes']['numero']] = $lab[0]['horas'];
                }
                                                        
                $this->Session->write('reg_ordenes', $ordenes);
                $this->Session->write('reg_laboriosidad', $laboriosidad);
                $this->set('ordenes', $ordenes);
                $this->set('laboriosidad', $laboriosidad);
            }
        }
        
        if($pdf === 'true')
        {
            $ordenes = $this->Session->read('reg_ordenes');
            $laboriosidad = $this->Session->read('reg_laboriosidad');
            $this->set('ordenes', $ordenes);
            $this->set('laboriosidad', $laboriosidad);
                  
            $params = array(
                'download' => false,
                'name' => 'registro_ordenes.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'A4'
                );
            
            $this->set($params);
        }
    }
    
    /** Formulario de parámetros del reporte 
        de Control de piezas elaboradas */
    public function fp_control_piezas_elaboradas()
    {

    }
    
    /** Control de piezas elaboradas*/
    public function control_piezas_elaboradas($pdf=false)
    {
        if($this->request->is('post'))
        {
            $msg = "";
            $desde = "";
            $hasta = "";
            if(empty($this->request->data['desde']))
             $msg .= "Debe seleccionar una fecha de inicio.<br />";
            else 
             $desde = $this->request->data['desde'];
            
            if(empty($this->request->data['hasta']))
             $msg .= "Debe seleccionar una fecha de fin";
            else
             $hasta = $this->request->data['hasta']; 
             
            if(strlen($msg) > 0)
            {
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->redirect(array('action'=>'fp_control_piezas_elaboradas'));
            } 
            else
            {
                $this->Ordenreal->recursive = -1;
                $informes = $this->Ordenreal->query("select informerecepcions.*, piezas.nombre, ordenreals.pieza_precio, ordenreals.piezas_elaboradas  from (((informerecepcions inner join ordenreals on 
                                                    informerecepcions.ordenreal_id=ordenreals.id) inner join ordenes on ordenreals.ordene_id=ordenes.id) 
                                                    inner join planmensualregistros on ordenes.planmensualregistro_id=planmensualregistros.id) inner join piezas 
                                                    on planmensualregistros.pieza_id=piezas.id
                                                    where informerecepcions.fecha>='".$desde."' and informerecepcions.fecha<='".$hasta."' and ordenreals.cerrada=1
                                                    group by informerecepcions.empresa, informerecepcions.unidad
                                                    order by informerecepcions.empresa, informerecepcions.unidad, informerecepcions.codigo");
                                                        
                $this->Session->write('control_piezas', $informes);
                $this->set('informes', $informes);
            }
        }
        
        if($pdf === 'true')
        {
            $informes = $this->Session->read('control_piezas');
            $this->set('informes', $informes);
                  
            $params = array(
                'download' => false,
                'name' => 'control_piezas.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
            $this->set($params);
        }
    }
    
     /** Formulario de parámetros del reporte 
        de Valor de la producción */
    public function fp_valor_produccion()
    {

    }
    
    /** Control de piezas elaboradas*/
    public function valor_produccion($pdf=false)
    {
        if($this->request->is('post'))
        {
            $msg = "";
            $desde = "";
            $hasta = "";
            if(empty($this->request->data['desde']))
             $msg .= "Debe seleccionar una fecha de inicio.<br />";
            else 
             $desde = $this->request->data['desde'];
            
            if(empty($this->request->data['hasta']))
             $msg .= "Debe seleccionar una fecha de fin";
            else
             $hasta = $this->request->data['hasta']; 
             
            if(strlen($msg) > 0)
            {
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->redirect(array('action'=>'fp_valor_produccion'));
            } 
            else
            {
                $this->Ordenreal->recursive = -1;
                $valor_prod = $this->Ordenreal->query("select sum(pieza_precio) valor_prod, (sum(gasto_materiales+consumo_salario)/sum(pieza_precio)) as costo_peso, 
                                                       sum(gasto_materiales) as materiales, sum(consumo_salario) as salario from ordenreals 
                                                       where ordenreals.fecha_cierre>='".$desde."' and ordenreals.fecha_cierre<='".$hasta."' and ordenreals.cerrada=1");
                                                        
                $this->Session->write('valor_prod', $valor_prod);
                $this->set('valor_prod', $valor_prod);
            }
        }
        
        if($pdf === 'true')
        {
            $valor_prod = $this->Session->read('valor_prod');
            $this->set('valor_prod', $valor_prod);
                  
            $params = array(
                'download' => false,
                'name' => 'valor_produccion.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
            $this->set($params);
        }
    }
    
    /** Formulario de parámetros del reporte 
        Cumplimiento del plan*/
    public function fp_cumplimiento_plan()
    {
        $this->Planesanuale->recursive = -1;
        $result = $this->Planesanuale->find('list', array('order'=>'Planesanuale.anno'));
        
        foreach($result as $key=>$value)
        {
            $annos[$value] = $value;    
        }
        
        $this->set('annos', $annos);
        $this->set('meses', array('-1'=>'-- Seleccione el mes --'));
    }
    
    public function cumplimiento_plan($pdf=false)
    {
        if($this->request->is('post'))
        {
            $msg = "";
            $anno = "";
            $mes = "";
            
            if($this->request->data['anno'] === '-1')
             $msg .= "Debe seleccionar un año.<br />";
            else 
             $anno = $this->request->data['anno'];
            
            if($this->request->data['mes'] === '-1')
             $msg .= "Debe seleccionar un mes";
            else
             $mes = $this->request->data['mes']; 
             
            if(strlen($msg) > 0)
            {
                $this->Session->showMessage($msg, $this->MSG_ERROR);
                $this->redirect(array('action'=>'fp_cumplimiento_plan'));
            } 
            else
            {
                $data = null;
                
                $this->Planesanuale->recursive = -1;
                $anualdata = $this->Planesanuale->query("select sum(plananualregistros.cantpiezas) as u_anual, sum(plananualregistros.costototal)/1000 as mp_anual 
                                                         from plananualregistros inner join planesanuales on plananualregistros.planesanuale_id=planesanuales.id 
                                                         where planesanuales.anno=".$anno);
                                                         
                $this->Planesmensuale->recursive = -1;
                $mensualdata = $this->Planesmensuale->query("select sum(planmensualregistros.cantpiezas) as u_mensual, sum(ordenreals.piezas_elaboradas) as u_real_mes, 
                                                             sum(ordenreals.consumo_salario+ordenreals.gasto_materiales)/1000 as mp_real_mes 
                                                             from ((planmensualregistros inner join planesmensuales on planmensualregistros.planesmensuale_id=planesmensuales.id)
                                                             inner join ordenes on ordenes.planmensualregistro_id=planmensualregistros.id) inner join ordenreals on ordenreals.ordene_id=ordenes.id 
                                                             where planesmensuales.anno=".$anno." and planesmensuales.mes=".$mes);
                                                             
                $mensual_acum_data = $this->Planesmensuale->query("select sum(ordenreals.piezas_elaboradas) as u_real_acum, sum(ordenreals.consumo_salario+ordenreals.gasto_materiales)/1000 as mp_real_acum 
                                                                   from ((planmensualregistros inner join planesmensuales on planmensualregistros.planesmensuale_id=planesmensuales.id)
                                                                   inner join ordenes on ordenes.planmensualregistro_id=planmensualregistros.id) inner join ordenreals on ordenreals.ordene_id=ordenes.id 
                                                                   where planesmensuales.anno=".$anno." and planesmensuales.mes<=".$mes);
                                                     
                $data['anno'] = $anno;
                $data['mes'] = $this->meses[$mes];
                $data['uanual'] = $anualdata[0][0]['u_anual'];
                $data['mp_anual'] = $anualdata[0][0]['mp_anual'];
                $data['u_mensual'] = $mensualdata[0][0]['u_mensual'];
                $data['u_real_mes'] = $mensualdata[0][0]['u_real_mes'];
                $data['mp_real_mes'] = $mensualdata[0][0]['mp_real_mes'];
                $data['u_real_acum'] = $mensual_acum_data[0][0]['u_real_acum'];
                $data['mp_real_acum'] = $mensual_acum_data[0][0]['mp_real_acum'];
                    
                $this->Session->write('data', $data);
                $this->set('data', $data);
            }
        }
        
        if($pdf === 'true')
        {
            $data = $this->Session->read('data');
            $this->set('data', $data);
                  
            $params = array(
                'download' => false,
                'name' => 'cumplimiento_plan.pdf',
                'paperOrientation' => 'landscape',
                'paperSize' => 'letter'
                );
            
            $this->set($params);
        }
    }
    
    public function index()
    {
        
    }
}
?>