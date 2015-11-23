<?php if($userSession): ?>
    <?= $this->Form->create($newComment, ['url' => ['controller' => 'Comments', 'action' => 'add'], 'id' => 'commentForm']) ?>
        <div class="user">
            
            <?= $this->element('userSessionPicture', [
                'currentUser' => $userSession
            ]) ?>
            
            <div class="textarea-wrapper">
                <?= $this->Form->input('body', ['type' => 'textarea', 'label' => false, 'placeholder' => __('Your comment here')]) ?>
                <?= $this->Form->hidden('complaint_id', ['value' => $complaint->id]) ?>
                <div class="comment-button">
                    <?= $this->Form->button(__('Send')) ?>
                </div>
            </div>
        </div>
    <?= $this->Form->end(); ?>
<?php endif; ?>