<?php 
    $this->assign('title', 'Home');
?>

<article>
    <h1>Welcome to Megafone!</h1>
    <footer>Work well. Claim your rights. Complain if necessary!</footer>
    <p>Is your work environment comfortable? Does it suit your expectations? Do you have direct access to the resources it provides? Very often we're dealing with annoying issues at work. Depending on the situation, a slow computer, either bad postural conditions, can make your day-to-day a chaos. This system stands entirely for you! Here you have the chance to make complaints about such bad situations. Enjoy!</p>
</article>
<div class="interval"></div>
<article>
    <div class="images">
        <div><?= $this->Html->image('slow.png', ['alt' => 'Slow PC']); ?></div>
        <span>Slow computer?</span>
    </div>
    <div class="images">
        <div><?= $this->Html->image('heat.png', ['alt' => 'Broken Air Conditioning']); ?></div>
        <span>Broken air conditioning?</span>
    </div>
    <div class="images">
        <div><?= $this->Html->image('coffee.png', ['alt' => 'Broken Coffee Machine']); ?></div>
        <span>Broken coffee machine?</span>
    </div>
</article>