<?php
App::uses('AppController', 'Controller');

/**
 * Clase para controlar las operaciones 
 * básicas en la aplicación
 */
class MainController extends AppController 
{
    var $menus = null;
	    
	public function buildmenu() 
	{
	    $this->menus = $this->getADMIN_MenuValues();
        array_push($this->menus, $this->getReportesMenu());
        array_push($this->menus, $this->getOptionsMenu());
        array_push($this->menus, $this->getPlanificacionMenu());        
       
        if($this->request->is('requested') && $this->menus)
        {
            return $this->menus;
        }
	}
    
    /**Devuelve los menus del usuario nivel ADMINISTRADOR*/
    private function getADMIN_MenuValues()
    {
        return array(0=>$this->getNomencladoresMenu(), 1=>$this->getListadosMenu());
    }
    
    private function getListadosMenu()
    {
        $submenus = array();
        $submenus[] = array(
                             'name' => '<i class="icon-tags"></i>&nbsp;Cartas tecnológicas',
                             'controller' => 'cartastecnologicas',
                             'action' => 'index/1'
                           );
        $submenus[] = array(
                             'name' => '<i class="icon-play"></i>&nbsp;Elementos cortantes',
                             'controller' => 'elementoscortantes',
                             'action' => 'index/1'
                           );             
        $submenus[] = array(
                                'name' => '<i class="icon-print"></i>&nbsp;Máquinas',
                                 'controller' => 'maquinas',
                                 'action' => 'index'
                            );
        $submenus[] = array(
                             'name' => '<i class="icon-user"></i>&nbsp;Operarios',
                             'controller' => 'operarios',
                             'action' => 'index'
                            );   
        $submenus[] = array(
                             'name' => '<i class="icon-th"></i>&nbsp;Órdenes',
                             'controller' => 'ordenes',
                             'action' => 'index'
                           );  
        $submenus[] = array(
                              'name' => '<i class="icon-screenshot"></i>&nbsp;Piezas',
                              'controller' => 'piezas',
                              'action' => 'index'
                            ); 
         
        $listadosMenu = array('name'=>'<b>Listados</b>', 'submenus'=>$submenus);
        
        return $listadosMenu;
    }
    
    private function getNomencladoresMenu()
    {
        $submenus = array();
        $submenus[] = array(
                             'name' => 'Agrupadores de materiales',
                             'controller' => 'agrupadormateriales',
                             'action' => 'index'
                           );
        $submenus[] = array(
                               'name' => 'Calificadores de operarios',
                               'controller' => 'calificacionoperarios',
                               'action' => 'index'
                            );
        $submenus[] = array( 'name' => 'Elementos cortantes',
                             'submenus' => array
                                            (
                                               0 => array
                                                   (
                                                     'name' => 'Formas de corte',
                                                     'controller' => 'formascortes',
                                                     'action' => 'index'
                                                   ),
                                                1 => array
                                                   (
                                                     'name' => 'Material de elementos',
                                                     'controller' => 'materialelementos',
                                                     'action' => 'index'
                                                   ),
                                                2 => array
                                                   (
                                                     'name' => 'Tipos de elementos',
                                                     'controller' => 'tipoelementoscortantes',
                                                     'action' => 'index'
                                                   )
                                            )
                                   );
        $submenus[] = array(
                                'name' => 'Formas de corte de las operaciones',
                                'controller' => 'tipooperaciones',
                                'action' => 'index'
                            );  
        $submenus[] = array(
                                'name' => '<i class="icon-facetime-video"></i>&nbsp;Formas de los Semiproductos',
                                'controller' => 'semiproductoformas',
                                'action' => 'index'
                            );
        $submenus[] = array(
                                 'name' => 'Instrumentos',
                                 'submenus' => array
                                                (
                                                   0 => array
                                                       (
                                                         'name' => '<i class="icon-wrench"></i>&nbsp;Auxiliares',
                                                         'controller' => 'instrumentosauxiliares',
                                                         'action' => 'index'
                                                       ),
                                                    1 => array
                                                       (
                                                         'name' => '<i class="icon-resize-horizontal"></i>&nbsp;Medición',
                                                         'controller' => 'instrumentosmedicions',
                                                         'action' => 'index'
                                                       )
                                                )
                            );
        $submenus[] = array(
                             'name' => 'Materiales de las piezas',
                             'controller' => 'tiposmateriales',
                             'action' => 'index'
                           );
        $submenus[] = array(
                                 'name' => '<i class="icon-cog"></i>&nbsp;Operaciones de las máquinas',
                                 'controller' => 'operaciones',
                                 'action' => 'index'
                            ); 
        $submenus[] = array(
                                'name' => '<i class="icon-time"></i>&nbsp;Tiempos auxiliares',
                                'controller' => 'tiemposauxiliares',
                                'action' => 'index'
                            );     
        $submenus[] = array(
                                'name' => 'Tipos de trabajo',
                                'controller' => 'tipotrabajos',
                                'action' => 'index'
                            );  
         
        $nomencladoresMenu = array('name'=>'<b>Nomencladores</b>', 'submenus'=>$submenus);
        
        return $nomencladoresMenu;
    }
    
