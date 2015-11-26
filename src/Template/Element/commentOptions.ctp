<?php if($userSession): ?>
    <span class="comment-options">
        <ul>
            <?php 
                if(!$comment->level)
                    echo "<li>".$this->Html->link(__('Reply'), "javascript:void(0)", ['onclick' => 'reply(this)'])."</li>";
                
                if($userSession['id'] == $comment->user->id)
                    echo "<li>".$this->Html->link(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comment->id])."</li>";
            ?>
        </ul>
    </span>
<?php endif; ?>