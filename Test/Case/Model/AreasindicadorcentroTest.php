<?php
App::uses('Areasindicadorcentro', 'Model');

/**
 * Areasindicadorcentro Test Case
 *
 */
class AreasindicadorcentroTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.areasindicadorcentro',
		'app.area',
		'app.areasindicadordivisione',
		'app.ciudadarea',
		'app.divisionarea',
		'app.indicadore',
		'app.emulacioncentro'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Areasindicadorcentro = ClassRegistry::init('Areasindicadorcentro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Areasindicadorcentro);

		parent::tearDown();
	}

}
