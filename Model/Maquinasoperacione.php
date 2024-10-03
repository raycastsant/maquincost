<?php
App::uses('AppModel', 'Model');
/**
 * Maquinasoperacione Model
 *
 * @property Maquina $Maquina
 * @property Operacione $Operacione
 */
class Maquinasoperacione extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'maquina_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Maquina' => array(
			'className' => 'Maquina',
			'foreignKey' => 'maquina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Operacione' => array(
			'className' => 'Operacione',
			'foreignKey' => 'operacione_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
