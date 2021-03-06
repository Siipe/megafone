<?php
    namespace App\Controller;

    use Cake\Event\Event;
    use DateTime;
    use Cake\Utility\Text;
    use Cake\Datasource\Exception\RecordNotFoundException;

    class UsersController extends AppController {
        public function initialize() {
            parent::initialize();
            $this->loadComponent('Upload');
            $this->loadComponent('Paginator');
            $this->set('class', 'user');
        }

        public function index() {
            $conditions = ['profile' => false];
            if($this->Auth->user())
                $conditions['id <>'] = $this->Auth->user('id');
            $query = $this->Users->find('all')->where($conditions)->order(['dateJoined' => 'desc']);
            $users = $this->paginate($query);
            $this->set('users', $users);
        }

        public function account() {
            $this->set('user', $this->Auth->user());
        }

        public function view($id = null) {
            try {
                $user = $this->Users->get($id);
                $this->set(compact('user'));

            } catch(RecordNotFoundException $e) {
                $this->setErrorMessage(__('The record you requested doesn\'t exist'));
                return $this->toIndex();
            }
        }

        public function updateImage() {
            if($picture = $this->Upload->decodeAndMoveBase64File($this->request->data('cropped-image'))) {
                $this->Upload->deleteFile($this->Auth->user('picture'));
                $this->Users->updateImage($this->Auth->user('id'), $picture);
                $this->updateUserInSession();
                $this->setSuccessMessage(__('Image updated successfully!'));
            }
            else
                $this->setErrorMessage($this->defaultError);

            return $this->toPrevious();
        }

        public function add() {
            $this->checkUserIntention(__('You are already a member'));

            $user = $this->Users->newEntity();
            if($this->request->is('post')) {
                $user->dateJoined = new DateTime();
                $user->profile = false;
                $user->picture = null;
                
                $user = $this->Users->patchEntity($user, $this->request->data);

                if($this->Users->save($user) && !$user->errors()) {
                    $this->setSuccessMessage(__('Congratulations, {0}! This is your first login! Enjoy!', $user->name));
                    $this->Auth->setUser($user->toArray());
                    return $this->redirect(['action' => 'account']);
                }
            }

            $this->set(compact('user'));
        }

        public function edit() {
            $user = $this->Users->get($this->Auth->user('id'));
            if($this->request->is(['post', 'patch', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if($this->Users->save($user) && !$user->errors()) {
                    $this->updateUserInSession($user);
                    $this->setSuccessMessage(__('Your account has been modified successfully!'));
                    return $this->redirect(['action' => 'account']);
                }
            }

            $this->set(compact('user'));
        }

        public function login() {
            $this->checkUserIntention(__('You are already logged in'));

            if($this->request->is('post')) {
                $user = $this->Auth->identify();
                if($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->setErrorMessage(__('Login failed. Check your credentials and try again'));
            }
        }

        public function logout() {
            $this->Auth->logout();
            $this->setWarningMessage(__('You are now logged out'));
            return $this->toHome();
        }

        public function beforeFilter(Event $event) {
            $this->Auth->allow('add');
        }

        private function updateUserInSession($user = null) {
            if(!$user)
               $user = $this->Users->get($this->Auth->user('id'));

            $this->Auth->setUser($user->toArray());
        }

        private function checkUserIntention($message) {
            if($this->Auth->user()) {
                $this->setWarningMessage($message);
                return $this->toPrevious();
            }
        }
    }