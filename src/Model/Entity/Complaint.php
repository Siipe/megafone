<?php
	namespace App\Model\Entity;

	use Cake\ORM\Entity;

	class Complaint extends Entity {
		protected $_accessible = [
			'*' => true
		];

		public function _getCreated() {
			return $this->_properties['dateCreated']->format('d/m/Y H:i');
		}
	}