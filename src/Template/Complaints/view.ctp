<?php 
	$this->assign('title', $complaint->name);
?>
<article>
	<section id="view-complaint">
		<div class="user">
			
			<?= $this->element('complaintOwner') ?>

			<span><?= __('complaint added in {0}', $complaint->created) ?></span>
		</div>
		<div class="complaint-details">
			<div>
				<h1><?= $complaint->name ?></h1>
				
				<?= $this->element('editButton', [
					'entity' => $complaint,
					'controller' => 'Complaints'
				]) ?>

			</div>
			<p><?= $complaint->description ?></p>
			<footer>
				<?= __('Category: {0}', $this->Html->link($complaint->category->name, ['controller' => 'Categories', 'action' => 'view', $complaint->category->id])) ?>
			</footer>
		</div>
	</section>
</article>
<div class="interval"></div>
<article>
    <h1> <?= __('Comments ({0})', $commentsCount) ?></h1>
    <section id="comments">
        
	    <?php 
	    	require "commentForm.ctp";
	    ?>

        <ul>
        	<?php if($comments->isEmpty()): ?>
        		<p class="no-comments"><?= __('Nothing to show') ?></p>
        	<?php endif; ?>
	        <?php foreach($comments as $comment): ?>
	            <li>
	                <?= $this->html->image('uploads/'.$comment->user->image) ?>
	                <div class="comments-details">
	                    <?= $this->Html->link($comment->user->name, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) ?>
	                    <p><?= $comment->body ?></p>
	                    <span class="comment-date"><?= $comment->created ?></span>
	                    
	                    <?= $this->element('commentOptions', [
	                    	'comment' => $comment
	                    ]) ?>

	                </div>
	            </li>
	        <?php endforeach; ?>
        <ul>
    </section>
</article>