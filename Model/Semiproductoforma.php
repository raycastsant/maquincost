<?php
App::uses('AppModel', 'Model');
/**
 * Semiproductoforma Model
 *
 * @property Cartastecnologica $Cartastecnologica
 */
class Semiproductoforma extends AppModel 
{
    public $displayField = 'nombre';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Cartastecnologica' => array(
			'className' => 'Cartastecnologica',
			'foreignKey' => 'semiproductoforma_id',
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
