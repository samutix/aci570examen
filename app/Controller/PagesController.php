<?php

App::uses('AppController', 'Controller');


class PagesController extends AppController {


	public $uses		= array();
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	
	public function index() {
		$this->loadModel('Project');
			
		$this->set('projects', $this->Project->find('all', array(
			'conditions'	=> array(
								'Project.is_active'	=> true,
								'User.is_active'	=> true,
								'Category.is_active'=> true,
								'OR' => array(
									'Project.end_date > ' => date('Y-m-d', time())
								)
			)
		)));
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
	}
}
