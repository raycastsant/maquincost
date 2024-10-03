<?php

/**
 * Tiposindicadore Test Case
 *
 */
class TiposindicadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tiposindicadore',
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
		'app.emulaciondivisione',
		'app.emulacione',
		'app.emulacioncentro',
		'app.indicadorcentro',
		'app.indicadordivisione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tiposindicadore = ClassRegistry::init('Tiposindicadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tiposindicadore);

		parent::tearDown();
	}

}
