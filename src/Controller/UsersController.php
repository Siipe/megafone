<?php
    namespace App\Controller;

    class UsersController extends AppController {
        public function initialize() {
            parent::initialize();
        }

        public function add() {
            $user = $this->Users->newEntity();
            if($this->request->is('post')) {
                return $this->save($user);
            }
            $this->set(compact('user'));
        }

        public function save($entity) {
            $entity = $this->Users->patchEntity($entity, $this->request->data);
            if($this->Users->save($entity)) {
                $this->setSuccessMessage('Operation has been done successfully!');
                return $this->toIndex();
            } else
                $this->setErrorMessage('An error has occurred');
        }
    }