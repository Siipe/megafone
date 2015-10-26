<?php
	namespace App\Model\Table;

	use Cake\ORM\Table;

	class ComplaintsTable extends Table {
		public function initialize(array $config) {
			$this->belongsTo('Categories');
			$this->belongsTo('Users');
		}
	}