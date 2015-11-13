<?php
    $this->assign('title', $user->name);
?>
<article>
    <h1><?= __('View User') ?></h1>
    <section id="user-view">
        <div class="user-image">
            <?= $this->Html->image($user->image, ['alt' => __("{0}'s image", $user->image)]) ?>
        </div>
        <div class="information">
            <h1><?= __('Basic information') ?></h1>
            <div>
                <label><?= __('Name') ?></label>
                <?= $user->name ?>
            </div>
            <div>
                <label><?= __('E-mail') ?></label>
                <?= $this->element('userEmail') ?>
            </div>
            <div>
                <label><?= __('Joined in') ?></label>
                <?= $user->joined ?>
            </div>
        </div>
        <div class="clear"></div>
    </section>
</article>
<div class="interval"></div>