    /** Devuelve el menu de Planificacion*/ 
    private function getPlanificacionMenu()
    {
        $submenus[] = array(
                              'name' => '<i class="icon-briefcase"></i>&nbsp;Anual',
                              'controller' => 'planesanuales',
                              'action' => 'index'
                           ); 
       $submenus[] = array(
                              'name' => '<i class="icon-folder-close"></i>&nbsp;Mensual',
                              'controller' => 'planesmensuales',
                              'action' => 'index'
                           );               
         
        $planificacionMenu = array('name'=>'<b>Planificación</b>', 'submenus'=>$submenus);
        
        return $planificacionMenu;
    }
    
    /** Devuelve el menu de Opciones*/ 
    private function getOptionsMenu()
    {
       /* return array(
                    'name' => '<b>Opciones</b>',
                    'submenus' => array
                                (
                                    0 => array
                                       (
                                         'name' => '<i class="icon-share"></i>&nbsp;Actualización de productos del inventario',
                                         'controller' => 'materiales',
                                         'action' => 'index'
                                       )
                                )
                    );*/
                    
        $user = $this->Session->read("Auth.User");
        if(!is_null($user) && $user['Tipousuario']['nivel']==='1')
        {
             $submenus[] = array(
                              'name' => '<i class="icon-user"></i>&nbsp;Administrar usuarios',
                              'controller' => 'users',
                              'action' => 'index'
                           );
        }
                    
        if(!is_null($user) && $user['Tipousuario']['nivel']==='2')
        { 
            $submenus[] = array(
                                  'name' => '<i class="icon-share"></i>&nbsp;Actualización de productos del inventario',
                                  'controller' => 'materiales',
                                  'action' => 'index/1'
                               );
                               
            $submenus[] = array(
                                  'name' => '<i class="icon-share"></i>&nbsp;Exportar datos',
                                  'controller' => 'manejodatos',
                                  'action' => 'export'
                               );
                               
            $submenus[] = array(
                                  'name' => '<i class="icon-share"></i>&nbsp;Importar datos',
                                  'controller' => 'manejodatos',
                                  'action' => 'import'
                               );
        }       
                           
        $submenus[] = array(
                              'divider' => ''
                           );          
        $submenus[] = array(
                              'name' => '<i class="icon-magnet"></i>&nbsp;Cambiar datos de usuario',
                              'controller' => 'users',
                              'action' => 'edit/'.$user['id']
                           );   
          
        if(!is_null($user) && $user['Tipousuario']['nivel']==='2')
        {               
            $seguridad_submenus[] = array(
                              'name' => 'Salvar base de datos',
                              'controller' => 'seguridad',
                              'action' => 'salvar'
                           );
            $seguridad_submenus[] = array(
                              'name' => 'Restaurar base de datos',
                              'controller' => 'users',
                              'action' => 'edit/'.$user['id']
                           );
                           
            $submenus[] = array(
                                  'name' => '<b>Seguridad</b>',
                                  'submenus' => $seguridad_submenus,
                               );
        }  
         
        $planificacionMenu = array('name'=>'<b>Opciones</b>', 'submenus'=>$submenus);
        
        return $planificacionMenu;
    }
    
    /** Devuelve el menu de Reportes*/ 
    private function getReportesMenu()
    {
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Cantidad de surtidos',
                              'controller' => 'reportes',
                              'action' => 'fp_cantidad_surtidos'
                           );  
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Control de piezas elaboradas',
                              'controller' => 'reportes',
                              'action' => 'fp_control_piezas_elaboradas'
                           );  
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Cumplimiento del plan',
                              'controller' => 'reportes',
                              'action' => 'fp_cumplimiento_plan'
                           );  
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Gastos de materia prima',
                              'controller' => 'reportes',
                              'action' => 'fp_gasto_materia_prima'
                           );   
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Horas-hombre trabajadas',
                              'controller' => 'reportes',
                              'action' => 'fp_horas_hombre'
                           ); 
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Listado de elementos cortantes',
                              'controller' => 'reportes',
                              'action' => 'fp_listado_elementos_cortantes'
                           ); 
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Listado de máquinas',
                              'controller' => 'reportes',
                              'action' => 'listado_maquinas'
                           ); 
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Listado de operarios y tarifas',
                              'controller' => 'reportes',
                              'action' => 'listado_operarios'
                           ); 
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Registro de órdenes de trabajo',
                              'controller' => 'reportes',
                              'action' => 'fp_registro_ordenes'
                           );  
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Reporte de orden de trabajo',
                              'controller' => 'reportes',
                              'action' => 'form_param_reporte_orden'
                           );    
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Tiempo de operación de las máquinas',
                              'controller' => 'reportes',
                              'action' => 'fp_tiempo_operacion_maquinas'
                           ); 
        $submenus[] = array(
                              'name' => '<i class="icon-list-alt"></i>&nbsp;Valor de la producción realizada',
                              'controller' => 'reportes',
                              'action' => 'fp_valor_produccion'
                           ); 
         
        $reportesMenu = array('name'=>'<b>Reportes</b>', 'submenus'=>$submenus);
        
        return $reportesMenu;
    }
            
    /** 
    Función que muestra la página principal*/
    function index()
    {
         /* $user = $this->Session->read("Auth.User");

          if(!isset($user)) 
          {
            $guestUser = array('username' => 'guest', 'nivel'=>'0');  
            $this->Session->write('Auth.User', $guestUser);
          }*/
    }
    
    /** Establece un valor en una variable de session*/
    public function set_sesion_value($identyfier, $value)
    {
        
    }
           
    public function isAuthorized($user) 
    {       
        return true;
    }   
}    
?>