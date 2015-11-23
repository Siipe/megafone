<?php
	namespace App\Model\Entity;

	use Cake\ORM\Entity;

	class Comment extends Entity {
		protected $_accessible = [
			'*' => true
		];

		public function _setBody($body) {
			return $this->stripHtml($body, '<strong><i><u><small><del><sub>');
		}

		public function _getCreated() {
			return $this->_properties['dateCreated']->format('d/m/Y H:i');
		}

		private function stripHtml($string, $allowed = null) {
            return strip_tags($string, $allowed).trim();
        }
	}