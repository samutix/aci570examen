<?php

class Project extends AppModel {
	
	public $belongsTo = array(
		'Category'	=> array(
			'foreignKey'	=> 'category_id',
			'conditions'	=> array('Category.is_active' => '1')
		),
		'User'		=> array(
			'foreignKey'	=> 'user_id'
		)
	);
	
	public $validate = array(
		'name'	=> array(
			'rule'	=> array('notEmpty')
		),
		'category_id'	=> array(
			'rule'	=> array('notEmpty')
		),
		'user_id'	=> array(
			'rule'	=> array('notEmpty')
		),
		'short_description'	=> array(
			'rule'	=> array('notEmpty')
		),
		'logind_description'	=> array(
			'rule'	=> array('notEmpty')
		),
		'start_date'	=> array(
			'rule'	=> array('notEmpty')
		),
		'end_date'	=> array(
			'rule'	=> array('notEmpty')
		)
	);
}