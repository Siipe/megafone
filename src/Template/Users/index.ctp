<?php 
	$this->assign('title', 'View Users')
?>
<article>
	<h1>View Users</h1> 
	<section id="basic-list">
        <ul>
            <?php foreach($users as $user): ?>
                <li>
                    <div class="display-item">
                        <?= $this->Html->image($user->image) ?>
                        <div class="details">
                            <?= $this->Html->link($user->name, ['controller' => 'Users', 'action' => 'view', $user->id]) ?>
                            <footer>Joined in <?= $user->joined ?></footer>
                        </div>
                        <div class="clear"></div>
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