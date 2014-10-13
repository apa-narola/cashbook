<?php

App::uses('AppModel', 'Model');

/**
 * TransactionType Model
 *
 * @property TransactionType $ParentTransactionType
 * @property TransactionType $ChildTransactionType
 */
class TransactionType extends AppModel
{

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'title';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Title is required.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'custom' => array(
				'rule' => 'alphaNumericDashUnderscoreSpace',
				'message' => 'Title can only be letters, numbers, dash, underscore and space'
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
		'ParentTransactionType' => array(
			'className' => 'TransactionType',
			'foreignKey' => 'parent_id',
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
		'ChildTransactionType' => array(
			'className' => 'TransactionType',
			'foreignKey' => 'parent_id',
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

	public function alphaNumericDashUnderscoreSpace($check)
	{
		// $data array is passed using the form field name as the key
		// have to extract the value to make the function generic
		$value = array_values($check);
		$value = $value[0];

		return preg_match('|^[0-9a-zA-Z_-\s/&]*$|', $value);
	}

	public function getTransactionTypes($type = 'list', $parent_id = null)
	{
		$conditions = array();
		$conditions["status"] = 1;
		if (!is_null($parent_id) && is_numeric($parent_id))
			$conditions["parent_id"] = $parent_id;

		return $this->ParentTransactionType->find($type, array("conditions" => $conditions));
	}

}
