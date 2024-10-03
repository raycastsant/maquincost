<?php

/**
 * Ciudadarea Test Case
 *
 */
class CiudadareaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.usersciudaddivisione',
		'app.user',
		'app.tipousuario',
		'app.userscentro',
		'app.reclamacioncentro',
		'app.reclamacione',
		'app.reclamaciondivisione',
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
		$this->Ciudadarea = ClassRegistry::init('Ciudadarea');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ciudadarea);

		parent::tearDown();
	}

}
