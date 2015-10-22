<?php 
	$this->assign('title', 'View Categories');
?>
<article>
	<h1>View Categories</h1>
	<div class="button">
		<?= $this->Html->link(__('Add a category'), ['controller' => 'Categories', 'action' => 'add']) ?>
	</div>
	<table>
		<tr>
			<td>Name</td>
			<td>Description</td>
			<td>Created in</td>
			<td>Created by</td>
		</tr>
		<?php foreach ($categories as $category): ?>
			<tr>
				<td><?= $category->name ?></td>
				<td><?= $category->description ?></td>
				<td><?= $category->dateCreated->format('d-m-Y H:i:s') ?></td>
				<td><?= $category->user->name ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
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