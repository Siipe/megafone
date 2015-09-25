<?php 
	$this->assign('title', 'View Users')
?>
<article>
	<h1>View Users</h1>
	<section id="user-list">
        <ul>
            <?php foreach($users as $user): ?>
                <li>
                    <div class="display-user">
                        <?= $user->picture ? $this->Html->image('uploads/'.$user->picture) : $this->Html->image('user-default.png') ?>
                        <p><?= $user->name ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
	</section>
</article>