<?= $this->Form->create($user, ['type' => 'file', 'id' => 'form']) ?>
	<div>
		<label><?= __('Name') ?></label>
		<div class="input-wrapper">
			<?= $this->Form->input('name', ['label' => false, 'required' => false]) ?>
		</div>
	</div>
	<div>
		<label><?= __('Login') ?></label>
		<div class="input-wrapper">
			<?= $this->Form->input('login', ['label' => false, 'required' => false]) ?>
		</div>
	</div>
    <?php if($this->request->action == 'add'): ?>
        <div>
            <label><?= __('Password') ?></label>
            <div class="input-wrapper">
            	<?= $this->Form->input('password', ['label' => false, 'maxlength' => '60',  'required' => false]) ?>
            </div>
        </div>
    <?php endif; ?>
	<div>
		<label><?= __('E-mail') ?></label>
		<div class="input-wrapper">
			<?= $this->Form->input('email', ['label' => false,  'required' => false]) ?>
		</div>
	</div>
	<div class="button">
		<?= $this->Form->button('Send') ?>
	</div>
<?= $this->Form->end() ?>