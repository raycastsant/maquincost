<?php

/**
 * Materiale Test Case
 *
 */
class MaterialeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.materiale',
		'app.tiposmateriale',
		'app.cartastecnologica',
		'app.semiproductoforma',
		'app.maquina',
		'app.maquinasoperacione',
		'app.operacione',
		'app.vpcamaquina',
		'app.tipopieza',
		'app.ctregistro',
		'app.tipooperacione',
		'app.elementoscortante',
		'app.materialelemento',
		'app.formascorte',
		'app.tipoelementoscortante',
		'app.elementocortanteoperacione',
		'app.vpcamaterialeselementoscortante',
		'app.instrumentosauxiliare',
		'app.instrumentosmedicion',
		'app.ordene',
		'app.planesanuale',
		'app.planesmensuale',
		'app.vale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Materiale = ClassRegistry::init('Materiale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Materiale);

		parent::tearDown();
	}

}
