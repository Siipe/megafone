<?= $this->Form->create($user, ['type' => 'file', 'id' => 'form']) ?>
	<div>
		<label>Name</label>
		<?= $this->Form->input('name', ['label' => false]) ?>
	</div>
	<div>
		<label>Login</label>
		<?= $this->Form->input('login', ['label' => false]) ?>
	</div>
	<div>
		<label>Password</label>
		<?= $this->Form->input('password', ['label' => false]) ?>
	</div>
	<div>
		<label>Confirm password</label>
		<?= $this->Form->input('confirmPassword', ['label' => false, 'type' => 'password']) ?>
	</div>
	<div>
		<label>E-mail</label>
		<?= $this->Form->input('email', ['label' => false]) ?>
	</div>
	<div>
		<label>Picture</label>
		<?= $this->Form->input('upload', ['label' => false, 'type' => 'file']) ?>
	</div>
	<div class="button">
		<?= $this->Form->button('Send') ?>
	</div>
<?= $this->Form->end() ?>