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
			</div>
			<p><?= $complaint->description ?></p>
			<footer>
				<?= __('Category: {0}', $this->Html->link($complaint->category->name, ['controller' => 'Categories', 'action' => 'view', $complaint->category->id])) ?>
			</footer>
		</div>

		<?= $this->element('editButton', [
			'entity' => $complaint,
			'controller' => 'Complaints'
		]) ?>
				
	</section>
</article>
<div class="interval"></div>
<article>
    <h1> <?= __('Comments ({0})', $complaint->comment_count) ?></h1>
    <section id="comments">
        
	    <?php 
	    	require "commentForm.ctp";
	    ?>

        <?php if(!$complaint->comment_count): ?>
        	<p class="no-results"><?= __('Nothing to show') ?></p>
        <?php else: ?>
	        <ul class="comments">
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

		                    <div class="comment-reply"></div>

		                	<p class="no-replies"><?= __('{0,plural,=0{No replies yet} =1{1 reply} other{# replies}}', count($comment->replies)) ?></p>
			                <?php if($comment->replies): ?>
			                	<ul class="comments">
					                <?php foreach($comment->replies as $reply): ?>
					                	<li>
						                	<?= $this->html->image($reply->user->image, ['alt' => __("{0}'s image", $reply->user->name)]) ?>
							                <div class="comments-details">
							                	<?= $this->Html->link($reply->user->name, ['controller' => 'Users', 'action' => 'view', $reply->user->id]) ?>
							                	<p><?= $reply->body ?></p>
							                	<span class="comment-date"><?= $reply->created ?></span>

							                	<?= $this->element('commentOptions', [
							                    	'comment' => $reply
							                    ]) ?>

							                </div>		
					                	</li>
					                <?php endforeach; ?>
				                </ul>
			            	<?php endif; ?>
		                </div>
		            </li>
		        <?php endforeach; ?>
	        <ul>
        <?php endif; ?>
    </section>
</article>