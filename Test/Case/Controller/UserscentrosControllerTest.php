<?php

/**
 * UserscentrosController Test Case
 *
 */
class UserscentrosControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.userscentro',
		'app.user',
		'app.tipousuario',
		'app.usersciudaddivisione',
		'app.ciudadarea',
		'app.area',
		'app.divisionarea',
		'app.divisione',
		'app.entidade',
		'app.centro',
		'app.resultadocentro',
		'app.resultado',
		'app.agrupadore',
		'app.indicadore',
		'app.tiposindicadore',
		'app.indicadorcentro',
		'app.emulacioncentro',
		'app.emulacione',
		'app.emulaciondivisione',
		'app.indicadordivisione',
		'app.reclamaciondivisione',
		'app.reclamacione',
		'app.reclamacioncentro',
		'app.resultadodivisione',
		'app.ciudade'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Userscentros = new TestUserscentrosController();
		$this->Userscentros->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Userscentros);

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
