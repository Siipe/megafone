<?php
$this->assign('title', $user['name']);
?>
<article>
    <h1><?= __('My account') ?></h1>
    <?php
        require_once('image-form.ctp')
    ?>
    <section id="user-view">
        <div class="user-image">
            
            <?= $this->element('userSessionPicture', [
                'currentUser' => $user
            ]) ?>

            <p><?= $this->Html->link(__('Update image'), 'javascript:void(0)', ['id' => 'update-image']) ?></p>
        </div>
        <div class="information">
            <h1><?= __('Basic information') ?></h1>
            <div>
                <label><?= __('Name') ?></label>
                <?= $user['name'] ?>
            </div>
            <div>
                <label><?= __('Login') ?></label>
                <?= $user['login'] ?>
            </div>
            <div>
                <label><?= __('E-mail') ?></label>
                <?= $user['email'] ?>
            </div>
            <div>
                <label><?= __('Joined in') ?></label>
                <?= $user['dateJoined']->format('d/m/Y H:i') ?>
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <div class="button">
        <?= $this->Html->link(__('Edit basic information'), ['action' => 'edit']) ?>
    </div>
</article>
<div class="interval"></div>
<?= $this->Html->script('cropper') ?>