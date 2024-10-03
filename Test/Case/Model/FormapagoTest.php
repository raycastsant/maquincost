<?php

/**
 * Formapago Test Case
 *
 */
class FormapagoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.formapago',
		'app.fuerzatrabajoordene'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Formapago = ClassRegistry::init('Formapago');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Formapago);

		parent::tearDown();
	}

}
