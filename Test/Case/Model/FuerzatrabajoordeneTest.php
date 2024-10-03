<?php

/**
 * Fuerzatrabajoordene Test Case
 *
 */
class FuerzatrabajoordeneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.fuerzatrabajoordene',
		'app.operario',
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
		$this->Fuerzatrabajoordene = ClassRegistry::init('Fuerzatrabajoordene');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Fuerzatrabajoordene);

		parent::tearDown();
	}

}
