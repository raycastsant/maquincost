<?php
App::uses('AppModel', 'Model');
/**
 * Tiemposauxiliare Model
 *
 */
class Tiemposauxiliare extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tiempo';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tiempo' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descripcion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
