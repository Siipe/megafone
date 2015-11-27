<?php
	namespace App\Controller;

	use DateTime;

	class CommentsController extends AppController {
		public function initialize() {
			parent::initialize();
		}

		public function add() {
			if($this->request->is('ajax')) {
				$comment = $this->Comments->newEntity([
						'user_id' => $this->Auth->user('id'),
						'dateCreated' => new DateTime(),
					]);

				$comment = $this->Comments->patchEntity($comment, $this->request->data);
				if($this->Comments->save($comment))
					echo "Saved!";
				else
					echo "Failed";
			}

			$this->autoRender = false;
		}

		public function delete($id = null) {
			if(!$this->Comments->delete($this->Comments->get($id)))
				$this->setErrorMessage($this->defaultError);

			return $this->toPrevious();
		}

		public function isAuthorized($user) {
			if($this->request->action === 'add')
				return true;

			if($this->request->action === 'delete') {
				$id = $this->request->params['pass'][0];
				if($this->Comments->isOwnedBy($id, $this->Auth->user('id')))
					return true;
			}

			$this->setErrorMessage(__('You have no permission for such operation'));
			$this->redirect($this->referer());
			return false;
		} 
	}