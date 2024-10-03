<?php

/**
 * VpcamaquinasController Test Case
 *
 */
class VpcamaquinasControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vpcamaquina',
		'app.maquina',
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
		'app.tipooperacione',
		'app.instrumentosauxiliare',
		'app.instrumentosmedicion',
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
		'app.semiproductoforma'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Vpcamaquinas = new TestVpcamaquinasController();
		$this->Vpcamaquinas->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vpcamaquinas);

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
