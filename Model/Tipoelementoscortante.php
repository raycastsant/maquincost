<?php
App::uses('AppModel', 'Model');
/**
 * Tipoelementoscortante Model
 *
 * @property Elementoscortante $Elementoscortante
 */
class Tipoelementoscortante extends AppModel 
{
    public $displayField = 'nombre';
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'tipoelementoscortante';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Elementoscortante' => array(
			'className' => 'Elementoscortante',
			'foreignKey' => 'tipoelementoscortante_id',
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
