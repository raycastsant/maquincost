<?php

/**
 * Maquina Test Case
 *
 */
class MaquinaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.maquinasoperacione',
		'app.vpcamaquina'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Maquina = ClassRegistry::init('Maquina');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Maquina);

		parent::tearDown();
	}

}
