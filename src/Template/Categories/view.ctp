<?php
    $this->assign('title', $category->name);
?>
<article>
	<div>
		<h1><?= $category->name ?></h1>
		<?php if($userSession && $userSession['id'] == $category->user->id): ?>
			<div class="button">
				<?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $category->id]) ?>
			</div>
		<?php endif; ?>
	</div>
    <footer>Created in <?= $category->created ?> by <?= $this->Html->link($category->user->name, ['controller' => 'Users', 'action' => 'view', $category->user->id]) ?></footer>
    <p><?= $category->description ?></p>
</article>
<div class="interval"></div>
<article>
    <h1>Related Complaints</h1>
    <footer>Coming soon... :)</footer>
</article>