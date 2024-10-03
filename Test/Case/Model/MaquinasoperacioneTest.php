<?php

/**
 * Maquinasoperacione Test Case
 *
 */
class MaquinasoperacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.maquinasoperacione',
		'app.maquina',
		'app.cartastecnologica',
		'app.materiale',
		'app.semiproductoforma',
		'app.tipopieza',
		'app.ctregistro',
		'app.operacione',
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
		'app.vpcamaquina'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Maquinasoperacione = ClassRegistry::init('Maquinasoperacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Maquinasoperacione);

		parent::tearDown();
	}

}
