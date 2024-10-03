<?php

/**
 * Operario Test Case
 *
 */
class OperarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.operario',
		'app.calificacionoperario',
		'app.fuerzatrabajoordene',
		'app.ordenreal',
		'app.formapago'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Operario = ClassRegistry::init('Operario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Operario);

		parent::tearDown();
	}

}
