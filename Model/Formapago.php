<?php
App::uses('AppModel', 'Model');
/**
 * Formapago Model
 *
 * @property Fuerzatrabajoordene $Fuerzatrabajoordene
 */
class Formapago extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Fuerzatrabajoordene' => array(
			'className' => 'Fuerzatrabajoordene',
			'foreignKey' => 'formapago_id',
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
