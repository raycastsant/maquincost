<?php
App::uses('Areasindicadordivisione', 'Model');

/**
 * Areasindicadordivisione Test Case
 *
 */
class AreasindicadordivisioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.areasindicadordivisione',
		'app.area',
		'app.areasindicadorcentro',
		'app.indicadore',
		'app.emulacioncentro',
		'app.ciudadarea',
		'app.divisionarea',
		'app.emulaciondivisione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Areasindicadordivisione = ClassRegistry::init('Areasindicadordivisione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Areasindicadordivisione);

		parent::tearDown();
	}

}
