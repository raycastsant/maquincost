<?php

/**
 * Semiproductoforma Test Case
 *
 */
class SemiproductoformaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.semiproductoforma',
		'app.cartastecnologica',
		'app.materiale',
		'app.tiposmateriale',
		'app.planesanuale',
		'app.tipopieza',
		'app.planesmensuale',
		'app.ordene',
		'app.ordenreal',
		'app.fuerzatrabajoordene',
		'app.operario',
		'app.calificacionoperario',
		'app.formapago',
		'app.piezasmaterialesordene',
		'app.vale',
		'app.maquina',
		'app.maquinasoperacione',
		'app.operacione',
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
		'app.vpcamaquina'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Semiproductoforma = ClassRegistry::init('Semiproductoforma');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Semiproductoforma);

		parent::tearDown();
	}

}
