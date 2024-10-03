<?php

/**
 * Operacione Test Case
 *
 */
class OperacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.operacione',
		'app.ctregistro',
		'app.cartastecnologica',
		'app.materiale',
		'app.tiposmateriale',
		'app.planesanuale',
		'app.planesmensuale',
		'app.vale',
		'app.semiproductoforma',
		'app.maquina',
		'app.maquinasoperacione',
		'app.vpcamaquina',
		'app.tipopieza',
		'app.ordene',
		'app.tipooperacione',
		'app.elementoscortante',
		'app.materialelemento',
		'app.formascorte',
		'app.tipoelementoscortante',
		'app.elementocortanteoperacione',
		'app.vpcamaterialeselementoscortante',
		'app.instrumentosauxiliare',
		'app.instrumentosmedicion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Operacione = ClassRegistry::init('Operacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Operacione);

		parent::tearDown();
	}

}
