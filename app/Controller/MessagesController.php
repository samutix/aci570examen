<?php

class MessagesController extends AppController {
	
	private $errorMessage = "\"message\" invalid or do not have the required permissions";

	public function beforeFilter() {   
    	parent::beforeFilter();
	}
	
	public function add($id_project = null) {
		if(!$id_project || !$this->Auth->login() || !$this->isPropietary($id_project)) {
			throw new NotFoundException();
		}
		
		if($this->request->is('post')) {
			$this->Message->create();
			if($this->Message->save($this->request->data)) {
				$this->Session->setFlash('The message has been saved successfully');
				return $this->redirect(array('admin' => false, 'controller' => 'projects', 'action' => 'view', $id_project));
			}
			$this->Session->setFlash('Unable to create the message');
		}
		
		if(!$this->request->data) {
			$this->set('id_project', $id_project);
		}
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		$this->set('messages', $this->Message->find('all'));
	}
	
	public function admin_view($id = null) {
		if((!$id || !$message = $this->Message->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		$this->set('message', $message);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		if($this->request->is('post')) {
			$this->Message->create();
			if($this->Message->save($this->request->data)) {
				$this->Session->setFlash('The message has been saved successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Unable to create the message');
		}
		
		if(!$this->request->data) {
			$this->loadModel('Project');
			
			$this->set('projects', $this->Project->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$message = $this->Message->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Message->id = $id;
			if($this->Message->save($this->request->data)) {
				$this->Session->setFlash('Successfully updated message');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Unable to update the message');
		}
		
		if(!$this->request->data) {
			$this->request->data = $message;
			$this->loadModel('Project');
			
			$this->set('projects', $this->Project->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$message = $this->Message->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->Message->delete($id)) {
			$this->Session->setFlash('The message '.h($message['message']['subject']).' has been successfully removed');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
