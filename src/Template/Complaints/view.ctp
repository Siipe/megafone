<?php 
	$this->assign('title', $complaint->name);
?>
<article>
	<section id="view-complaint">
		<div>
			<?php 
				if($complaint->user)
					echo $this->Html->image($complaint->user->image, [
						'alt' => $complaint->user->name.'\'s image',
						'url' => ['controller' => 'Users', 'action' => 'view', $complaint->user->id]
						]);
				else
					echo $this->Html->image('uploads/user-default.png', ['alt' => 'Anonymous']);
			?>
		</div>
		<div class="complaint-details">
			<h1><?= $complaint->name ?></h1>
			<p><?= $complaint->description ?></p>
			<footer>
				Category: <?= $this->Html->link($complaint->category->name, ['controller' => 'Categories', 'action' => 'view', $complaint->category->id]) ?>
				<span class="date">added in <?= $complaint->created ?></span>
			</footer>
		</div>
	</section>
</article>
<div class="interval"></div>
<article>
	<h1>Comments</h1>
	<footer>Comming soon... :)</footer>
</article>