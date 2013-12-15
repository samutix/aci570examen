<?php

class Notification extends AppModel {
	
	public $belongsTo = array(
		'Message'	=> array(
			'foreignKey'	=> 'message_id',
		),
		'User'	=> array(
			'foreignKey'	=> 'user_id',
		)
	);
	
	public $validate = array(
		'message_id'	=> array(
			'rule'	=> array('notEmpty')
		),
		'user_id'	=> array(
			'rule'	=> array('notEmpty')
		),
		'viewed'	=> array(
			//'rule'	=> array('notEmpty')
		)
	);
}