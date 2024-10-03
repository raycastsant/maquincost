<?php

/**
 * Cartastecnologica Test Case
 *
 */
class CartastecnologicaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cartastecnologica',
		'app.materiale',
		'app.semiproductoforma',
		'app.maquina',
		'app.tipopieza',
		'app.ctregistro',
		'app.ordene'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cartastecnologica = ClassRegistry::init('Cartastecnologica');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cartastecnologica);

		parent::tearDown();
	}

}
