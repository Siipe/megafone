<section id="panel">
	<?php 
		if($userSession) {
			$cssClass = $userSession['profile'] ? 'admin' : 'username';
			echo "<h1 class=$cssClass>".__('Hello, ').$userSession['name']."</h1>".
				$this->Html->link(__('My account'), ['controller' => 'Users', 'action' => 'account']).
				$this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']);
		} else {
			echo $this->Html->link(__('Sign in'), ['controller' => 'Users', 'action' => 'login']).
				$this->Html->link(__('Sign up'), ['controller' => 'Users', 'action' => 'add']);
		}
	?>
</section>