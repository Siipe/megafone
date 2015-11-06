<?php
	namespace App\Model\Table;

	use Cake\ORM\Table;

	class ComplaintsTable extends Table {
		public function initialize(array $config) {
			$this->belongsTo('Categories');
			$this->belongsTo('Users');
		}

		public function isOwnedBy($id, $user_id) {
            return $this->exists(['id' => $id, 'user_id' => $user_id]);
        }
	}