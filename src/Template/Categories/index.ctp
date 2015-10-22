<?php 
	$this->assign('title', 'View Categories');
?>
<article>
	<h1>View Categories</h1>
	<div class="button">
		<?= $this->Html->link(__('Add a category'), ['controller' => 'Categories', 'action' => 'add']) ?>
	</div>
    <section id="basic-list">
        <ul>
            <?php foreach ($categories as $category): ?>
                <li>
                    <div class="display-item">
                        <span class="dropdown">V</span>
                        <span class="options">
                            <ul>
                                <li><a href="#">View</a></li>
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </span>
                        <?= $this->Html->link($category->name, ['controller' => 'Categories', 'action' => 'view', $category->id]) ?>
                        <footer>Created in: <?= $category->dateCreated->format('d/m/Y H:i:s') ?></footer>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
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