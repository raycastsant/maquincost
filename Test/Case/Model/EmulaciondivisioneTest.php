<?php

/**
 * Emulaciondivisione Test Case
 *
 */
class EmulaciondivisioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.emulaciondivisione',
		'app.emulacione',
		'app.emulacioncentro',
		'app.indicadorcentro',
		'app.indicadore',
		'app.agrupadore',
		'app.resultado',
		'app.resultadocentro',
		'app.centro',
		'app.entidade',
		'app.ciudade',
		'app.ciudadarea',
		'app.area',
		'app.areasindicadorcentro',
		'app.areasindicadordivisione',
		'app.divisionarea',
		'app.divisione',
		'app.resultadodivisione',
		'app.usersciudaddivisione',
		'app.user',
		'app.tipousuario',
		'app.userscentro',
		'app.reclamacioncentro',
		'app.reclamacione',
		'app.reclamaciondivisione',
		'app.tiposindicadore',
		'app.indicadordivisione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Emulaciondivisione = ClassRegistry::init('Emulaciondivisione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Emulaciondivisione);

		parent::tearDown();
	}

}
