<?php
App::uses('AppModel', 'Model');
/**
 * Agrupadormateriale Model
 *
 * @property Tiposmateriale $Tiposmateriale
 */
class Agrupadormateriale extends AppModel 
{
    public $displayField = 'nombre';

    public $excludeFields = array('id');
    
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Tiposmateriale' => array(
			'className' => 'Tiposmateriale',
			'foreignKey' => 'agrupadormateriale_id',
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
    
    public function getFieldList()
    {
        return array('nombre', 'factor_peso');
    }
    
    public function haveSubModel()
    {
        return true;
    }
    
    public function getSubmodelList()
    {
        return array('Tiposmateriale');
    }
}