<?= $this->Form->create($user, ['type' => 'file', 'id' => 'form']) ?>
	<div>
		<label><?= __('Name') ?></label>
		<?= $this->Form->input('name', ['label' => false]) ?>
	</div>
	<div>
		<label><?= __('Login') ?></label>
		<?= $this->Form->input('login', ['label' => false]) ?>
	</div>
    <?php if($this->request->action == 'add'): ?>
        <div>
            <label><?= __('Password') ?></label>
            <?= $this->Form->input('password', ['label' => false]) ?>
        </div>
    <?php endif; ?>
	<div>
		<label><?= __('E-mail') ?></label>
		<?= $this->Form->input('email', ['label' => false]) ?>
	</div>
	<div class="button">
		<?= $this->Form->button('Send') ?>
	</div>
<?= $this->Form->end() ?>