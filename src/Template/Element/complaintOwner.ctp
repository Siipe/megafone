<?php 
	if($complaint->user) {
    	echo $this->Html->image($complaint->user->image, ['alt' => __("{0}'s image", $complaint->user->name)]);
    	echo $this->Html->link($complaint->user->name, ['controller' => 'Users', 'action' => 'view', $complaint->user->id]);
    } else {
    	echo $this->Html->image('default/anonymous.png', ['alt' => __('Image for anonymous')]);
    	echo '<h2>'.__('Anonymous').'</h2>';
    }
 ?>