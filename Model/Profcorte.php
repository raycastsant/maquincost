<?php
App::uses('AppModel', 'Model');
/**
 * Profcorte Model
 *
 * @property Selectore $Selectore
 */
class Profcorte extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'selectore_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'profcorte' => array(
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
		'Selectore' => array(
			'className' => 'Selectore',
			'foreignKey' => 'selectore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
