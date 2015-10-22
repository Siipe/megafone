<?php
    namespace App\Controller;

    use Cake\Event\Event;
    use DateTime;
    use Cake\Utility\Text;

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

        public function updateImage() {
            if($picture = $this->Upload->decodeAndMoveBase64File($this->request->data('cropped-image'))) {
                $this->Upload->deleteFile($this->Auth->user('picture'));
                $query = $this->Users->query();
                $query->update()->set(['picture' => $picture])->where(['id' => $this->Auth->user('id')])->execute();
                $this->updateUserInSession();
                $this->setSuccessMessage('Image updated successfully!');
            }
            else
                $this->setErrorMessage('An error has occurred');

            return $this->toPrevious();
        }

        public function add() {
            $this->checkUserIntention('You are already a member');

            $user = $this->Users->newEntity();
            if($this->request->is('post')) {
                $user->dateJoined = new DateTime();
                $user->profile = false;
                $user->picture = null;
                $user = $this->Users->patchEntity($user, $this->request->data);
                if($newUser = $this->Users->save($user)) {
                    $this->setSuccessMessage("Congratulations, $user->name! This is your first login! Enjoy!");
                    $this->Auth->setUser($newUser->toArray());
                    return $this->redirect(['action' => 'account']);
                } else
                    $this->setErrorMessage('An error has occurred');
            }
            $this->set(compact('user'));
        }

        public function edit() {
            $user = $this->Users->get($this->Auth->user('id'));
            if($this->request->is(['post', 'patch', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if($user = $this->Users->save($user)) {
                    $this->updateUserInSession($user);
                    $this->setSuccessMessage('Your account has been modified successfully!');
                    return $this->redirect(['action' => 'account']);
                } else
                    $this->setErrorMessage('An error has occurred');
            }
            $this->set(compact('user'));
        }

        public function login() {
            $this->checkUserIntention('You are already logged in');

            if($this->request->is('post')) {
                $user = $this->Auth->identify();
                if($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->setErrorMessage('Login failed. Check your credentials and try again');
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