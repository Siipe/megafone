<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;
    use Cake\Validation\Validator;
    use Cake\ORM\RulesChecker;

    class UsersTable extends Table {
        public function initialize(array $config) {
        	$this->hasMany('Categories');
            $this->hasMany('Comments');
        }

        public function updateImage($id, $picture) {
            $this->query()->update()->set(['picture' => $picture])->where(['id' => $id])->execute();
        }

        public function validationDefault(Validator $validator) {
            return $validator
                        ->add('name', 'length', [
                            'rule' => ['lengthBetween', 5, 80],
                            'message' => __('The {0} must contain between {1} and {2} digits', __('Name'), 5, 80)
                        ])
                        ->add('login', 'length', [
                            'rule' => ['lengthBetween', 4, 20],
                            'message' => __('The {0} must contain between {1} and {2} digits', __('Login'), 4, 20)
                        ])
                        ->add('password', 'length', [
                            'rule' => ['lengthBetween', 8, 60],
                            'message' => __('The {0} must contain between {1} and {2} digits', __('Password'), 8, 60)
                        ])
                        ->add('email', 'email', [
                            'rule' => 'email',
                            'message' => __('Please enter a valid E-mail')
                        ]);
        }

        public function buildRules(RulesChecker $rules) {
            return $rules
                        ->add($rules->isUnique(['login']))
                        ->add($rules->isUnique(['email']));
        }
    }