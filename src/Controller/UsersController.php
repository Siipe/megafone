<?php
    namespace App\Controller;

    use DateTime;

    class UsersController extends AppController {
        public function initialize() {
            parent::initialize();
            $this->set('class', 'user');
        }

        public function index() {
            $users = $this->paginate($this->Users);
            $this->set('users', $users);
        }

        public function add() {
            $user = $this->Users->newEntity();
            if($this->request->is('post')) {
                $user->dateJoined = new DateTime();
                $user->profile = false;
                return $this->save($user);
            }
            $this->set(compact('user'));
        }

        private function save($user) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if($this->Users->save($user)) {
                $this->setSuccessMessage('Operation has been done successfully!');
                return $this->toIndex();
            } else
                $this->setErrorMessage('An error has occurred');
        }
    }