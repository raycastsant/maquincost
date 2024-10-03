<?php

/**
 * Agrupadore Test Case
 *
 */
class AgrupadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.agrupadore',
		'app.indicadore',
		'app.tiposindicadore',
		'app.area',
		'app.areasindicadorcentro',
		'app.areasindicadordivisione',
		'app.ciudadarea',
		'app.ciudade',
		'app.entidade',
		'app.centro',
		'app.divisione',
		'app.divisionarea',
		'app.usersciudaddivisione',
		'app.user',
		'app.tipousuario',
		'app.userscentro',
		'app.reclamacioncentro',
		'app.reclamacione',
		'app.reclamaciondivisione',
		'app.emulaciondivisione',
		'app.emulacione',
		'app.emulacioncentro',
		'app.indicadorcentro',
		'app.indicadordivisione',
		'app.resultadodivisione',
		'app.resultado',
		'app.resultadocentro'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Agrupadore = ClassRegistry::init('Agrupadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Agrupadore);

		parent::tearDown();
	}

}
