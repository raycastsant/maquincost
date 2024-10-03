<?php
/**
 * CtregistroFixture
 *
 */
class CtregistroFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'cartastecnologica_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'operacione_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'tipooperacione_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'elementoscortante_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'instrumentosauxiliare_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'instrumentosmedicion_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'no_orden_operacion' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'diametro_ini' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'diametro_fin' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'longitud_diametro' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'longitud' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'prof_corte' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'cantidad_pasadas' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'avance' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'velocidad' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'revoluciones' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'tiempo_corte' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'tiempo_auxiliar' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'FKctregistro547723' => array('column' => 'cartastecnologica_id', 'unique' => 0), 'FKctregistro441609' => array('column' => 'operacione_id', 'unique' => 0), 'FKctregistro77603' => array('column' => 'tipooperacione_id', 'unique' => 0), 'FKctregistro233266' => array('column' => 'elementoscortante_id', 'unique' => 0), 'FKctregistro887609' => array('column' => 'instrumentosauxiliare_id', 'unique' => 0), 'FKctregistro545156' => array('column' => 'instrumentosmedicion_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'cartastecnologica_id' => 1,
			'operacione_id' => 1,
			'tipooperacione_id' => 1,
			'elementoscortante_id' => 1,
			'instrumentosauxiliare_id' => 1,
			'instrumentosmedicion_id' => 1,
			'no_orden_operacion' => 1,
			'diametro_ini' => 1,
			'diametro_fin' => 1,
			'longitud_diametro' => 1,
			'longitud' => 1,
			'prof_corte' => 1,
			'cantidad_pasadas' => 1,
			'avance' => 1,
			'velocidad' => 1,
			'revoluciones' => 1,
			'tiempo_corte' => 1,
			'tiempo_auxiliar' => 1
		),
	);

}
