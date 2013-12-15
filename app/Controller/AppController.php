<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	
	public $helpers		= array('Html', 'Form');
	
	public $components	= array('Session', 'Auth' => array(
		'loginAction' => array(
			'admin'			=> false,
			'controller'	=> 'users',
			'action'		=> 'login'
		),
		'loginRedirect' => array(
			'admin'			=> false,
			'controller'	=> 'pages',
			'action'		=> 'index'
		),
		'logoutRedirect' => array(
			'admin'			=> false,
			'controller'	=> 'pages',
			'action'		=> 'index'
		),
		'authError' => 'No estás permitido a ver ésta área',
		'authenticate' => array(
			'Form' => array(
				'fields' => array(
					'username' => 'email'
				)
			)
		)
	));
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		$user = $this->Auth->user();
		
	    if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin' && $this->isAuthorized()) {
	        $this->layout = 'admin';
			
			$statistics = array();
			
			$this->loadModel('Project');
			$this->loadModel('Contribution');
			$this->loadModel('User');
			
			$statistics['Projects'] = $this->Project->find('count');
			$statistics['Colected donations'] = $this->Contribution->query("SELECT ROUND(SUM(amount), 2) as total FROM contributions")[0][0]['total'];
			$statistics['Users'] = $this->User->find('count');
			$statistics['Inactive projects'] = $this->Project->find('count', array(
				'conditions' => array(
					'Project.is_active' => false
				)
			));
			
			$statistics['Inactive users'] = $this->User->find('count', array(
				'conditions' => array(
					'User.is_active' => false
				)
			));
			
			//print_r($statistics);
			
			$this->set('statistics', $statistics);
	    }
	}
	
	public function beforeRender() {
		
		$loggedIn	= null;
		$user		= null;
		
		if($loggedIn = $this->Auth->loggedIn()) {
			$user = $this->Auth->user();
		}
		
		$user['new_messages']  = $this->haveNewMessages();
		
		$this->set('loggedIn', $loggedIn);
		$this->set('user', $user);
	}
	
	public function isAuthorized() {
		$user = $this->Auth->user();
		
		return (bool)($user['is_active'] && $user['is_admin']);
	}
	
	public function isActive() {
		$user = $this->Auth->user();
		
		return ($user['is_active']) ? true : false;
	}

	public function isPropietary($project_id) {
		$user = $this->Auth->user();
		$this->loadModel('Project');
		if($this->Project->find('first', array(
			'conditions'	=> array(
				'Project.user_id' => $user['id'],
				'Project.id' => $project_id
			)
		)) || $this->Auth->user('is_admin')) {
			return true;
		}
		
		return false;
	}
	
	public function haveNewMessages() {
		$user = $this->Auth->user();
		$this->loadModel('Notification');
		
		if($this->Notification->find('first', array(
			'conditions' => array(
				'Notification.user_id' => $user['id'],
				'Notification.viewed' => false
			)
		))) {
			return true;
		}
		return false;
	}
}
