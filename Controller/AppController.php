<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * This is a placeholder class.
 * Create the same file in app/Controller/AppController.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       Cake.Controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller 
{
    protected $ADMINISTRATOR_LEVEL    =    '1';
    protected $TECNOLOGO_LEVEL        =    '2';
    protected $JMTTO_LEVEL            =    '3';
    
    protected $MSG_ERROR = 'alert-error';
    protected $MSG_INFO = 'alert-info';
    protected $MSG_SUCCESS = 'alert-success';
    protected $MSG_WARNING = 'alert-block';
    
    //protected $BD_PROD_URL = 'E:\PROYECTOS\REPOSITORIO\inventarios (PHP Versión 2)\db\Gx_Data.MDB';
    protected $BD_PROD_URL = 'E:\WORK\Gx_Data.MDB';
    protected $BD_PROD_PASS = "alimaticsicema";
    
    protected $UNDEFINED_MATERIAL_NAME = "Indefinido";     
    
    protected $TIPO_OPERACION_AFINADO = "Afinado";
    protected $TIPO_OPERACION_DESBASTE = "Desbaste";
    protected $TIPO_OPERACION_VIRUTA = "Viruta";
    
    protected $PLAN_MENSUAL_NO_PLAN_REG = 16;  
    
    protected $meses = array('1'=>'Enero', '2'=>'Febrero', '3'=>'Marzo', '4'=>'Abril', '5'=>'Mayo', '6'=>'Junio', 
                                       '7'=>'Julio', '8'=>'Agosto', '9'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');
                                       
    
    public $components = array(
        'Session',
        'Auth' => array(
            //'loginRedirect' => array('controller' => 'entidades', 'action' => 'index'),
            //'loginRedirect' => array('controller' => 'emulaciones', 'action' => 'index'),
            //'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
            'authorize' => array('Controller')
          ),
        'RequestHandler'
    );

    public function beforeFilter() 
	{
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'main', 'action' => 'index');
        $this->Auth->loginRedirect = array('controller' => 'main', 'action' => 'index');
    }
    
    protected function uploadFile($file, $url) 
    {      
      if ($file['error'] === UPLOAD_ERR_OK) 
      {
        $id = String::uuid();
        return move_uploaded_file($file['tmp_name'], $url.DS.$file['name']); 
      }
      else 
       return false;
    }
    
    public function isAuthorized($user) 
    {
        // Admin can access every action
       /* if($user['Tipousuario']['nivel'] === $this->ADMINISTRATOR_LEVEL) 
        {
            return true;
        }
        else
         return false;*/
         
         return true;
    }
}