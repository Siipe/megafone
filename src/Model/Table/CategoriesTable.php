<?php
	namespace App\Model\Table;

	use Cake\ORM\Table;

	class CategoriesTable extends Table {
		public function initialize(array $config) {
			$this->belongsTo('Users');
			$this->hasMany('Complaints');
		}

        public function isOwnedBy($id, $user_id) {
            return $this->exists(['id' => $id, 'user_id' => $user_id]);
        }
	}