<?= $this->Form->create($category, ['id' => 'form']) ?>
	<div>
		<label><?= __('Name') ?></label>
		<div class="input-wrapper">
			<?= $this->Form->input('name', ['label' => false,  'required' => false]) ?>
		</div>
	</div>
	<div>
		<label><?= __('Description') ?></label>
		<div class="input-wrapper">
			<?= $this->Form->textarea('description', ['label' => false, 'maxlength' => '2000',  'required' => false]) ?>
		</div>
	</div>
	<div class="button">
		<?= $this->Form->button(__('Send')) ?>
	</div>
<?= $this->Form->end() ?>