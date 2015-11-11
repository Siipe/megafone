<?php if($userSession && $entity->user && $userSession['id'] == $entity->user->id): ?>
	<div class="button">
		<?= $this->Html->link(__('Edit'), ['controller' => $controller, 'action' => 'edit', $entity->id]) ?>
	</div>
<?php endif; ?>