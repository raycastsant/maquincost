<?php

/**
 * Divisione Test Case
 *
 */
class DivisioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.divisione',
		'app.entidade',
		'app.centro',
		'app.resultadocentro',
		'app.resultado',
		'app.agrupadore',
		'app.indicadore',
		'app.tiposindicadore',
		'app.area',
		'app.areasindicadorcentro',
		'app.areasindicadordivisione',
		'app.ciudadarea',
		'app.ciudade',
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
		'app.divisionarea',
		'app.resultadodivisione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Divisione = ClassRegistry::init('Divisione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Divisione);

		parent::tearDown();
	}

}
