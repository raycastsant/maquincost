<?php

/**
 * ReclamacionesController Test Case
 *
 */
class ReclamacionesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reclamacione',
		'app.reclamacioncentro',
		'app.emulacioncentro',
		'app.emulacione',
		'app.emulaciondivisione',
		'app.indicadordivisione',
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
		'app.reclamaciondivisione',
		'app.tiposindicadore',
		'app.indicadorcentro'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Reclamaciones = new TestReclamacionesController();
		$this->Reclamaciones->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reclamaciones);

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
