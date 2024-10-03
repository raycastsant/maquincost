<?php
/**
 * ElementoscortanteFixture
 *
 */
class ElementoscortanteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'materialelemento_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'formascorte_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'tipoelementoscortante_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'nombre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 80, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'diametro' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'formasugecion' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 130, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'calzada' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'FKelementosc291539' => array('column' => 'materialelemento_id', 'unique' => 0), 'FKelementosc265304' => array('column' => 'formascorte_id', 'unique' => 0), 'FKelementosc932586' => array('column' => 'tipoelementoscortante_id', 'unique' => 0)),
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
			'materialelemento_id' => 1,
			'formascorte_id' => 1,
			'tipoelementoscortante_id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'diametro' => 1,
			'formasugecion' => 'Lorem ipsum dolor sit amet',
			'calzada' => 1
		),
	);

}
