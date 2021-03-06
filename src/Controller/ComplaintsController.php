<?php
	namespace App\Controller;

	use DateTime;
	use Cake\ORM\TableRegistry;
	use Cake\Datasource\Exception\RecordNotFoundException;

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
                'order' => ['Complaints.comment_count' => 'DESC', 'Complaints.dateCreated' => 'DESC']
            ];

			$this->set('complaints', $this->paginate());
		}

		public function view($id = null) {
			try {
				$response = [
					'complaint' => $this->Complaints->get($id, [
						'contain' => [
							'Users', 
							'Categories', 
							'Comments' => function($q) {
								return $q
										->where(['Comments.comment_id IS' => null])
										->order(['dateCreated' => 'DESC']);
							}, 
							'Comments.Users', 
							'Comments.Replies' => function($q) {
								return $q
										->where(['Replies.comment_id IS NOT' => null])
										->order(['dateCreated' => 'DESC']);
							}, 
							'Comments.Replies.Users'
						]
					])
				];

				if($this->Auth->user())
					$response['newComment'] = TableRegistry::get('Comments')->newEntity();

				$this->set($response);

			} catch(RecordNotFoundException $e) {
                $this->setErrorMessage(__('The record you requested doesn\'t exist'));
                return $this->toIndex();
            }
		}

		public function add() {
			$complaint = $this->Complaints->newEntity(['comment_count' => 0]);
			if($this->request->is('post')) {
				$complaint = $this->Complaints->patchEntity($complaint, $this->request->data);

				if(!$this->request->data('anonymous'))
					$complaint->user_id = $this->Auth->user('id');

				$complaint->dateCreated = new DateTime();
				if($this->Complaints->save($complaint) && !$complaint->errors()) {
					$this->setSuccessMessage(__('Complaint added successfully!'));
					return $this->toIndex();
				}
			}
			$this->set('categories', $this->Complaints->Categories->find('list'));

			$this->set(compact('complaint'));
		}

		public function edit($id = null) {
			$complaint = $this->Complaints->get($id);
			if($this->request->is(['post', 'patch', 'put'])) {
				$complaint = $this->Complaints->patchEntity($complaint, $this->request->data);
				if($this->Complaints->save($complaint) && !$complaint->errors()) {
					$this->setSuccessMessage(__('Complaint modified successfully!'));
					return $this->toIndex();
				}
			}
			$this->set('categories', $this->Complaints->Categories->find('list'));
			$this->set(compact('complaint'));
		}

		public function delete($id = null) {
			if($this->Complaints->delete($this->Complaints->get($id)))
				$this->setSuccessMessage(__('Complaint removed successfully!'));
			else
				$this->setErrorMessage($this->defaultError);
			
            return $this->toIndex();
		}

		public function isAuthorized($user) {
			if($this->request->action === 'add')
				return true;

			if(in_array($this->request->action, ['edit', 'delete'])) {
				$id = $this->request->params['pass'][0];
				if($this->Complaints->isOwnedBy($id, $this->Auth->user('id')))
					return true;
			}

			$this->setErrorMessage(__('You have no permission for such operation'));
			return false;
		}
	}