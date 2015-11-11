<?php 
	$this->assign('title', $complaint->name);
?>
<article>
	<section id="view-complaint">
		<div class="user">
			<?php if($complaint->user): ?>
				<?= $this->Html->image($complaint->user->image, [
					'alt' => $complaint->user->name.'\'s image',
					'url' => ['controller' => 'Users', 'action' => 'view', $complaint->user->id]
					]) 
				?>
				<?= $this->Html->link($complaint->user->name, ['controller' => 'Users', 'action' => 'view', $complaint->user->id]) ?>
			<?php else: ?>
				<?= $this->Html->image('uploads/user-default.png', ['alt' => 'Anonymous']) ?>
				<h2>Anonymous</h2>
			<?php endif ?>
			<span>complaint added in <?= $complaint->created ?></span>
		</div>
		<div class="complaint-details">
			<div>
				<h1><?= $complaint->name ?></h1>
				<?php if($userSession && $complaint->user && $userSession['id'] == $complaint->user->id): ?>
					<div class="button">
						<?= $this->Html->link(__('Edit'), ['controller' => 'Complaints', 'action' => 'edit', $complaint->id]) ?>
					</div>
				<?php endif; ?>
			</div>
			<p><?= $complaint->description ?></p>
			<footer>
				Category: <?= $this->Html->link($complaint->category->name, ['controller' => 'Categories', 'action' => 'view', $complaint->category->id]) ?>
				
			</footer>
		</div>
	</section>
</article>
<div class="interval"></div>
<article>
    <h1>Comments (<?= $commentsCount ?>)</h1>
    <section id="comments">
        <?php if($userSession): ?>
            <?= $this->Form->create($newComment, ['url' => ['controller' => 'Comments', 'action' => 'add']]) ?>
                <div class="user">
                    <?= $userSession['picture'] ? $this->html->image('uploads/'.$userSession['picture']) : $this->html->image('uploads/user-default.png') ?>
                    <div class="textarea-wrapper">
                        <?= $this->Form->textarea('body', ['label' => false, 'placeholder' => 'Your comment here']) ?>
                        <?= $this->Form->hidden('complaint_id', ['value' => $complaint->id]) ?>
                        <div class="comment-button">
                            <?= $this->Form->button(__('Send')) ?>
                        </div>
                    </div>
                </div>
            <?= $this->Form->end(); ?>
        <?php endif; ?>
        <ul>
        	<?php if($comments->isEmpty()): ?>
        		<p class="no-comments">Nothing to show</p>
        	<?php endif; ?>
	        <?php foreach($comments as $comment): ?>
	            <li>
	                <?= $this->html->image('uploads/'.$comment->user->picture) ?>
	                <div class="comments-details">
	                    <?= $this->Html->link($comment->user->name, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) ?>
	                    <p><?= $comment->body ?></p>
	                    <span class="comment-date"><?= $comment->created ?></span>
	                    <?php if($userSession): ?>
	                        <span class="manager"></span>
	                        <span class="options">
	                            <ul>
	                            	<li><?= $this->Html->link(__('Reply'), ['controller' => 'Comments', 'action' => 'reply', $comment->id]) ?></li>
	                            	<?php if($userSession['id'] !== $comment->user->id): ?>
	                            		<li><?= $this->Html->link(__('Report'), ['controller' => 'Comments', 'action' => 'report', $comment->id]) ?></li>
	                            	<?php else: ?>
	                            		<li><?= $this->Html->link(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comment->id]) ?></li>
	                            	<?php endif; ?>
	                            </ul>
	                        </span>
                        <?php endif; ?>
	                </div>
	            </li>
	        <?php endforeach; ?>
        <ul>
    </section>
</article>