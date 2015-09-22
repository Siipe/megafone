<section id="panel">
		<?= $this->Html->link(__('Sign in'), ['controller' => 'Users', 'action' => 'login']) ?>
		<?= $this->Html->link(__('Sign up'), ['controller' => 'Users', 'action' => 'add']) ?>
	<!--<?php 
		if($userSession): 
	?>
		<h1>Hello, <?= $userSession['name'] ?></h1>
		<?= $this->Html->link(__('My account'), ['controller' => 'Users', 'action' => 'account']) ?>
		<?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?>
	<?php 
		endif;
		if(!$userSession):
	 ?>
		<?= $this->Html->link(__('Sign in'), ['controller' => 'Users', 'action' => 'login']) ?>
		<?= $this->Html->link(__('Sign up'), ['controller' => 'Users', 'action' => 'add']) ?>
	<?php endif; ?> -->
</section>