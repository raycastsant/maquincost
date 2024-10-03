<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController 
{
    public function beforeFilter() 
    {
        parent::beforeFilter();
		$this->Auth->allow('logout');
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
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
			$this->User->create();
			if ($this->User->save($this->request->data)) 
            {
				$this->Session->showMessage('El usuario ha sido salvado correctamente', $this->MSG_SUCCESS);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->showMessage('No se pudo salvar el usuario. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        
		$tipousuarios = $this->User->Tipousuario->find('list', array('fields'=>array('id', 'descripcion')));
		$this->set(compact('tipousuarios'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) 
        {
            if(array_key_exists('changePassword', $this->request->data['User']))
             $this->set('checked', 'checked');
            
			if ($this->User->save($this->request->data)) 
            {
				$this->Session->showMessage('El usuario ha sido salvado correctamente', $this->MSG_SUCCESS);
                
                $userData = $this->Session->read("Auth.User");
                if($userData['id'] === $id)
                {
                    $typeUserData = $this->User->Tipousuario->read(null, $this->request->data['User']['tipousuario_id']);
                    
                    $userData['tipousuario_id'] = $this->request->data['User']['tipousuario_id'];
                    $userData['username'] = $this->request->data['User']['username'];
                    $userData['nombre_completo'] = $this->request->data['User']['nombre_completo'];
                    $userData['Tipousuario']['id'] = $typeUserData['Tipousuario']['id'];
                    $userData['Tipousuario']['nivel'] = $typeUserData['Tipousuario']['nivel'];
                    $userData['Tipousuario']['descripcion'] = $typeUserData['Tipousuario']['descripcion'];   
                    
                    $this->Session->write("Auth.User", $userData);
                }
                
				$this->redirect(array('action' => 'index'));
			}
            else 
            {
				$this->Session->showMessage('No se pudo salvar el usuario. Inténtelo nuevamente', $this->MSG_ERROR);
			}
		}
        else 
        {
			$this->request->data = $this->User->read(null, $id);
		}
        
		$tipousuarios = $this->User->Tipousuario->find('list');
		$this->set(compact('tipousuarios'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
            $this->Session->showMessage('user eliminado correctamente', $this->MSG_SUCCESS);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->showMessage('No se pudo eliminar el user', $this->MSG_ERROR);
		$this->redirect(array('action' => 'index'));
	}
        
    public function login() 
    {
        if ($this->request->is('post')) 
        {
            $this->Auth->logout();
            $messageFlash = 'Usuario o contraseña no válidos, intente nuevamente';
            
            if ($this->Auth->login()) 
            {   
                return $this->redirect($this->Auth->redirect());               
            }
            
            $this->Session->showMessage(__($messageFlash),$this->MSG_ERROR);
        }
    }
    
    public function logout() 
    {
        /*$name = session_id();
        echo $name;
        /*$file = file(APP.'webroot'.DS.'img'.DS.'tempreport'.$name);
        print_r($file);
        $file->delete();*/
        
        //$this->requestAction('trazas/add/Salió del sistema/');
        return $this->redirect($this->Auth->logout());
    }
    
    public function isAuthorized($user) 
    {
        if($user['Tipousuario']['nivel'] === $this->ADMINISTRATOR_LEVEL) 
        {
            return true;
        }
        else
        if(in_array($this->action, array('edit')))
         return true;
        else 
         return false;
    }
}