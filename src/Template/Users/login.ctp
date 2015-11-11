<?php
    $this->assign('title', __('Authentication'));
?>
<article>
    <h1><?= __('Authentication') ?></h1>
    <?= $this->Form->create(null, ['id' => 'form']) ?>
        <div>
            <label><?= __('Login') ?></label>
            <?= $this->Form->input('login', ['label' => false]) ?>
        </div>
    <div>
        <label><?= __('Password') ?></label>
        <?= $this->Form->input('password', ['label' => false]) ?>
    </div>
    <div class="button">
        <?= $this->Form->button(__('Send')) ?>
    </div>
    <?= $this->Form->end() ?>
</article>