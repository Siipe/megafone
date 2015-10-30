<?php
	namespace App\Controller;

	use DateTime;

	class ComplaintsController extends AppController {
		public function initialize() {
			$this->loadComponent('Paginator');
			$this->set('class', 'complaint');
			parent::initialize();
		}

		public function index() {
			$this->paginate = [
				'limit' => 9,
				'contain' => ['Users', 'Categories'],
				'order' => ['dateCreated' => 'desc']
			];

			$this->set('complaints', $this->paginate($this->Complaints));
		}

		public function add() {
			$complaint = $this->Complaints->newEntity([
					'user_id' => $this->Auth->user('id')
			]);
			if($this->request->is('post')) {
				$complaint = $this->Complaints->patchEntity($complaint, $this->request->data);
				$complaint->dateCreated = new DateTime();
				if($this->Complaints->save($complaint)) {
					$this->setSuccessMessage('Complaint added successfully!');
					return $this->toIndex();
				}
				$this->setErrorMessage('An error has occurred');
			} else
				$this->set('categories', $this->Complaints->Categories->find('list'));

			$this->set(compact('complaint'));
		}
	}