<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $validate = array(
		'id'	=> array(
			'required'	=> false
		),
		'email' => array(
			array(
				'email',
				'rule'		=> 'notEmpty',
				'required'	=> true,
				'message'	=> 'Es necesario introducir el correo'
			),
			array(
				'rule'		=> array('chek_email', 'email'),
				'message'	=> 'El correo ya existe!'
			)
		),
		'password' => array(
			/*array(
				'rule' => 'notEmpty',
				'required' => true,
            	'message' => 'Please Enter password'
            ),*/
            /*array(                              
                'rule' => array('minLength', 6),
            	'message' => 'La contraseña debe contar con almenos 6 caracteres',
			)*/
		),
		'confirm_password' => array(
			'rule' => array('check_password', 'password'),
			'message' => 'las contraseñas deben coincidir'
		),
		'first_name' => array(
			'rule'	=> array('notEmpty')
		),
		'last_name' => array(
			'rule'	=> array('notEmpty')
		)
	);
	
	public function beforeSave($options = array()) {
		
		if(!empty($this->data[$this->alias]['passEdit'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['passEdit']);
		}
		elseif(isset($this->data[$this->alias]['password']) && !isset($this->data[$this->alias]['passEdit'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
		else {
			unset($this->data[$this->alias]['password']);
		}

	    return true;
	}
	
	public function check_password($check, $field) {
        $fname = '';
        foreach ($check as $key => $value){
            $fname = $key;
            break;
        }
        return $this->data[$this->name][$field] === $this->data[$this->name][$fname];
    }

	public function chek_email($null, $email) {
		
		print_r($this->id);
		
		if(!$this->find('first', array(
			'conditions'	=> array(
				'email' => $this->data[$this->name][$email],
				'id !=' => $this->id
			)
		))) {
			return true;
		}
		
		return false;
	}
}
