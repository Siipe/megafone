<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;

    class UsersTable extends Table {
        public function initialize(array $config) {
        	$this->hasMany('Categories');
        }

        public function updateImage($id, $picture) {
            $query = $this->query();
            $query->update()->set(['picture' => $picture])->where(['id' => $id])->execute();
        }
    }