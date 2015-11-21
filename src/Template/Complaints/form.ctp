<?= $this->Form->create($complaint, ['id' => 'form']) ?>
	<div>
		<label><?= __('Title') ?></label>
		<div class="input-wrapper">
			<?= $this->Form->input('title', ['label' => false,  'required' => false]) ?>
		</div>
	</div>
	<div>
		<label><?= __('Category') ?></label>
		<div class="input-wrapper">
			<?= $this->Form->select('category_id', $categories, ['label' => false]) ?>
		</div>
	</div>
	<div>
		<label><?= __('Description') ?></label>
		<div class="input-wrapper">
			<?= $this->Form->textarea('description', ['label' => false, 'maxlength' => '2000',  'required' => false]) ?>
		</div>
	</div>
	<?php if($this->request->action === 'add'): ?>
		<div>
			<label><?= __('Anonymous?') ?></label>
			<div class="input-wrapper">
				<?= $this->Form->checkbox('anonymous', ['label' => false, 'hiddenField' => false, 'value' => true]) ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="button">
		<?= $this->Form->button(__('Send')) ?>
	</div>
<?= $this->Form->end() ?>