<?php 
	if($currentUser['picture']) 
		echo $this->Html->image('uploads/'.$currentUser['picture'], ['alt' => __("{0}'s image", $currentUser['name'])]);
	else
		echo $this->Html->image('default/user-default.png', ['alt' => __('Users default image')]); 
?>