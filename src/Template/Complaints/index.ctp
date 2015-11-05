<?php
	$this->assign('title', 'View Complaints');
?>
<article>
	<div>
		<h1>View Complaints</h1>
		<div class="button"><?= $this->Html->link(__('Add a complaint'), ['controller' => 'Complaints', 'action' => 'add']) ?></div>
	</div>
    <ul id="complaints-list">
    	<?php foreach($complaints as $complaint): ?>
            <li>
                <div class="complaint-name">
                    <?= $this->Html->link($complaint->name, ['controller' => 'Complaints', 'action' => 'view', $complaint-> id]) ?>
                </div>
                <div class="user-details">
                    <?php if($complaint->user): ?>
                        <?= $this->Html->image($complaint->user->image) ?>
                        <?= $this->Html->link($complaint->user->name, ['controller' => 'Users', 'action' => 'view', $complaint->user->id]) ?> 
                    <?php else: ?>
                        <?= $this->Html->image('uploads/user-default.png') ?>
                        <h2>Anonymous</h2>
                    <?php endif; ?>
                </div>
                <div class="fulfill-line">
                    <span></span>
                </div>
                <div class="complaint-details">
                    <?= $this->Html->link($complaint->category->name, ['controller' => 'Categories', 'action' => 'view', $complaint->category->id]) ?>
                    <span><?= $complaint->created ?></span>
                </div>
            </li>
    	<?php endforeach; ?>
    </ul>
	<div class="paginator">
        <ul class="pagination">
            <?php
                echo $this->Paginator->first('<<');
                echo $this->Paginator->prev('<');
                echo $this->Paginator->numbers();
                echo $this->Paginator->next('>');
                echo $this->Paginator->last('>>');
            ?>
        </ul>
        <p class="pagination-info">
            <?php 
                echo $this->Paginator->counter(
                    'Page {{page}} of {{pages}}, showing {{current}} records out of
                    {{count}} total, starting on record {{start}}, ending on {{end}}'
                );
            ?>
        </p>
    </div>
</article>