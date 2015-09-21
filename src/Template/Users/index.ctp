<?php 
	$this->assign('title', 'View Users')
?>
<article>
	<h1>View Users</h1>
	<?php foreach($users as $user): ?>
		<div>
			<?= $user->name ?>
		</div>
	<?php endforeach; ?>
</article>