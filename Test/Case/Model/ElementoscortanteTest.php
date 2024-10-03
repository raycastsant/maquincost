<?php

/**
 * Elementoscortante Test Case
 *
 */
class ElementoscortanteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.elementoscortante',
		'app.materialelemento',
		'app.formascorte',
		'app.tipoelementoscortante',
		'app.ctregistro',
		'app.cartastecnologica',
		'app.materiale',
		'app.semiproductoforma',
		'app.maquina',
		'app.tipopieza',
		'app.ordene',
		'app.operacione',
		'app.tipooperacione',
		'app.instrumentosauxiliare',
		'app.instrumentosmedicion',
		'app.elementocortanteoperacione',
		'app.vpcamaterialeselementoscortante'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Elementoscortante = ClassRegistry::init('Elementoscortante');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Elementoscortante);

		parent::tearDown();
	}

}
