<?php if($userSession && $entity->user && $userSession['id'] == $entity->user->id): ?>
	<div class="manager-container">
	    <span class="manager"></span>
	    <span class="options">
	        <ul>
	            <li><?= $this->Html->link(__('Edit'), ['controller' => $controller, 'action' => 'edit', $entity->id]) ?></li>
	            <li><?= $this->Html->link(__('Delete'), ['controller' => $controller, 'action' => 'delete', $entity->id]) ?></li>
	        </ul>
	    </span>
    </div>
<?php endif; ?>