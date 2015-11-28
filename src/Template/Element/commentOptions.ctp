<?php if($userSession): ?>
    <span class="comment-options">
        <ul>
            <?php 
                if($comment->answerable)
                    echo "<li>".$this->Html->link(__('Reply'), 'javascript:void(0)', [
                        'onclick' => "reply(this, $comment->id)"
                    ])."</li>";
                
                if($userSession['id'] == $comment->user->id)
                    echo "<li>".$this->Html->link(__('Delete'), 'javascript:void(0)', [
                        'data-url' => $this->Url->build([
                            'controller' => 'Comments',
                            'action' => 'delete'
                        ], true),
                        'data-id' => $comment->id,
                        'onclick' => 'deleteComment(this)'
                    ])."</li>";
            ?>
        </ul>
    </span>
<?php endif; ?>