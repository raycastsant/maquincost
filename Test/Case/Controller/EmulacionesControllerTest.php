<?php

/**
 * EmulacionesController Test Case
 *
 */
class EmulacionesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.emulacione',
		'app.emulacioncentro',
		'app.indicadorcentro',
		'app.indicadore',
		'app.agrupadore',
		'app.resultado',
		'app.resultadocentro',
		'app.centro',
		'app.entidade',
		'app.ciudade',
		'app.ciudadarea',
		'app.area',
		'app.divisionarea',
		'app.divisione',
		'app.resultadodivisione',
		'app.usersciudaddivisione',
		'app.user',
		'app.tipousuario',
		'app.userscentro',
		'app.reclamacioncentro',
		'app.reclamacione',
		'app.reclamaciondivisione',
		'app.emulaciondivisione',
		'app.indicadordivisione',
		'app.tiposindicadore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Emulaciones = new TestEmulacionesController();
		$this->Emulaciones->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Emulaciones);

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
