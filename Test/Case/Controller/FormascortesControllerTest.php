<?php

/**
 * FormascortesController Test Case
 *
 */
class FormascortesControllerTest extends ControllerTestCase {

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
		'app.tiposmateriale',
		'app.agrupadormateriale',
		'app.vpcamaterialeselementoscortante',
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
		'app.semiproductoforma',
		'app.maquina',
		'app.maquinasoperacione',
		'app.operacione',
		'app.elementocortanteoperacione',
		'app.vpcamaquina',
		'app.tipooperacione',
		'app.instrumentosauxiliare',
		'app.instrumentosmedicion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Formascortes = new TestFormascortesController();
		$this->Formascortes->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Formascortes);

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
