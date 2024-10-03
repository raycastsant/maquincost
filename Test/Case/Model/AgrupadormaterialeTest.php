<?php

/**
 * Agrupadormateriale Test Case
 *
 */
class AgrupadormaterialeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.agrupadormateriale',
		'app.tiposmateriale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Agrupadormateriale = ClassRegistry::init('Agrupadormateriale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Agrupadormateriale);

		parent::tearDown();
	}

}
