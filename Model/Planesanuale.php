<?php
App::uses('AppModel', 'Model');
/**
 * Planesanuale Model
 *
 * @property Plananualregistro $Plananualregistro
 */
class Planesanuale extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'anno';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'anno' => array(
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Plananualregistro' => array(
			'className' => 'Plananualregistro',
			'foreignKey' => 'planesanuale_id',
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
