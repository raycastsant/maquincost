<?php

/**
 * FuerzatrabajoordenesController Test Case
 *
 */
class FuerzatrabajoordenesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.fuerzatrabajoordene',
		'app.operario',
		'app.calificacionoperario',
		'app.ordenreal',
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
		'app.planesmensuale',
		'app.vale',
		'app.piezasmaterialesordene',
		'app.semiproductoforma',
		'app.formapago'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Fuerzatrabajoordenes = new TestFuerzatrabajoordenesController();
		$this->Fuerzatrabajoordenes->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Fuerzatrabajoordenes);

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
