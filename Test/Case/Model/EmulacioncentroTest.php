<?php

/**
 * Emulacioncentro Test Case
 *
 */
class EmulacioncentroTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.emulacioncentro',
		'app.emulacione',
		'app.emulaciondivisione',
		'app.indicadordivisione',
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
		'app.indicadorcentro'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Emulacioncentro = ClassRegistry::init('Emulacioncentro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Emulacioncentro);

		parent::tearDown();
	}

}
