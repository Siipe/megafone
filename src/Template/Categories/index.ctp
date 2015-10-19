<?php 
	$this->assign('title', 'View Categories');
?>
<article>
	<h1>View Categories</h1>
	<table>
		<tr>
			<td>Name</td>
			<td>Description</td>
			<td>Created in</td>
			<td>Created by</td>
		</tr>
		<?php foreach ($categories as $category): ?>
			<tr>
				<td><?= $category->name ?></td>
				<td><?= $category->description ?></td>
				<td><?= $category->dateCreated ?></td>
				<td><?= $category->user->name ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</article>