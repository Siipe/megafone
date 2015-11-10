<?php
	namespace App\Model\Table;

	use Cake\ORM\Table;

	class CommentsTable extends Table {
		public function initialize(array $config) {
			$this->belongsTo('Users');
			$this->belongsTo('Complaints');
		}

		public function isOwnedBy($id, $user_id) {
			return $this->exists(['id' => $id, 'user_id' => $user_id]);
		}
	}