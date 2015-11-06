<?php 
	$this->assign('title', $complaint->name);
?>
<article>
	<section id="view-complaint">
		<div class="user">
			<?php if($complaint->user): ?>
				<?= $this->Html->image($complaint->user->image, [
					'alt' => $complaint->user->name.'\'s image',
					'url' => ['controller' => 'Users', 'action' => 'view', $complaint->user->id]
					]) 
				?>
				<?= $this->Html->link($complaint->user->name, ['controller' => 'Users', 'action' => 'view', $complaint->user->id]) ?>
			<?php else: ?>
				<?= $this->Html->image('uploads/user-default.png', ['alt' => 'Anonymous']) ?>
				<h2>Anonymous</h2>
			<?php endif ?>
			<span>complaint added in <?= $complaint->created ?></span>
		</div>
		<div class="complaint-details">
			<div>
				<h1><?= $complaint->name ?></h1>
				<?php if($userSession && $complaint->user && $userSession['id'] == $complaint->user->id): ?>
					<div class="button">
						<?= $this->Html->link(__('Edit'), ['controller' => 'Complaints', 'action' => 'edit', $complaint->id]) ?>
					</div>
				<?php endif; ?>
			</div>
			<p><?= $complaint->description ?></p>
			<footer>
				Category: <?= $this->Html->link($complaint->category->name, ['controller' => 'Categories', 'action' => 'view', $complaint->category->id]) ?>
				
			</footer>
		</div>
	</section>
</article>
<div class="interval"></div>
<article>
	<h1>Comments</h1>
	<footer>Comming soon... :)</footer>
</article>