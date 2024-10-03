<?php
App::uses('AppModel', 'Model');
/**
 * Elementocortanteoperacione Model
 *
 * @property Operacione $Operacione
 * @property Elementoscortante $Elementoscortante
 * @property Vpcamaterialeselementoscortante $Vpcamaterialeselementoscortante
 */
class Elementocortanteoperacione extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'operacione_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'elementoscortante_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Operacione' => array(
			'className' => 'Operacione',
			'foreignKey' => 'operacione_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Elementoscortante' => array(
			'className' => 'Elementoscortante',
			'foreignKey' => 'elementoscortante_id',
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
		'Vpcamaterialeselementoscortante' => array(
			'className' => 'Vpcamaterialeselementoscortante',
			'foreignKey' => 'elementocortanteoperacione_id',
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
