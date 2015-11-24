<?php
	namespace App\Model\Table;

	use Cake\ORM\Table;

	class CommentsTable extends Table {
		public function initialize(array $config) {
			$this->belongsTo('Users');
			$this->belongsTo('Complaints');
			$this->belongsTo('Comments');
			$this->hasMany('Comments', ['foreignKey' => 'comment_id']);
		}

		public function isOwnedBy($id, $user_id) {
			return $this->exists(['id' => $id, 'user_id' => $user_id]);
		}
	}