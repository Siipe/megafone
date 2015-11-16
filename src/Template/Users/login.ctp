<?php
    $this->assign('title', __('Authentication'));
?>
<article>
    <h1><?= __('Authentication') ?></h1>
    <?= $this->Form->create(null, ['id' => 'form']) ?>
        <div>
            <label><?= __('Login') ?></label>
            <div class="input-wrapper">
                <?= $this->Form->input('login', ['label' => false, 'maxlength' => '20']) ?>
            </div>
        </div>
    <div>
        <label><?= __('Password') ?></label>
        <div class="input-wrapper">
            <?= $this->Form->input('password', ['label' => false, 'maxlength' => '60']) ?>
        </div>
    </div>
    <div class="button">
        <?= $this->Form->button(__('Send')) ?>
    </div>
    <?= $this->Form->end() ?>
</article>