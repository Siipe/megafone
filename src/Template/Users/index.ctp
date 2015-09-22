<?php 
	$this->assign('title', 'View Users')
?>
<article>
	<h1>View Users</h1>
	<section id="users-grid">
		<?php foreach($users as $user): ?>
			<div>
				<span><?= $user->picture ? $this->Html->image('uploads/'.$user->image) : $this->Html->image('user-default.png') ?></span>
				<?= $user->name ?>
			</div>
		<?php endforeach; ?>
	</section>
</article>