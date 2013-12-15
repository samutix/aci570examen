<?php

class CategoriesController extends AppController {
		
	public function beforeFilter() {   
    	parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}
	
	public function index() {
		$this->set('categories', $this->Category->find('all'));
	}
	
	public function view($id = null) {
		if(!$id || !$this->Category->exists($id)) {
			throw new NotFoundException("Error Processing Request");
		}
		
		$this->loadModel('Project');
		$this->set('projects', $this->Project->find('all', array('conditions' => array('category_id' => $id))));
	}

	public function admin_index() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		$this->set('categories', $this->Category->find('all'));
	}

	public function admin_view($id = null) {
		if((!$id || !$category = $this->Category->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException('User invalid');
		}
		
		$this->set('categories', $category);
	}
	
	public function admin_add() {
		if(!$this->isAuthorized()) {
			throw new NotFoundException("Error Processing Request");
		}
		if($this->request->is('post')) {
			$this->Category->create();
			if($this->Category->save($this->request->data)) {
				$this->Session->setFlash('The category has been saved successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('You can not create a category ');
		}
	}
	
	public function admin_edit($id = null) {
		
		if((!$id || !$category = $this->Category->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException('Category invalid');
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Category->id = $id;
			if($this->Category->save($this->request->data)) {
				$this->Session->setFlash('Category updated successfully');
				return $this->redirect(array('admin' => true, 'action' => 'index'));
			}
			$this->Session->setFlash('Can not update the category');
		}
		
		if(!$this->request->data) {
			$this->request->data = $category;
		}
	}

	public function admin_delete($id = null) {
		if((!$id || !$category = $this->Category->findById($id)) || !$this->isAuthorized()) {
			throw new NotFoundException('Category invalid');
		}
		
		if($this->Category->delete($id)) {
			$this->Session->setFlash('The category '.h($category['Category']['name']).' has been successfully removed');
			return $this->redirect(array('admin' => true, 'action' => 'index'));
		}
	}
}
