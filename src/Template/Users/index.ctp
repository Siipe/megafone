<?php 
	$this->assign('title', __('View Users'));
?>
<article>
	<h1><?= __('View Users') ?></h1> 
	<section id="basic-list">
        <ul>
            <?php foreach($users as $user): ?>
                <li>
                    <div class="display-item">
                        <?= $this->Html->image($user->image) ?>
                        <div class="details">
                            <?= $this->Html->link($user->name, ['controller' => 'Users', 'action' => 'view', $user->id]) ?>
                            <footer><?= __('Joined in {0}', $user->joined) ?></footer>
                        </div>
                        <div class="clear"></div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
	</section>
    
    <?= $this->element('defaultPaginator') ?>

</article>