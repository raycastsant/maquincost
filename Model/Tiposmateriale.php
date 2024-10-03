<?php
App::uses('AppModel', 'Model');
/**
 * Tiposmateriale Model
 *
 * @property Agrupadormateriale $Agrupadormateriale
 * @property Materiale $Materiale
 * @property Vpcamaterialeselementoscortante $Vpcamaterialeselementoscortante
 */
class Tiposmateriale extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';
    
    public $excludeFields = array('id', 'agrupadormateriale_id');

    public function getFieldList()
    {
        return array('nombre', 'resistencia_min', 'resistencia_max', 'um');
    }
    
    public function haveSubModel()
    {
        return true;
    }
    
    public function getSubmodelList()
    {
        return array('Materiale');
    }

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)/*,
		'resistencia_min' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'resistencia_max' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'um' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Agrupadormateriale' => array(
			'className' => 'Agrupadormateriale',
			'foreignKey' => 'agrupadormateriale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Materiale' => array(
			'className' => 'Materiale',
			'foreignKey' => 'tiposmateriale_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Vpcamaterialeselementoscortante' => array(
			'className' => 'Vpcamaterialeselementoscortante',
			'foreignKey' => 'tiposmateriale_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
