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
                            'rule' => ['minLength', 5],
                            'message' => __('Your {0} must have at least {1} digits', __('Name'), 5)
                        ])
                        ->add('login', 'length', [
                            'rule' => ['minLength', 4],
                            'message' => __('Your {0} must have at least {1} digits', __('Login'), 4)
                        ])
                        ->add('password', 'length', [
                            'rule' => ['minLength', 8],
                            'message' => __('Your {0} must have at least {1} digits', __('Password'), 8)
                        ])
                        ->add('email', 'email', [
                            'rule' => 'email',
                            'message' => __('Please enter a valid E-mail')
                        ]);
        }

        public function buildRules(RulesChecker $rules) {
            return $rules
                        ->add($rules->isUnique(['login']), 'uniqueLogin', ['message' => 'This field is not allowed.'])
                        ->add($rules->isUnique(['email']));
        }
    }