<?php

/**
 * Usersciudaddivisione Test Case
 *
 */
class UsersciudaddivisioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Usersciudaddivisione = ClassRegistry::init('Usersciudaddivisione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Usersciudaddivisione);

		parent::tearDown();
	}

}
