<?php
    $this->assign('title', $user->name);
?>
<article>
    <h1><?= __('Editing {0}', $user->name) ?></h1>
    <?php
        require 'form.ctp';
    ?>
</article>