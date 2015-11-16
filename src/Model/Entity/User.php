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

        public function _setName($name) {
            return $this->stripHtml($name);
        }

        public function _setLogin($login) {
            return $this->stripHtml($login);
        }

        public function _setEmail($email) {
            return $this->stripHtml($email);
        }

        public function _getJoined() {
            return $this->_properties['dateJoined']->format('d/m/Y H:i');
        }

        public function _getImage() {
            $imagePath = 'uploads/';
            $image = $this->_properties['picture'];
            if(!$image) {
                $imagePath = 'default/';
                $image = 'user-default.png';
            }

            return $imagePath.$image;
        }

        private function stripHtml($string, $allowed = null) {
            return strip_tags($string, $allowed);
        }
    }