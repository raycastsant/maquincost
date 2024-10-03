<?php

/**
 * Tiposmateriale Test Case
 *
 */
class TiposmaterialeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tiposmateriale',
		'app.agrupadormateriale',
		'app.materiale',
		'app.cartastecnologica',
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
		'app.planesanuale',
		'app.planesmensuale',
		'app.ordene',
		'app.ordenreal',
		'app.fuerzatrabajoordene',
		'app.operario',
		'app.calificacionoperario',
		'app.formapago',
		'app.piezasmaterialesordene',
		'app.vale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tiposmateriale = ClassRegistry::init('Tiposmateriale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tiposmateriale);

		parent::tearDown();
	}

}
