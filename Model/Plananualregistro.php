<?php
App::uses('AppModel', 'Model');
/**
 * Plananualregistro Model
 *
 * @property Planesanuale $Planesanuale
 * @property Pieza $Pieza
 * @property Materiale $Materiale
 */
class Plananualregistro extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'numeroplano' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cantpiezas' => array(
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
		'Planesanuale' => array(
			'className' => 'Planesanuale',
			'foreignKey' => 'planesanuale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pieza' => array(
			'className' => 'Pieza',
			'foreignKey' => 'pieza_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Materiale' => array(
			'className' => 'Materiale',
			'foreignKey' => 'materiale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
