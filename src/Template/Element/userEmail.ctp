<?php 
	if($userSession)
		echo $user->email;
	else
		echo __('Sign in to see');