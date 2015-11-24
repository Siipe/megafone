<?php 
	$this->assign('title', $complaint->title);
?>
<article>
	<section id="view-complaint">
		<div class="user">
			
			<?= $this->element('complaintOwner') ?>

			<span><?= __('complaint added in {0}', $complaint->created) ?></span>
		</div>
		<div class="complaint-details">
			<div>
				<h1><?= $complaint->title ?></h1>
				
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
    <h1> <?= __('Comments ({0})', count($complaint->comments)) ?></h1>
    <section id="comments">
        
	    <?php 
	    	require "commentForm.ctp";
	    ?>

        <?php if(!$complaint->comments): ?>
        	<p class="no-results"><?= __('Nothing to show') ?></p>
        <?php else: ?>
	        <ul>
		        <?php foreach($complaint->comments as $comment): ?>
		            <li>
		                <?= $this->html->image($comment->user->image, ['alt' => __("{0}'s image", $comment->user->name)]) ?>
		                <div class="comments-details">
		                    <?= $this->Html->link($comment->user->name, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) ?>
		                    <p><?= $comment->body ?></p>
		                    <span class="comment-date"><?= $comment->created ?></span>
		                    
		                    <?= $this->element('commentOptions', [
		                    	'comment' => $comment
		                    ]) ?>

		                </div>
		                <?php foreach($comment->replies as $reply): ?>
		                	<p><?= $reply->body ?></p>
		                	<?= $this->Html->image($reply->user->image) ?>
		                <?php endforeach; ?>
		            </li>
		        <?php endforeach; ?>
	        <ul>
        <?php endif; ?>
    </section>
</article>