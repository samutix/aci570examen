<?php

class NotificationsController extends AppController {
	
	private $errorNotification = "Notice invalid or do not have the required permissions";
		
	public function beforeFilter() {   
    	parent::beforeFilter();
	}
	
	public function view() {
		if(!$this->Auth->loggedIn()) {
			throw new NotFoundException();
		}
		
		$notifications = $this->Notification->find('all', array(
			'conditions' => array(
				'user_id' => $this->Auth->user('id')
			)
		));
		
		$this->loadModel('Message');
		
		$this->set('notifications', $notifications);
	}
	
	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorNotification);
		}
		
		$this->set('notifications', $this->Notification->find('all'));
	}
	
	public function admin_view($id = null) {
		if((!$id || !$notification = $this->Notification->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorNotification);
		}
		
		$this->set('notification', $notification);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException($this->errorNotification);
		}
		if($this->request->is('post')) {
			$this->Notification->create();
			if($this->Notification->save($this->request->data)) {
				$this->Session->setFlash('The notification has been saved successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Can not create the notification');
		}
		
		if(!$this->request->data) {
			$this->loadModel('Message');
			$this->loadModel('User');
			
			$this->set('messages', $this->Message->find('list', array(
				'fields' 		=> array('id', 'subject')
			)));
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email')
			)));
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$notification = $this->Notification->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorNotification);
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Notification->id = $id;
			if($this->Notification->save($this->request->data)) {
				$this->Session->setFlash('Notice updated successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('You can not update the notification');
		}
		
		if(!$this->request->data) {
			$this->request->data = $notification;
			$this->loadModel('Message');
			$this->loadModel('User');
			
			$this->set('messages', $this->Message->find('list', array(
				'fields' 		=> array('id', 'subject')
			)));
			$this->set('users', $this->User->find('list', array(
				'fields' 		=> array('id', 'email')
			)));
		}
	}
	
	public function admin_delete($id = null) {
		if((!$id || !$notification = $this->Notification->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException($this->errorNotification);
		}
		
		if($this->Notification->delete($id)) {
			$this->Session->setFlash('The notification with id'.$notification['Notification']['id'].' message '.h($notification['Message']['subject']).' has been removed successfully');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
