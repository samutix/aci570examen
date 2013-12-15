<?php

class UsersController extends AppController {
	
	private $errorMessage = "Username invalid or do not have permission";
		
	public function beforeFilter() {   
    	parent::beforeFilter();
		$this->Auth->allow('login', 'register');
	}
	
	public function login() {
		if ($this->request->is('post')) {
	        if ($this->Auth->login() && $this->isActive()) {
	            return $this->redirect($this->Auth->redirectUrl());
	        }
	        else {
	            $this->Session->setFlash('Username or password incorrect');
	        }
	    }
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function register() {
		if($this->request->is('post')) {
			$this->User->create();
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('¡You have successfully registered!');
				return $this->redirect(array('admin' => false, 'controller' => 'pages', 'action' => 'index'));
			}
			$this->Session->setFlash('Can not create user');
		}
	}
	
	public function view($id = null) {
		$user = $this->User->find('first', array(
			'conditions' => array(
				'id' => $id,
				'is_active' => true
			)
		));
				
		if (!$id || !isset($user['User'])) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		$this->loadModel('Project');
		$projects = $this->Project->find('all', array(
			'conditions' => array(
				'user_id' => $id 
			)
		));
		
		$this->set(array('usuario' => $user, 'projects' => $projects));
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		$this->set('users', $this->User->find('all'));
	}

	public function admin_view($id = null) {
		if((!$id || !$user = $this->User->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		$this->set('usuario', $user);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		if($this->request->is('post')) {
			$this->User->create();
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Can not create user');
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$user = $this->User->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->User->id = $id;
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('User edited successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Can not update user');
		}
		
		if(!$this->request->data) {
			$this->request->data = $user;
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$user = $this->User->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorMessage);
		}
		
		if($this->User->delete($id)) {
			$this->Session->setFlash('The user '.h($user['User']['first_name']).' '.h($user['User']['last_name']).' has been successfully removed');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
