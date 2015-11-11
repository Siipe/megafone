<?= $this->Form->create($complaint, ['id' => 'form']) ?>
	<div>
		<label><?= __('Name') ?></label>
		<?= $this->Form->input('name', ['label' => false]) ?>
	</div>
	<div>
		<label><?= __('Category') ?></label>
		<?= $this->Form->select('category_id', $categories, ['label' => false]) ?>
	</div>
	<div>
		<label><?= __('Description') ?></label>
		<?= $this->Form->textarea('description', ['label' => false]) ?>
	</div>
	<?php if($this->request->action === 'add'): ?>
		<div>
			<label><?= __('Anonymous?') ?></label>
			<?= $this->Form->checkbox('anonymous', ['label' => false, 'hiddenField' => false, 'value' => true]) ?>
		</div>
	<?php endif; ?>
	<div class="button">
		<?= $this->Form->button(__('Send')) ?>
	</div>
<?= $this->Form->end() ?>