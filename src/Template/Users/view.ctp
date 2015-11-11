<?php
    $this->assign('title', $user->name);
?>
<article>
    <h1>View User</h1>
    <section id="user-view">
        <div class="user-image">
            <?= $this->Html->image($user->image) ?>
        </div>
        <div class="information">
            <h1>Basic information</h1>
            <div>
                <label>Name</label>
                <?= $user->name ?>
            </div>
            <?php if($userSession): ?>
                <div>
                    <label>E-mail</label>
                    <?= $user->email ?>
                </div>
            <?php endif; ?>
            <div>
                <label>Joined in</label>
                <?= $user->joined ?>
            </div>
        </div>
        <div class="clear"></div>
    </section>
</article>
<div class="interval"></div>