<?php

/**
 * Userscentro Test Case
 *
 */
class UserscentroTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.userscentro',
		'app.user',
		'app.tipousuario',
		'app.usersciudaddivisione',
		'app.ciudadarea',
		'app.area',
		'app.areasindicadorcentro',
		'app.areasindicadordivisione',
		'app.divisionarea',
		'app.divisione',
		'app.entidade',
		'app.centro',
		'app.resultadocentro',
		'app.resultado',
		'app.agrupadore',
		'app.indicadore',
		'app.tiposindicadore',
		'app.indicadorcentro',
		'app.emulacioncentro',
		'app.emulacione',
		'app.emulaciondivisione',
		'app.indicadordivisione',
		'app.reclamaciondivisione',
		'app.reclamacione',
		'app.reclamacioncentro',
		'app.resultadodivisione',
		'app.ciudade'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Userscentro = ClassRegistry::init('Userscentro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Userscentro);

		parent::tearDown();
	}

}
