<?php
	$this->assign('title', 'View Complaints');
?>
<article>
	<div>
		<h1>View Complaints</h1>
		<div class="button"><?= $this->Html->link(__('Add a complaint'), ['controller' => 'Complaints', 'action' => 'add']) ?></div>
	</div>
	<?php foreach($complaints as $complaint): ?>
		<div><?= $complaint->name ?></div>
		<div><?= $complaint->description ?></div>
		<div><?= $complaint->created ?></div>
		<div><?= $complaint->user->name ?></div>
		<div><?= $complaint->category->name ?></div>
		<hr />
	<?php endforeach; ?>
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