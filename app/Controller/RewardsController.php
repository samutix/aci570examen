<?php

class RewardsController extends AppController {
	
	private $errorMessage = "Reward invalid or do not have the required permissions";
		
	public function beforeFilter() {   
    	parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}
	
	public function index() {
		$this->set('rewards', $this->Reward->find('all', array(
			'order' => array(
				'Project.name' => 'asc',
				'Reward.amount' => 'desc'
			)
		)));
	}

	public function view($id = null) {
		if(!$id) {
			throw new NotFoundException();
		}

		$this->set('rewards', $this->Reward->find('all', array(
			'conditions' => array(
				'Reward.id' => $id
			)
		)));
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		$this->set('rewards', $this->Reward->find('all'));
	}
	
	public function admin_view($id = null) {
		if((!$id || !$reward = $this->Reward->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		$this->set('reward', $reward);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		if($this->request->is('post')) {
			$this->Reward->create();
			if($this->Reward->save($this->request->data)) {
				$this->Session->setFlash('The reward has been saved successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Unable to create the reward');
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
		
		if((!$id || !$reward = $this->Reward->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Reward->id = $id;
			if($this->Reward->save($this->request->data)) {
				$this->Session->setFlash('Reward updated successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Can not update the reward');
		}
		
		if(!$this->request->data) {
			$this->request->data = $reward;
			$this->loadModel('Project');
			
			$this->set('projects', $this->Project->find('list', array(
				'fields' 		=> array('id', 'name'),
				'conditions'	=> array('is_active' => true)
			)));
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$reward = $this->Reward->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->Reward->delete($id)) {
			$this->Session->setFlash('The reward '.h($reward['Reward']['description']).' has been successfully removed');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
