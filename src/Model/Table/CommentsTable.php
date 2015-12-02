<?php
	namespace App\Model\Table;

	use Cake\ORM\Table;

    class CommentsTable extends Table {
		public function initialize(array $config) {
			$this->belongsTo('Users');
			$this->belongsTo('Complaints');
			$this->belongsTo('ParentComments', [
					'className' => 'Comments'
				]);
			$this->hasMany('Replies', [
				'className' => 'Comments',
				'foreignKey' => 'comment_id',
				'dependent' => true
				]);

            /*$this->addBehavior('CounterCache', [
                'Complaints' => [
                    'comment_count' => [
                        'conditions' => ['Comments.comment_id IS' => null]
                    ]
                ]
            ]);*/
		}

		public function isOwnedBy($id, $user_id) {
			return $this->exists(['id' => $id, 'user_id' => $user_id]);
		}
	}