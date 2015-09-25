<?php
    $this->assign('title', 'Authentication');
?>
<article>
    <h1>Authentication</h1>
    <?= $this->Form->create(null, ['id' => 'form']) ?>
        <div>
            <label>Login</label>
            <?= $this->Form->input('login', ['label' => false]) ?>
        </div>
    <div>
        <label>Password</label>
        <?= $this->Form->input('password', ['label' => false]) ?>
    </div>
    <div class="button">
        <?= $this->Form->button(__('Send')) ?>
    </div>
    <?= $this->Form->end() ?>
</article>