<?php

class ContributionsController extends AppController {
	
	private $errorMessage = "\"Contributor\" invalid or do not have the required permissions";
		
	public function beforeFilter() {   
    	parent::beforeFilter();
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		$this->set('Contributions', $this->Contribution->find('all'));
	}
	
	public function add() {
		if($this->request->is('post')) {
			$this->Contribution->create();
			if($this->Contribution->save($this->request->data)) {
				$this->Session->setFlash('The contribution has been saved successfull');
				return $this->redirect(array('admin' => false, 'controller' => 'pages', 'action' => 'index'));
			}
			$this->Session->setFlash('Can not saved the contribution ');
		}
		
		if(!$this->request->data) {
			$this->loadModel('Reward');
			
			$this->set('rewards', $this->Reward->find('list', array(
				'fields' 		=> array('id', 'description')
			)));
		}
	}
	
	public function admin_view($id = null) {
		if((!$id || !$Contribution = $this->Contribution->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		$this->set('Contribution', $Contribution);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		if($this->request->is('post')) {
			$this->Contribution->create();
			if($this->Contribution->save($this->request->data)) {
				$this->Session->setFlash('The contributor has been saved successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Unable to create the contributor ');
		}
		
		if(!$this->request->data) {
			$this->loadModel('User');
			$this->loadModel('Reward');
			
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email'),
				'conditions'	=> array('is_active' => true)
			)));
			$this->set('rewards', $this->Reward->find('list', array(
				'fields' 		=> array('id', 'description')
			)));
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$Contribution = $this->Contribution->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Contribution->id = $id;
			if($this->Contribution->save($this->request->data)) {
				$this->Session->setFlash('Contributor updated successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Can not update the contributor');
		}
		
		if(!$this->request->data) {
			$this->request->data = $Contribution;
			$this->loadModel('User');
			$this->loadModel('Reward');
			
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email'),
				'conditions'	=> array('is_active' => true)
			)));
			$this->set('rewards', $this->Reward->find('list', array(
				'fields' 		=> array('id', 'description')
			)));
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$Contribution = $this->Contribution->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->Contribution->delete($id)) {
			$this->Session->setFlash('The contribution '.h($Contribution['Contribution']['description']).' has been successfully removed');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
