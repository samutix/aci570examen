<?php

class Contribution extends AppModel {
	
	public $belongsTo = array(
		'User'	=> array(
			'foreignKey'	=> 'user_id',
		),
		'Reward'	=> array(
			'foreignKey'	=> 'reward_id',
		)
	);
	
	public $validate = array(
		'user_id'	=> array(
			'rule'	=> array('notEmpty')
		),
		'reward_id'	=> array(
			'rule'	=> array('notEmpty')
		),
		'amount'	=> array(
			'rule'	=> array('notEmpty')
		)
	);
}