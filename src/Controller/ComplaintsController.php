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
				'order' => ['dateCreated' => 'desc']
			];

			$this->set('complaints', $this->paginate($this->Complaints));
		}

		public function view($id = null) {
			try {
				$query = $this->Complaints->Comments->findByComplaintId($id)->contain('Users')->where(['level' => 0])->order(['dateCreated' => 'DESC']);
				$response = [
					'complaint' => $this->Complaints->get($id, ['contain' => ['Users', 'Categories']]),
					'comments' => $query,
					'commentsCount' => $query->count()
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
			$complaint = $this->Complaints->newEntity();
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