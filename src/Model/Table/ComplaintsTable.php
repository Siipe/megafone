<?php
	namespace App\Model\Table;

	use Cake\ORM\Table;
    use Cake\Validation\Validator;

    class ComplaintsTable extends Table {
		public function initialize(array $config) {
			$this->belongsTo('Categories');
			$this->belongsTo('Users');
			$this->hasMany('Comments', ['dependent' => true]);
		}

		public function isOwnedBy($id, $user_id) {
            return $this->exists(['id' => $id, 'user_id' => $user_id]);
        }

        public function validationDefault(Validator $validator) {
        	return $validator
        				->add('title', 'length', [
        						'rule' => ['lengthBetween', 10, 100],
        						'message' => __('The {0} must contain between {1} and {2} digits', __('Title'), 10, 100)
        					])
        				->add('description', 'length', [
        						'rule' => ['lengthBetween', 10, 2000],
        						'message' => __('The {0} must contain between {1} and {2} digits', __('Description'), 10, 2000)
        					]);
        }
	}