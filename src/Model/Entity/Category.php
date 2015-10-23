<?php
	namespace App\Model\Entity;

	use Cake\ORM\Entity;

	class Category extends Entity {
		protected $_accessible = [
			'*' => true
		];

        protected function _getCreated() {
            return $this->_properties['dateCreated']->format('d/m/Y H:i');
        }
	}
