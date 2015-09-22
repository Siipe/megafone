<?php
    namespace App\Model\Entity;

    use Cake\ORM\Entity;
    use Cake\Auth\DefaultPasswordHasher;

    class User extends Entity {
        public $_accessible = [
            '*' => true
        ];

        public function _setPassword($password) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($password);
        }
    }