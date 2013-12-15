<?php

class ProjectsController extends AppController {
		
	public function beforeFilter() {   
    	parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}
	
	public function index() {
		$this->set('projects', $this->Project->find('all'));
	}
	
	public function view($id = null) {
		if((!$id || !$project = $this->Project->find('first', array('conditions' => array('Project.is_active' => true, 'Project.id' => $id))))) {
			throw new NotFoundException('The project does not exist or is inactive');
		}
		
		$this->loadModel('Message');
		$this->loadModel('Reward');
		$this->loadModel('Notification');
		
		$messages = $messagesNOT = $this->Message->find('all', array(
			'conditions' => array(
				'Message.project_id' => $id
			)
		));
		
		foreach($messagesNOT as $messageNOT) {
			$this->Notification->query("UPDATE notifications set viewed=1 WHERE message_id='".$messageNOT['Message']['id']."' AND user_id='".$this->Auth->user('id')."'");
		}
		
		$rewards = $this->Reward->find('all', array(
			'conditions' => array(
				'Reward.project_id' => $id
			)
		));
		
		
		$this->set(array('project'=> $project, 'messages' => $messages, 'rewards' => $rewards));
	}
	
	public function edit($id = null) {
		if((!$id || !$this->Auth->loggedIn() || !$proyect = $this->Project->findById($id)) || !$this->isPropietary($id)) {
			throw new NotFoundException();
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Project->id			= $id;
			if($this->Project->save($this->request->data)) {
				$this->Session->setFlash('Project successfully updated');
				return $this->redirect(array('admin' => false, 'controller' => 'pages', 'action' => 'index'));
			}
			$this->Session->setFlash('Can not update project');
		}
		
		if(!$this->request->data) {
			$this->request->data = $proyect;
			$this->loadModel('Category');
			
			$this->set('categories', $this->Category->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
		}
	}

	public function add() {
		if(!$this->Auth->loggedIn()) {
			throw new NotFoundException("Error Processing Request");
		}
		if($this->request->is('post')) {
			$this->Project->create();
			if($this->Project->save($this->request->data)) {
				$this->Session->setFlash('The project has been saved successfully');
				return $this->redirect(array('admin' => false, 'action' => 'index'));
			}
			$this->Session->setFlash('Can not create a project');
		}
		
		if(!$this->request->data) {
			$this->loadModel('Category');
			
			$this->set('categories', $this->Category->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
		}
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		$this->set('projects', $this->Project->find('all'));
	}

	public function admin_view($id = null) {
		if((!$id || !$project = $this->Project->findById($id)) && !$this->isAuthorized()) {
			throw new NotFoundException('User invalid');
		}
		
		$this->set('project', $project);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		if($this->request->is('post')) {
			$this->Project->create();
			if($this->Project->save($this->request->data)) {
				$this->Session->setFlash('The project has been saved successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Can not create a project');
		}
		
		if(!$this->request->data) {
			$this->loadModel('Category');
			$this->loadModel('User');
			
			$this->set('categories', $this->Category->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email'),
				'conditions'	=> array('is_active' => true)
			)));	
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$proyect = $this->Project->findById($id)) && !$this->isAuthorized()) {
			throw new NotFoundException('Category invalid');
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Project->id = $id;
			if($this->Project->save($this->request->data)) {
				$this->Session->setFlash('Project successfully updated');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Can not update project');
		}
		
		if(!$this->request->data) {
			$this->request->data = $proyect;
			$this->loadModel('Category');
			$this->loadModel('User');
			
			$this->set('categories', $this->Category->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email'),
				'conditions'	=> array('is_active' => true)
			)));
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$proyect = $this->Project->findById($id)) && !$this->isAuthorized()) {
			throw new NotFoundException('Category invalid or have the necessary permissions');
		}
		
		if($this->Project->delete($id)) {
			$this->Session->setFlash('The project '.h($proyect['Project']['name']).' has been successfully removed');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
