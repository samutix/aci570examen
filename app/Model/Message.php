<?php

class Message extends AppModel {
	
	public $belongsTo = array(
		'Project'	=> array(
			'foreignKey'	=> 'project_id',
		)
	);
	
	public $validate = array(
		'project_id'	=> array(
			'rule'	=> array('notEmpty')
		),
		'subject'	=> array(
			'rule'	=> array('notEmpty')
		),
		'message'	=> array(
			'rule'	=> array('notEmpty')
		)
	);
}