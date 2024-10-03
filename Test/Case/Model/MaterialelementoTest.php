<?php

/**
 * Materialelemento Test Case
 *
 */
class MaterialelementoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.materialelemento',
		'app.elementoscortante',
		'app.formascorte',
		'app.tipoelementoscortante',
		'app.ctregistro',
		'app.cartastecnologica',
		'app.materiale',
		'app.semiproductoforma',
		'app.maquina',
		'app.maquinasoperacione',
		'app.operacione',
		'app.vpcamaquina',
		'app.tipopieza',
		'app.ordene',
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
		$this->Materialelemento = ClassRegistry::init('Materialelemento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Materialelemento);

		parent::tearDown();
	}

}
