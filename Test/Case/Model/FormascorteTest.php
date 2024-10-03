<?php

/**
 * Formascorte Test Case
 *
 */
class FormascorteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.formascorte',
		'app.elementoscortante',
		'app.materialelemento',
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
		$this->Formascorte = ClassRegistry::init('Formascorte');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Formascorte);

		parent::tearDown();
	}

}
