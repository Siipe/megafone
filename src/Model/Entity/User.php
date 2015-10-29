<?php
    namespace App\Model\Entity;

    use Cake\ORM\Entity;
    use Cake\Auth\DefaultPasswordHasher;

    class User extends Entity {
        protected $_accessible = [
            '*' => true
        ];

        public function _setPassword($password) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($password);
        }

        public function _getJoined() {
            return $this->_properties['dateJoined']->format('d/m/Y H:i');
        }

        public function _getImage() {
            $imagePath = "uploads/";
            $image = $this->_properties['picture'];
            if($image == null) 
                $image = "user-default.png";

            return $imagePath.$image;
        }
    }