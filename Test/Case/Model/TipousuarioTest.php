<?php

/**
 * Tipousuario Test Case
 *
 */
class TipousuarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipousuario',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipousuario = ClassRegistry::init('Tipousuario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipousuario);

		parent::tearDown();
	}

}
