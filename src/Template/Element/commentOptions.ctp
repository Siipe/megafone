<?php if($userSession): ?>
    <span class="manager"></span>
    <span class="options">
        <ul>
        	<li><?= $this->Html->link(__('Reply'), ['controller' => 'Comments', 'action' => 'reply', $comment->id]) ?></li>
        	<?php if($userSession['id'] !== $comment->user->id): ?>
        		<li><?= $this->Html->link(__('Report'), ['controller' => 'Comments', 'action' => 'report', $comment->id]) ?></li>
        	<?php else: ?>
        		<li><?= $this->Html->link(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comment->id]) ?></li>
        	<?php endif; ?>
        </ul>
    </span>
<?php endif; ?>