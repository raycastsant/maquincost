<?php

/**
 * Ctregistro Test Case
 *
 */
class CtregistroTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ctregistro',
		'app.cartastecnologica',
		'app.materiale',
		'app.semiproductoforma',
		'app.maquina',
		'app.tipopieza',
		'app.ordene',
		'app.operacione',
		'app.tipooperacione',
		'app.elementoscortante',
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
		$this->Ctregistro = ClassRegistry::init('Ctregistro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ctregistro);

		parent::tearDown();
	}

}
