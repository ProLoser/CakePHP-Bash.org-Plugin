<?php
App::uses('AppModel', 'Model');
/**
 * Quote Model
 *
 */
class Quote extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'bash_id' => array(
			'unique' => array(
				'rule' => array('isUnique'),
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rank' => array(
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
}
