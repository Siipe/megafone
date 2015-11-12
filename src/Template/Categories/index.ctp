<?php 
	$this->assign('title', __('Categories'));
?>
<article>
    <div>
        <h1><?= __('Categories') ?></h1>
        <div class="button">
            <?= $this->Html->link(__('Add a category'), ['controller' => 'Categories', 'action' => 'add']) ?>
        </div>
    </div>
    <section id="basic-list">
        <ul>
            <?php foreach ($categories as $category): ?>
                <li>
                    <div class="display-item">
                        
                        <?= $this->element('optionsEditAndDelete', [
                            'entity' => $category,
                            'controller' => 'Categories' 
                        ]) ?>
                        
                        <?= $this->Html->link($category->name, ['controller' => 'Categories', 'action' => 'view', $category->id]) ?>
                        <footer><?= __('Created in: {0}', $category->created) ?></footer>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
	
    <?= $this->element('defaultPaginator') ?>

</article>