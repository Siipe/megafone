<?php
    $this->assign('title', $category->name);
?>
<article>
	<div>
		<h1><?= $category->name ?></h1>
		
        <?= $this->element('editButton', [
            'entity' => $category,
            'controller' => 'Categories'
        ]) ?>

	</div>
    <footer><?= __('Created in {0} by {1}', $category->created, $this->Html->link($category->user->name, ['controller' => 'Users', 'action' => 'view', $category->user->id])) ?></footer>
    <p><?= $category->description ?></p>
</article>
<div class="interval"></div>
<article>
    <h1><?= __('Related Complaints ({0})', $complaintsCount) ?></h1>
    <ul id="complaints-list">
    	<?php foreach($complaints as $complaint): ?>
            <li>
                <div class="complaint-name">
                    <?= $this->Html->link($complaint->title, ['controller' => 'Complaints', 'action' => 'view', $complaint->id]) ?>
                </div>
                <div class="user-details">
                    
                    <?= $this->element('complaintOwner', [
                        'complaint' => $complaint
                    ]) ?>
                    
                </div>
                <div class="fulfill-line">
                    <span></span>
                </div>
                <div class="complaint-details">
                    <span><?= $complaint->created ?></span>
                </div>
                
                <?= $this->element('optionsEditAndDelete', [
                    'entity' => $complaint,
                    'controller' => 'Complaints' 
                ]) ?>

            </li>
    	<?php endforeach; ?>
    </ul>
	
    <?= $this->element('defaultPaginator') ?>

</article>