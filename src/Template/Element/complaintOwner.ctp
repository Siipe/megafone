<?php 
	if($complaint->user) {
    	echo $this->Html->image($complaint->user->image, ['alt' => $complaint->user->name.__('\'s image')]);
    	echo $this->Html->link($complaint->user->name, ['controller' => 'Users', 'action' => 'view', $complaint->user->id]);
    } else {
    	echo $this->Html->image('uploads/user-default.png');
    	echo '<h2>'.__('Anonymous').'</h2>';
    }
 ?>