<?php
/**
 * CartastecnologicaFixture
 *
 */
class CartastecnologicaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'materiale_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'semiproductoforma_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'maquina_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'tipopieza_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'codigo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 30, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'piezamaquinada' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4, 'collate' => NULL, 'comment' => ''),
		'urlplano' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'codigoplano' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => '', 'charset' => 'utf8'),
		'semiproducto_diametro' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'semiproducto_ancho' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'semiproducto_largo' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'semiproducto_peso_neto' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'semiproducto_peso_bruto' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'timpo_prep' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'tiempo_total' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'FKcartastecn582497' => array('column' => 'materiale_id', 'unique' => 0), 'FKcartastecn514175' => array('column' => 'semiproductoforma_id', 'unique' => 0), 'FKcartastecn61686' => array('column' => 'maquina_id', 'unique' => 0), 'FKcartastecn844928' => array('column' => 'tipopieza_id', 'unique' => 0)),
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
			'materiale_id' => 1,
			'semiproductoforma_id' => 1,
			'maquina_id' => 1,
			'tipopieza_id' => 1,
			'codigo' => 'Lorem ipsum dolor sit amet',
			'piezamaquinada' => 1,
			'urlplano' => 'Lorem ipsum dolor sit amet',
			'codigoplano' => 'Lorem ipsum dolor ',
			'semiproducto_diametro' => 1,
			'semiproducto_ancho' => 1,
			'semiproducto_largo' => 1,
			'semiproducto_peso_neto' => 1,
			'semiproducto_peso_bruto' => 1,
			'timpo_prep' => 1,
			'tiempo_total' => 1
		),
	);

}
