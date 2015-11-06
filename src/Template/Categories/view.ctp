<?php
    $this->assign('title', $category->name);
?>
<article>
	<div>
		<h1><?= $category->name ?></h1>
		<?php if($userSession && $userSession['id'] == $category->user->id): ?>
			<div class="button">
				<?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $category->id]) ?>
			</div>
		<?php endif; ?>
	</div>
    <footer>Created in <?= $category->created ?> by <?= $this->Html->link($category->user->name, ['controller' => 'Users', 'action' => 'view', $category->user->id]) ?></footer>
    <p><?= $category->description ?></p>
</article>
<div class="interval"></div>
<article>
    <h1>Related Complaints</h1>
    <ul id="complaints-list">
    	<?php foreach($complaints as $complaint): ?>
            <li>
                <div class="complaint-name">
                    <?= $this->Html->link($complaint->name, ['controller' => 'Complaints', 'action' => 'view', $complaint-> id]) ?>
                </div>
                <div class="user-details">
                    <?php if($complaint->user): ?>
                        <?= $this->Html->image($complaint->user->image, [
                            'alt' => $complaint->user->name.'\'s image',
                            ]) 
                        ?>
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
                    <span><?= $complaint->created ?></span>
                </div>
                <?php if($userSession && $complaint->user && $userSession['id'] == $complaint->user->id): ?>
                    <div class="manager-container">
                        <span class="manager"></span>
                        <span class="options">
                            <ul>
                                <li><?= $this->Html->link('Edit', ['controller' => 'Complaints', 'action' => 'edit', $complaint->id]) ?></li>
                                <li><?= $this->Html->link('Delete', ['controller' => 'Complaints', 'action' => 'delete', $complaint->id]) ?></li>
                            </ul>
                        </span>
                    </div>
                <?php endif; ?>
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