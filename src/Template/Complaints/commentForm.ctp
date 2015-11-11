<?php if($userSession): ?>
    <?= $this->Form->create($newComment, ['url' => ['controller' => 'Comments', 'action' => 'add']]) ?>
        <div class="user">
            <?= $userSession['picture'] ? $this->html->image('uploads/'.$userSession['picture']) : $this->html->image('uploads/user-default.png') ?>
            <div class="textarea-wrapper">
                <?= $this->Form->textarea('body', ['label' => false, 'placeholder' => __('Your comment here')]) ?>
                <?= $this->Form->hidden('complaint_id', ['value' => $complaint->id]) ?>
                <div class="comment-button">
                    <?= $this->Form->button(__('Send')) ?>
                </div>
            </div>
        </div>
    <?= $this->Form->end(); ?>
<?php endif; ?>