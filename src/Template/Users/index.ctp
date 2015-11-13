<?php 
	$this->assign('title', __('Users'));
?>
<article>
	<h1><?= __('Users') ?></h1> 
	<section id="basic-list">
        <ul>
            <?php foreach($users as $user): ?>
                <li>
                    <div class="display-item">
                        <?= $this->Html->image($user->image, ['alt' => __("{0}'s image", $user->image)]) ?>
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