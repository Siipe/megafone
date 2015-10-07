
<article>
	<h1>Cropping image</h1>
	<div class="crop">
		<div class="overlay">
			<div class="overlay-inner"></div>
		</div>
		<?= $this->Html->image('siipe.jpg', ['id' => 'crop']) ?>
		<button class="btn-crop js-crop">Crop</button>
	</div>
</article>
<?= $this->Html->script('cropper') ?>