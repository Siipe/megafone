<?php
	namespace App\Model\Entity;

	use Cake\ORM\Entity;

	class Comment extends Entity {
		protected $_accessible = [
			'*' => true
		];

		public function _setBody($body) {
			return $this->stripHtml($body);
		}

		public function _getCreated() {
			return $this->_properties['dateCreated']->format('d/m/Y H:i');
		}

		public function _getAnswerable() {
			return $this->_properties['comment_id'] == null;
		}

		private function stripHtml($string, $allowed = null) {
            return trim(strip_tags($string, $allowed));
        }
	}