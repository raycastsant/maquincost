<?php
App::uses('AppModel', 'Model');
/**
 * Ctregistro Model
 *
 * @property Cartastecnologica $Cartastecnologica
 * @property Operacione $Operacione
 * @property Tipooperacione $Tipooperacione
 * @property Elementoscortante $Elementoscortante
 * @property Instrumentosauxiliare $Instrumentosauxiliare
 * @property Instrumentosmedicion $Instrumentosmedicion
 */
class Ctregistro extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'elementoscortante_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cartastecnologica' => array(
			'className' => 'Cartastecnologica',
			'foreignKey' => 'cartastecnologica_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Operacione' => array(
			'className' => 'Operacione',
			'foreignKey' => 'operacione_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipooperacione' => array(
			'className' => 'Tipooperacione',
			'foreignKey' => 'tipooperacione_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Elementoscortante' => array(
			'className' => 'Elementoscortante',
			'foreignKey' => 'elementoscortante_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Instrumentosauxiliare' => array(
			'className' => 'Instrumentosauxiliare',
			'foreignKey' => 'instrumentosauxiliare_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Instrumentosmedicion' => array(
			'className' => 'Instrumentosmedicion',
			'foreignKey' => 'instrumentosmedicion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
