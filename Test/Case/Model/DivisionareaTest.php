<?php

/**
 * Divisionarea Test Case
 *
 */
class DivisionareaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.divisionarea',
		'app.area',
		'app.areasindicadorcentro',
		'app.areasindicadordivisione',
		'app.ciudadarea',
		'app.ciudade',
		'app.entidade',
		'app.centro',
		'app.divisione',
		'app.resultadodivisione',
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
		'app.resultadocentro'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Divisionarea = ClassRegistry::init('Divisionarea');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Divisionarea);

		parent::tearDown();
	}

}
