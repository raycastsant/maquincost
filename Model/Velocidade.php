<?php
App::uses('AppModel', 'Model');
/**
 * Velocidade Model
 *
 * @property Velocidadrango $Velocidadrango
 */
class Velocidade extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'velocidadrango_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'velocidad' => array(
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
		'Velocidadrango' => array(
			'className' => 'Velocidadrango',
			'foreignKey' => 'velocidadrango_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
