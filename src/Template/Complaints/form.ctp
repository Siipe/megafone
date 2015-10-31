<?= $this->Form->create($complaint, ['id' => 'form']) ?>
	<div>
		<label>Name</label>
		<?= $this->Form->input('name', ['label' => false]) ?>
	</div>
	<div>
		<label>Category</label>
		<?= $this->Form->select('category_id', $categories, ['label' => false]) ?>
	</div>
	<div>
		<label>Description</label>
		<?= $this->Form->textarea('description', ['label' => false]) ?>
	</div>
	<?php if($this->request->action === 'add'): ?>
		<div>
			<label>Anonymous?</label>
			<?= $this->Form->checkbox('anonymous', ['label' => false, 'hiddenField' => false, 'value' => true]) ?>
		</div>
	<?php endif; ?>
	<div class="button">
		<?= $this->Form->button(__('Send')) ?>
	</div>
<?= $this->Form->end() ?>