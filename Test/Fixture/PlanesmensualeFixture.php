<?php
/**
 * PlanesmensualeFixture
 *
 */
class PlanesmensualeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'ordene_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'tipopieza_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'materiale_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'mes' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'establecimiento' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'cantpiezas' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'costounidad' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'costototal' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'matprim_pesounidad' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'matprim_pesototal' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'matprim_ancho' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'matprim_largo' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'observaciones' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'FKplanesmens368209' => array('column' => 'ordene_id', 'unique' => 0), 'FKplanesmens342014' => array('column' => 'tipopieza_id', 'unique' => 0), 'FKplanesmens604445' => array('column' => 'materiale_id', 'unique' => 0)),
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
			'ordene_id' => 1,
			'tipopieza_id' => 1,
			'materiale_id' => 1,
			'mes' => 1,
			'establecimiento' => 'Lorem ipsum dolor sit amet',
			'cantpiezas' => 1,
			'costounidad' => 1,
			'costototal' => 1,
			'matprim_pesounidad' => 1,
			'matprim_pesototal' => 1,
			'matprim_ancho' => 1,
			'matprim_largo' => 1,
			'observaciones' => 'Lorem ipsum dolor sit amet'
		),
	);

}
