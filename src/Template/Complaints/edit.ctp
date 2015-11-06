<?php 
	$this->assign('title', 'Editing '.$complaint->name);
?>
<article>
	<h1>Editing <?= $complaint->name ?></h1>
	<?php 
		require 'form.ctp';
	?>
</article>