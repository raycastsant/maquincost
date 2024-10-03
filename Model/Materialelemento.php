<?php
App::uses('AppModel', 'Model');
/**
 * Materialelemento Model
 *
 * @property Elementoscortante $Elementoscortante
 */
class Materialelemento extends AppModel 
{
    public $displayField = 'nombre';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Elementoscortante' => array(
			'className' => 'Elementoscortante',
			'foreignKey' => 'materialelemento_id',
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
