<?php

/**
 * Rpm Test Case
 *
 */
class RpmTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rpm',
		'app.maquina',
		'app.maquinasoperacione',
		'app.operacione',
		'app.ctregistro',
		'app.cartastecnologica',
		'app.materiale',
		'app.tiposmateriale',
		'app.agrupadormateriale',
		'app.vpcamaterialeselementoscortante',
		'app.elementoscortante',
		'app.materialelemento',
		'app.formascorte',
		'app.tipoelementoscortante',
		'app.elementocortanteoperacione',
		'app.semiproductoforma',
		'app.tipooperacione',
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
		$this->Rpm = ClassRegistry::init('Rpm');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rpm);

		parent::tearDown();
	}

}
