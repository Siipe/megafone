<?php
    namespace App\Controller;

    use Cake\Event\Event;
    use DateTime;

    class UsersController extends AppController {
        public function initialize() {
            parent::initialize();
            $this->loadComponent('Upload');
            $this->set('class', 'user');
        }

        public function index() {
            $conditions = ['profile' => false];
            if($this->Auth->user())
                $conditions['id <>'] = $this->Auth->user('id');
            $query = $this->Users->find('all')->where($conditions);
            $users = $this->paginate($query);
            $this->set('users', $users);
        }

        public function account() {
            $user = $this->Auth->user();
            $this->set('user', $user);
        }

        public function view($id = null) {
            $user = $this->Users->get($id);
            $this->set(compact('user'));
        }

        public function add() {
            $this->checkUserIntention('You are already a member');

            $user = $this->Users->newEntity();
            if($this->request->is('post')) {
                $user->dateJoined = new DateTime();
                $user->profile = false;
                $user->picture = $this->Upload->sendFileAndGetName($this->request->data['upload']);
                $user = $this->Users->patchEntity($user, $this->request->data);
                if($user = $this->Users->save($user)) {
                    $this->setSuccessMessage("Congratulations, $user->name! This is your first login! Enjoy!");
                    return $this->login($user);
                } else
                    $this->setErrorMessage('An error has occurred');
            }
            $this->set(compact('user'));
        }

        public function edit() {
            $user = $this->Users->get($this->Auth->user('id'));
            if($this->request->is(['post', 'patch', 'put'])) {
                $user->picture = $this->Upload->sendFileAndGetName($this->request->data['upload'], $user->picture);
                $user = $this->Users->patchEntity($user, $this->request->data);
                if($this->Users->save($user)) {
                    $this->setSuccessMessage('Your account has been modified successfully!');
                    return $this->redirect(['action' => 'account']);
                } else
                    $this->setErrorMessage('An error has occurred');
            }
            $this->set(compact('user'));
        }

        public function login($user = null) {
            $this->checkUserIntention('You are already logged in');

            if($this->request->is('post')) {
                $user = $this->Auth->identify();
                if($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->setErrorMessage('Login failed. Check your credentials and try again');
            } else if($user) {
                $this->Auth->setUser((array) $user);
                return $this->toHome();
            }
        }

        public function logout() {
            $this->Auth->logout();
            $this->setWarningMessage('You are now logged out');
            return $this->toHome();
        }

        public function beforeFilter(Event $event) {
            $this->Auth->allow('add');
        }

        private function checkUserIntention($message) {
            if($this->Auth->user()) {
                $this->setWarningMessage($message);
                return $this->toPrevious();
            }
        }
    }