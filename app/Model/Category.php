<?php

class Category extends AppModel {
	public $validate = array(
		/*'name'	=> array(
			'rule'	=> array('notEmpty')
		)*/
		'name'	=> array(
			array(
				'rule'		=> 'notEmpty',
				'message'	=> 'Es necesario introducir un nombre de categoria'
			),
			array(
				'rule'		=> array('check_category', 'name'),
				'message'	=> 'La categoria ya existe!'
			)
		)
	);
	
	public function check_category($null, $category) {
		
		if(!$this->find('first', array(
			'conditions'	=> array(
				'name' => $this->data[$this->name][$category],
				'id !=' => $this->id
			)
		))) {
			return true;
		}
		
		return false;
	}
}
