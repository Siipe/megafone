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
                'limit' => 9,
				'contain' => 'Users',
				'order' => ['dateCreated' => 'desc']
			];
			$this->set('categories', $this->paginate($this->Categories));
		}

        public function view($id = null) {
            $this->paginate = [
                'limit' => 5,
                'contain' => 'Users',
                'order' => ['dateCreated' => 'desc']
            ];

            $complaints = $this->Categories->Complaints->findByCategoryId($id);
            $response = [
                'category' => $this->Categories->get($id, ['contain' => 'Users']),
                'complaints' => $this->paginate($complaints),
                'complaintsCount' => $complaints->count()

            ];
            
            $this->set($response);
        }

		public function add() {
			$category = $this->Categories->newEntity([
                    'user_id' => $this->Auth->user('id')
                ]);
			if($this->request->is('post')) {
				$category = $this->Categories->patchEntity($category, $this->request->data);
				$category->dateCreated = new DateTime();
				if($category = $this->Categories->save($category)) {
					$this->setSuccessMessage(__('Category "{0}" added successfully!', $category->name));
					return $this->toIndex();
				}
				$this->setErrorMessage(__('An error has occurred'));
			}
			$this->set(compact('category'));
		}

        public function edit($id = null) {
            $category = $this->Categories->get($id);
            if($this->request->is(['post', 'patch', 'put'])) {
                $category = $this->Categories->patchEntity($category, $this->request->data);
                if($category = $this->Categories->save($category)) {
                    $this->setSuccessMessage(__('Category "{0}" modified successfully!', $category->name));
                    return $this->toIndex();
                }
                $this->setErrorMessage(__('An error has occurred'));
            }
            $this->set(compact('category'));
        }

        public function delete($id = null) {
            if($this->Categories->delete($this->Categories->get($id)))
                $this->setSuccessMessage(__('Category removed successfully!'));
            else
                $this->setErrorMessage(__('An error has occurred'));

            return $this->toIndex();
        }

        public function isAuthorized($user) {
            if($this->request->action === 'add')
                return true;

            if(in_array($this->request->action, ['edit', 'delete'])) {
                $id = $this->request->params['pass'][0];
                if($this->Categories->isOwnedBy($id, $this->Auth->user('id')))
                    return true;
            }

            $this->setErrorMessage(__('You have no permission for such operation'));
            return false;
        }
	}