<?php
	$this->assign('title', __('Complaints'));
?>
<article>
	<div>
		<h1><?= __('Complaints') ?></h1>
		<div class="button"><?= $this->Html->link(__('Add a complaint'), ['controller' => 'Complaints', 'action' => 'add']) ?></div>
	</div>
    <ul id="complaints-list">
    	<?php foreach($complaints as $complaint): ?>
            <li>
                <div class="complaint-name">
                    <?= $this->Html->link($complaint->name, ['controller' => 'Complaints', 'action' => 'view', $complaint-> id]) ?>
                </div>
                <div class="user-details">
                    
                    <?= $this->element('complaintOwner', [
                        'complaint' => $complaint
                    ]) ?>

                </div>
                <div class="fulfill-line">
                    <span></span>
                </div>
                <div class="complaint-details">
                    <?= $this->Html->link($complaint->category->name, ['controller' => 'Categories', 'action' => 'view', $complaint->category->id]) ?>
                    <span><?= $complaint->created ?></span>
                </div>
                
                <?= $this->element('optionsEditAndDelete', [
                    'entity' => $complaint,
                    'controller' => 'Complaints' 
                ]) ?>

            </li>
    	<?php endforeach; ?>
    </ul>
	
    <?= $this->element('defaultPaginator') ?>

</article>