<?php
App::uses('AppModel', 'Model');
/**
 * Ordene Model
 *
 * @property Planmensualregistro $Planmensualregistro
 * @property Cartasordene $Cartasordene
 * @property Ordenesplanoperario $Ordenesplanoperario
 * @property Ordenreal $Ordenreal
 */
 
class Ordene extends AppModel 
{
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'numero';

	public $validate = array(
		/*'numero' => array(
			'equaltofield' => array(
				'rule' => array('formato_numero'),
				'message' => 'Formato inválido (0000.00.000)',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'planificada' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cant_piezas' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cerrada' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
    

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Planmensualregistro' => array(
			'className' => 'Planmensualregistro',
			'foreignKey' => 'planmensualregistro_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Tipotrabajo' => array(
			'className' => 'Tipotrabajo',
			'foreignKey' => 'tipotrabajo_id',
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
		'Cartasordene' => array(
			'className' => 'Cartasordene',
			'foreignKey' => 'ordene_id',
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
		'Ordenesplanoperario' => array(
			'className' => 'Ordenesplanoperario',
			'foreignKey' => 'ordene_id',
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
		'Ordenreal' => array(
			'className' => 'Ordenreal',
			'foreignKey' => 'ordene_id',
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