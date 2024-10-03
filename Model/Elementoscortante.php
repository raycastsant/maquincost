<?php
App::uses('AppModel', 'Model');
/**
 * Elementoscortante Model
 *
 * @property Materialelemento $Materialelemento
 * @property Formascorte $Formascorte
 * @property Tipoelementoscortante $Tipoelementoscortante
 * @property Ctregistro $Ctregistro
 * @property Elementocortanteoperacione $Elementocortanteoperacione
 */
class Elementoscortante extends AppModel 
{

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Inserte un nombre',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descripcion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Inserte una descripción',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'calzada' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Materialelemento' => array(
			'className' => 'Materialelemento',
			'foreignKey' => 'materialelemento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Formascorte' => array(
			'className' => 'Formascorte',
			'foreignKey' => 'formascorte_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipoelementoscortante' => array(
			'className' => 'Tipoelementoscortante',
			'foreignKey' => 'tipoelementoscortante_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ctregistro' => array(
			'className' => 'Ctregistro',
			'foreignKey' => 'elementoscortante_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Elementocortanteoperacione' => array(
			'className' => 'Elementocortanteoperacione',
			'foreignKey' => 'elementoscortante_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
