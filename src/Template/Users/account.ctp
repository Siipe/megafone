<?php
$this->assign('title', $user['name']);
?>
<article>
    <h1>My account</h1>
    <section id="user-view">
        <div class="user-image">
            <?= $user['picture'] ? $this->Html->image('uploads/'.$user['picture']) : $this->Html->image('user-default.png')?>
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
                <label>Member since</label>
                <?= $user['dateJoined'] ?>
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <div class="button">
        <?= $this->Html->link(__('Edit information'), ['action' => 'edit']) ?>
    </div>
</article>
<div class="interval"></div>