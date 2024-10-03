<?php
/**
 * OrdeneFixture
 *
 */
class OrdeneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'cartastecnologica_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'numero' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'planificada' => array('type' => 'boolean', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'cant_piezas' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'cant_materiales' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'fecha_solicitud' => array('type' => 'date', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'hora_solicitud' => array('type' => 'time', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'fecha_inicio' => array('type' => 'date', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'fecha_fin' => array('type' => 'date', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'laboriosidad' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'precio_material' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'salario_plan' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'tiempo_func_maquinas' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'FKordenes356877' => array('column' => 'cartastecnologica_id', 'unique' => 0)),
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
			'numero' => 'Lorem ipsum dolor sit amet',
			'planificada' => 1,
			'cant_piezas' => 1,
			'cant_materiales' => 1,
			'fecha_solicitud' => '2014-02-25',
			'hora_solicitud' => '11:11:31',
			'fecha_inicio' => '2014-02-25',
			'fecha_fin' => '2014-02-25',
			'laboriosidad' => 1,
			'precio_material' => 1,
			'salario_plan' => 1,
			'tiempo_func_maquinas' => 1
		),
	);

}
