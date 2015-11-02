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

		public function view($id = null) {
			$complaint = $this->Complaints->get($id, ['contain' => ['Users', 'Categories']]);
			$this->set(compact('complaint'));
		}

		public function add() {
			$complaint = $this->Complaints->newEntity();
			if($this->request->is('post')) {
				$complaint = $this->Complaints->patchEntity($complaint, $this->request->data);

				if(!$this->request->data('anonymous'))
					$complaint->user_id = $this->Auth->user('id');

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