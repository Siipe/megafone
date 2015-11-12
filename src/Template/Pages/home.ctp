<?php 
    $this->assign('title', __('Home'));
?>

<article>
    <h1><?= __('Welcome to Megafone!') ?></h1>
    <footer><?= __('Work well. Claim your rights. Complain if necessary!') ?></footer>
    <p><?= __('homepageMessage') ?></p>
</article>
<div class="interval"></div>
<article>
    <div class="images">
        <div><?= $this->Html->image('slow.png', ['alt' => 'Slow PC']); ?></div>
        <span><?= __('Slow computer?') ?></span>
    </div>
    <div class="images">
        <div><?= $this->Html->image('heat.png', ['alt' => 'Broken Air Conditioning']); ?></div>
        <span><?= __('Broken air conditioning?') ?></span>
    </div>
    <div class="images">
        <div><?= $this->Html->image('coffee.png', ['alt' => 'Broken Coffee Machine']); ?></div>
        <span><?= __('Broken coffee machine?') ?></span>
    </div>
</article>