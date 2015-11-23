<div id="modal">
    <p class="hint"><?= __('Hold SHIFT to keep the aspect ratio') ?></p>
    
    <?= $this->Form->create(null,['type' => 'file', 'url' => ['controller' => 'Users', 'action' => 'updateImage']]) ?>
        <?= $this->Form->input('cropped-image', ['type' => 'hidden', 'id' => 'cropped-image-data']) ?>
        <?= $this->Form->input(null, ['type' => 'file', 'label' => false, 'style' => 'display:none', 'id' => 'browse-image', 'accept' => 'image/x-png, image/jpeg']) ?>
    <?= $this->Form->end() ?>

    <div class="crop">
        <div class="overlay">
            <div class="overlay-inner"></div>
        </div>
    </div>
    <button class="default-button js-crop"><?= __('Crop and save') ?></button>
    <button class="default-button cancel-modal"><?= __('Cancel') ?></button>
</div>