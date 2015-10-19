<?php
	namespace App\Controller;

	class CategoriesController extends AppController {
		public function initialize() {
			parent::initialize();
			$this->loadComponent('Paginator');
			$this->set('class', 'category');
		}

		public function index() {
			$this->paginate = [
				'contain' => ['Users']
			];
			$this->set('categories', $this->paginate($this->Categories));
		}
	}