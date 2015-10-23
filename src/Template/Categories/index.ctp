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
                        <?php if($userSession['id'] == $category->user->id): ?>
                            <span class="dropdown"></span>
                            <span class="options">
                                <ul>
                                    <li><?= $this->Html->link('Edit', ['controller' => 'Categories', 'action' => 'edit', $category->id]) ?></li>
                                    <li><?= $this->Html->link('Delete', ['controller' => 'Categories', 'action' => 'delete', $category->id]) ?></li>
                                </ul>
                            </span>
                        <?php endif; ?>
                        <?= $this->Html->link($category->name, ['controller' => 'Categories', 'action' => 'view', $category->id]) ?>
                        <footer>Created in: <?= $category->dateCreated->format('d/m/Y H:i') ?> by <?= $this->Html->link($category->user->name, ['controller' => 'Users', 'action' => 'view', $category->user->id])  ?></footer>
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