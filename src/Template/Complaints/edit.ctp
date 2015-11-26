<?php 
	$this->assign('title', __('Editing {0}', $complaint->title));
?>
<article>
	<h1><?= __('Editing {0}', $complaint->title) ?></h1>
	<?php 
		require 'form.ctp';
	?>
</article>