<?php 
	$this->assign('title', __('Editing {0}', $complaint->name));
?>
<article>
	<h1><?= __('Editing {0}', $complaint->name) ?></h1>
	<?php 
		require 'form.ctp';
	?>
</article>