<?php
/**
 * VpcamaterialeselementoscortanteFixture
 *
 */
class VpcamaterialeselementoscortanteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'elementoscortante_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'tiposmateriale_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'vel_min_viruta' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'vel_max_viruta' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'av_min_viruta' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'av_max_viruta' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'pfc_min_viruta' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'pfc_max_viruta' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'vel_min_desbaste' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'vel_max_desbaste' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'av_min_desbaste' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'av_max_desbaste' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'pfc_min_desbaste' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'pfc_max_desbaste' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'vel_min_afinar' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'vel_max_afinar' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'av_min_afinar' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'av_max_afinar' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'pfc_min_afinar' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'pfc_max_afinar' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'FKvpcamateri378306' => array('column' => 'tiposmateriale_id', 'unique' => 0), 'FKvpcamateri599933' => array('column' => 'elementoscortante_id', 'unique' => 0)),
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
			'elementoscortante_id' => 1,
			'tiposmateriale_id' => 1,
			'vel_min_viruta' => 1,
			'vel_max_viruta' => 1,
			'av_min_viruta' => 1,
			'av_max_viruta' => 1,
			'pfc_min_viruta' => 1,
			'pfc_max_viruta' => 1,
			'vel_min_desbaste' => 1,
			'vel_max_desbaste' => 1,
			'av_min_desbaste' => 1,
			'av_max_desbaste' => 1,
			'pfc_min_desbaste' => 1,
			'pfc_max_desbaste' => 1,
			'vel_min_afinar' => 1,
			'vel_max_afinar' => 1,
			'av_min_afinar' => 1,
			'av_max_afinar' => 1,
			'pfc_min_afinar' => 1,
			'pfc_max_afinar' => 1
		),
	);

}
