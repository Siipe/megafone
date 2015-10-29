<?php
	$this->assign('title', 'View Complaints');
?>
<article>
	<div>
		<h1>View Complaints</h1>
		<div class="button"><?= $this->Html->link(__('Add a complaint'), ['controller' => 'Complaints', 'action' => 'add']) ?></div>
	</div>
    <ul id="view-complaints">
    	<?php foreach($complaints as $complaint): ?>
            <li>
                <div class="container">
            		<div class="complaint-details">
                        <p><?= $complaint->name ?></p>
                    </div>
            		<div class="complaint-user-details">
                        <p><?= $complaint->user->name ?> </p>
                    </div>
                    <div class="fulfill-line">
                        <span></span>
                    </div>
                </div>
                <div class="image">
                    <?= $this->Html->image($complaint->user->image) ?>
                </div>
                <div class="container">
                    <footer class="category"><?= $complaint->category->name ?></footer>
                    <footer class="created"><?= $complaint->created ?></footer>
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