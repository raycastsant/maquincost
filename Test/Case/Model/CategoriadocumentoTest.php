<?php

/**
 * Categoriadocumento Test Case
 *
 */
class CategoriadocumentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categoriadocumento',
		'app.documento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Categoriadocumento = ClassRegistry::init('Categoriadocumento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Categoriadocumento);

		parent::tearDown();
	}

}
