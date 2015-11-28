<?= $this->Form->create($newComment, ['url' => ['controller' => 'Comments', 'action' => 'add'], 'id' => 'reply-form']) ?>
	<div class="reply-wrapper">
		<?= $this->Form->input('complaint_id', ['type' => 'hidden', 'value' => $complaint->id]) ?>
		<?= $this->Form->input('comment_id', ['type' => 'hidden', 'id' => 'comment-id']) ?>
		<?= $this->Form->input('body', ['type' => 'textarea', 'label' => false, 'placeholder' => __('Your reply here')]) ?>
		<div class="reply-buttons">
			<?= $this->Form->button(__('Send'), [
				'type' => 'button',
				'data-url' => $this->Url->build(['controller' => 'Comments', 'action' => 'add'], true),
				'onclick' => 'sendComment(event, this)'
			]) ?>
			<?= $this->Form->button(__('Cancel'), [
				'type' => 'button', 
				'onclick' => 'cancelReply(event)'
			]) ?>
		</div>
	</div>
<?= $this->Form->end() ?>