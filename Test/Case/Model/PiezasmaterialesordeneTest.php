<?php

/**
 * Piezasmaterialesordene Test Case
 *
 */
class PiezasmaterialesordeneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.piezasmaterialesordene',
		'app.ordenreal',
		'app.ordene',
		'app.cartastecnologica',
		'app.materiale',
		'app.tiposmateriale',
		'app.planesanuale',
		'app.planesmensuale',
		'app.vale',
		'app.semiproductoforma',
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
		'app.vpcamaquina',
		'app.tipopieza',
		'app.fuerzatrabajoordene',
		'app.operario',
		'app.calificacionoperario',
		'app.formapago'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Piezasmaterialesordene = ClassRegistry::init('Piezasmaterialesordene');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Piezasmaterialesordene);

		parent::tearDown();
	}

}
