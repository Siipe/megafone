<?php
	namespace App\Controller;

	use DateTime;

	class ComplaintsController extends AppController {
		public function initialize() {
			$this->loadComponent('Paginator');
			$this->set('class', 'complaints');
			parent::initialize();
		}

		public function index() {
			$this->paginate = [
				'limit' => 10,
				'contain' => ['Users', 'Categories']
			];

			$this->set('complaints', $this->paginate($this->Complaints));
		}

		public function add() {
			$complaint = $this->Complaints->newEntity();
			if($this->request->is('post')) {
				$complaint = $this->Complaints->patchEntity($complaint, $this->request->data);
				$complaint->dateCreated = new DateTime();
				if($complaint = $this->Complaints->save($complaint)) {
					$this->setSuccessMessage("Complaint $complaint->name added successfully!");
					return $this->toIndex();
				}
				$this->setErrorMessage('An error has occurred');
			}
			$this->set(compact('complaint'));
		}
	}