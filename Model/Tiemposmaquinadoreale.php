<?php
App::uses('AppModel', 'Model');
/**
 * Tiemposmaquinadoreale Model
 *
 * @property Ordenreal $Ordenreal
 * @property Maquina $Maquina
 */
class Tiemposmaquinadoreale extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ordenreal_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'tiempo_corte' => array(
			'decimal' => array(
				'rule' => array('decimal'),
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
		'Ordenreal' => array(
			'className' => 'Ordenreal',
			'foreignKey' => 'ordenreal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Maquina' => array(
			'className' => 'Maquina',
			'foreignKey' => 'maquina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
