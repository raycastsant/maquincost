<?php
App::uses('AppModel', 'Model');
/**
 * Fuerzatrabajoordene Model
 *
 * @property Operario $Operario
 * @property Ordenreal $Ordenreal
 * @property Formapago $Formapago
 */
class Fuerzatrabajoordene extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'operario_id' => array(
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
		'Operario' => array(
			'className' => 'Operario',
			'foreignKey' => 'operario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ordenreal' => array(
			'className' => 'Ordenreal',
			'foreignKey' => 'ordenreal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)/*,
		'Formapago' => array(
			'className' => 'Formapago',
			'foreignKey' => 'formapago_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)*/
	);
}
