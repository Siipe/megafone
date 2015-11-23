<?php
	namespace App\Model\Table;

	use Cake\ORM\Table;
	use Cake\Validation\Validator;
	use Cake\ORM\RulesChecker;

	class CategoriesTable extends Table {
		public function initialize(array $config) {
			$this->belongsTo('Users');
			$this->hasMany('Complaints');
		}

        public function isOwnedBy($id, $user_id) {
            return $this->exists(['id' => $id, 'user_id' => $user_id]);
        }

        public function validationDefault(Validator $validator) {
        	return $validator
        				->add('name', 'length', [
        						'rule' => ['lengthBetween', 5, 40], 
        						'message' => __('The {0} must contain between {1} and {2} digits', __('Name'), 5, 40)
        					])
        				->add('description', 'length', [
        						'rule' => ['lengthBetween', 10, 2000], 
        						'message' => __('The {0} must contain between {1} and {2} digits', __('Description'), 10, 2000)
        					]);
        }

        public function buildRules(RulesChecker $rules) {
        	return $rules->add($rules->isUnique(['name']));
        }
	}