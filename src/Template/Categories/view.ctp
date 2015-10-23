<?php
    $this->assign('title', $category->name);
?>
<article>
    <h1><?= $category->name ?></h1>
    <footer>Created in <?= $category->created ?> by <?= $this->Html->link($category->user->name, ['controller' => 'Users', 'action' => 'view', $category->user->id]) ?></footer>
    <p><?= $category->description ?></p>
</article>
<div class="interval"></div>
<article>
    <h1>Related Complaints</h1>
    <footer>Coming soon... :)</footer>
</article>