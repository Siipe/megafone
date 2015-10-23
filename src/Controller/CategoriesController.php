<?php
	namespace App\Controller;

	use DateTime;

	class CategoriesController extends AppController {
		public function initialize() {
			parent::initialize();
			$this->loadComponent('Paginator');
			$this->set('class', 'category');
		}

		public function index() {
			$this->paginate = [
				'contain' => 'Users'
			];
			$this->set('categories', $this->paginate($this->Categories));
		}

		public function add() {
			$category = $this->Categories->newEntity();
			if($this->request->is('post')) {
				$category = $this->Categories->patchEntity($category, $this->request->data);
				$category->user_id = $this->Auth->user('id');
				$category->dateCreated = new DateTime();
				if($category = $this->Categories->save($category)) {
					$this->setSuccessMessage("Category $category->name added successfully!");
					return $this->toIndex();
				} else
					$this->setErrorMessage('An error has occurred');
			}
			$this->set(compact('category'));
		}
	}