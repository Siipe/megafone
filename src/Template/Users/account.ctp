<?php
$this->assign('title', $user['name']);
?>
<article>
    <h1>My account</h1>
    <?php
        require_once('image-form.ctp')
    ?>
    <section id="user-view">
        <div class="user-image">
            <?= $user['picture'] ? $this->Html->image('uploads/'.$user['picture']) : $this->Html->image('uploads/user-default.png')?>
            <p><a href="#" id="update-image">Update image</a></p>
        </div>
        <div class="information">
            <h1>Basic information</h1>
            <div>
                <label>Name</label>
                <?= $user['name'] ?>
            </div>
            <div>
                <label>Login</label>
                <?= $user['login'] ?>
            </div>
            <div>
                <label>E-mail</label>
                <?= $user['email'] ?>
            </div>
            <div>
                <label>Joined in</label>
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