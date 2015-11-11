<?php
	namespace App\View\Cell;

	use Cake\View\Cell;

	class UsersCell extends Cell {
		public function display() {
			$this->set('userLogged', $this->request->session()->read('Auth.User'));
		}
	}