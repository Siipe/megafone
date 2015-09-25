<?php
    $this->assign('title', $user->name);
?>
<article>
    <h1>Editing <?= $user->name ?></h1>
    <?php
        require 'form.ctp';
    ?>
</article>