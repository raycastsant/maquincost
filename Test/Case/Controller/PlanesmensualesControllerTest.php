<?php

/**
 * PlanesmensualesController Test Case
 *
 */
class PlanesmensualesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.planesmensuale',
		'app.ordene',
		'app.cartastecnologica',
		'app.materiale',
		'app.tiposmateriale',
		'app.agrupadormateriale',
		'app.vpcamaterialeselementoscortante',
		'app.elementoscortante',
		'app.materialelemento',
		'app.formascorte',
		'app.tipoelementoscortante',
		'app.ctregistro',
		'app.operacione',
		'app.elementocortanteoperacione',
		'app.maquinasoperacione',
		'app.maquina',
		'app.vpcamaquina',
		'app.tipooperacione',
		'app.instrumentosauxiliare',
		'app.instrumentosmedicion',
		'app.planesanuale',
		'app.tipopieza',
		'app.vale',
		'app.piezasmaterialesordene',
		'app.ordenreal',
		'app.fuerzatrabajoordene',
		'app.operario',
		'app.calificacionoperario',
		'app.formapago',
		'app.semiproductoforma'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Planesmensuales = new TestPlanesmensualesController();
		$this->Planesmensuales->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Planesmensuales);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	}

}
