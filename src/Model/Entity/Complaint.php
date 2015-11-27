<?php
	namespace App\Model\Entity;

	use Cake\ORM\Entity;

	class Complaint extends Entity {
		protected $_accessible = [
			'*' => true
		];

		public function _setTitle($title) {
			return $this->stripHtml($title);
		}

		public function _setDescription($description) {
			return $this->stripHtml($description);
		}

		public function _getCreated() {
			return $this->_properties['dateCreated']->format('d/m/Y H:i');
		}

		private function stripHtml($string, $allowed = null) {
            return trim(strip_tags($string, $allowed));
        }
	}