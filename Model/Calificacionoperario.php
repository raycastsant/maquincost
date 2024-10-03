<?php
App::uses('AppModel', 'Model');
/**
 * Calificacionoperario Model
 *
 * @property Operario $Operario
 */
class Calificacionoperario extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Operario' => array(
			'className' => 'Operario',
			'foreignKey' => 'calificacionoperario_id',
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
