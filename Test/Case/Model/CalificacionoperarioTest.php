<?php

/**
 * Calificacionoperario Test Case
 *
 */
class CalificacionoperarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.calificacionoperario',
		'app.operario'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Calificacionoperario = ClassRegistry::init('Calificacionoperario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Calificacionoperario);

		parent::tearDown();
	}

}
