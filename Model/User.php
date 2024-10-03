<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Tipousuario $Tipousuario
 */
class User extends AppModel 
{

    public function beforeSave($options = array()) 
    {
        if (isset($this->data[$this->alias]['password'])) 
        {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        
        return true;
    }
    
    public $validate = array(
		'tipousuario_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El nombre de usuario no puede estar vacío',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'El nombre de usuario existe, intente con otro',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),    
		),
		'nombre_completo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El Nombre Completo no puede estar vacío',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('minLength','8'),
				'message' => 'La Contraseña debe tener más de 8 dígitos',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'repassword' => array(
			'equaltofield' => array(
				'rule' => array('equaltofield','password'),
				'message' => 'Las Contraseñas deben ser iguales',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tipousuario' => array(
			'className' => 'Tipousuario',
			'foreignKey' => 'tipousuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    function equaltofield($check,$otherfield)
    {
        $fname = '';
        foreach ($check as $key => $value)
        {
            $fname = $key;
            break;
        }
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
    } 
}