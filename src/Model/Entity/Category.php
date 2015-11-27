<?php
	namespace App\Model\Entity;

	use Cake\ORM\Entity;

	class Category extends Entity {
		protected $_accessible = [
			'*' => true
		];

		public function _setName($name) {
			return $this->stripHtml($name);
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
