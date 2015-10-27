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
		<label>Name</label>
		<?= $this->Form->textarea('description', ['label' => false]) ?>
	</div>
	<div class="button">
		<?= $this->Form->button(__('Send')) ?>
	</div>
<?= $this->Form->end() ?>