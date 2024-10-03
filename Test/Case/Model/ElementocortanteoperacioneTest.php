<?php

/**
 * Elementocortanteoperacione Test Case
 *
 */
class ElementocortanteoperacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.elementocortanteoperacione',
		'app.operacione',
		'app.elementoscortante'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Elementocortanteoperacione = ClassRegistry::init('Elementocortanteoperacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Elementocortanteoperacione);

		parent::tearDown();
	}

}
