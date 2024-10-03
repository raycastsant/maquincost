<?php
App::uses('AppModel', 'Model');
/**
 * Materiale Model
 *
 * @property Tiposmateriale $Tiposmateriale
 * @property Cartastecnologica $Cartastecnologica
 * @property Plananualregistro $Plananualregistro
 * @property Planmensualregistro $Planmensualregistro
 * @property Vale $Vale
 */
class Materiale extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'descripcion';
    
    public $excludeFields = array('id', 'tiposmateriale_id');

    public function getFieldList()
    {
        return array('codigo', 'descripcion', 'um', 'existencia', 'precio_mn', 'precio_mlc', 'fecha_ultima_salida', 'almacen_codigo', 'almacen_desc');
    }
    
    public function haveSubModel()
    {
        return false;
    }
    
    public function getSubmodelList()
    {
        return array();
    }
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tiposmateriale' => array(
			'className' => 'Tiposmateriale',
			'foreignKey' => 'tiposmateriale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Cartastecnologica' => array(
			'className' => 'Cartastecnologica',
			'foreignKey' => 'materiale_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Plananualregistro' => array(
			'className' => 'Plananualregistro',
			'foreignKey' => 'materiale_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Planmensualregistro' => array(
			'className' => 'Planmensualregistro',
			'foreignKey' => 'materiale_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Vale' => array(
			'className' => 'Vale',
			'foreignKey' => 'materiale_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Ordenreal' => array(
			'className' => 'Ordenreal',
			'foreignKey' => 'materiale_id',
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
