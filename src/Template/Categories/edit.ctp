<?php
    $this->assign('title', __('Editing {0}', $category->name));
?>
<article>
    <h1><?= __('Editing {0}', $category->name) ?></h1>
    <?php
        require "form.ctp";
    ?>
</article>