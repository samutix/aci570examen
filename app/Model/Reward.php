<?php

class Reward extends AppModel {
	
	public $belongsTo = array(
		'Project'	=> array(
			'foreignKey'	=> 'project_id',
		)
	);
	
	public $validate = array(
		'project_id'	=> array(
			'rule'	=> array('notEmpty')
		),
		'description'	=> array(
			'rule'	=> array('notEmpty')
		),
		'max_allowed'	=> array(
			'rule'	=> array('notEmpty')
		),
		'amount'	=> array(
			'rule'	=> array('notEmpty')
		),
		'order'	=> array(
			'rule'	=> array('notEmpty')
		)
	);
}