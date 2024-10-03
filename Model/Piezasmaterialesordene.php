<?php
App::uses('AppModel', 'Model');
/**
 * Piezasmaterialesordene Model
 *
 * @property Ordenreal $Ordenreal
 * @property Vale $Vale
 */
class Piezasmaterialesordene extends AppModel {


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
		'Vale' => array(
			'className' => 'Vale',
			'foreignKey' => 'vale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
