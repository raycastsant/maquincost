<?php

/**
 * Instrumentosauxiliare Test Case
 *
 */
class InstrumentosauxiliareTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.instrumentosauxiliare',
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
		'app.materialelemento',
		'app.formascorte',
		'app.tipoelementoscortante',
		'app.elementocortanteoperacione',
		'app.vpcamaterialeselementoscortante',
		'app.instrumentosmedicion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Instrumentosauxiliare = ClassRegistry::init('Instrumentosauxiliare');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Instrumentosauxiliare);

		parent::tearDown();
	}

}
