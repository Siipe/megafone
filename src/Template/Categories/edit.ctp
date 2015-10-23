<?php
    $this->assign('title', 'Editing '.$category->name);
?>
<article>
    <h1>Editing <?= $category->name ?></h1>
    <?php
        require "form.ctp";
    ?>
</article>