<?php
App::uses('AppModel', 'Model');
/**
 * Tipousuario Model
 *
 * @property User $User
 */
class Tipousuario extends AppModel 
{
    public $displayField = 'descripcion';

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'tipousuario_id',
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