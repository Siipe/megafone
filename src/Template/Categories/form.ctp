<?= $this->Form->create($category, ['id' => 'form']) ?>
	<div>
		<label><?= __('Name') ?></label>
		<?= $this->Form->input('name', ['label' => false]) ?>
	</div>
	<div>
		<label><?= __('Description') ?></label>
		<?= $this->Form->textarea('description', ['label' => false]) ?>
	</div>
	<div class="button">
		<?= $this->Form->button(__('Send')) ?>
	</div>
<?= $this->Form->end() ?>