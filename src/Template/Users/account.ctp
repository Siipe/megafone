<?php
$this->assign('title', $user['name']);
?>
<article>
    <h1>My account</h1>
    <?php
        require_once('image-modal.ctp')
    ?>
    <section id="user-view">
        <div class="user-image">
            <?= $user['picture'] ? $this->Html->image('uploads/'.$user['picture']) : $this->Html->image('user-default.png')?>
            <p><a href="#" id="update-image">Update image</a></p>
        </div>
        <div class="information">
            <h1>Basic information</h1>
            <div>
                <label>Name</label>
                <?= $user['name'] ?>
            </div>
            <div>
                <label>Login</label>
                <?= $user['login'] ?>
            </div>
            <div>
                <label>E-mail</label>
                <?= $user['email'] ?>
            </div>
            <div>
                <label>Member since</label>
                <?= $user['dateJoined'] ?>
            </div>
        </div>
        <div class="clear"></div>
    </section>
    <div class="button asdas">
        <?= $this->Html->link(__('Edit basic information'), ['action' => 'edit']) ?>
    </div>

    <div class="button">
        <button class="btn-crop js-crop">Crop</button>
    </div>
</article>
<div class="interval"></div>
<?= $this->Html->script('cropper') ?>
<script>
    $('#update-image').on('click', function(){
        $('input:file').trigger('click');
    });

    $('input:file').on('change', handleUpload);

    function handleUpload(e) {
        var reader = new FileReader(), $image = $('<img />');
        reader.onload = function(event) {
            var img = new Image();
            img.onload = function() {
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');
                var containerWidth = $('#content').width();
                var width = img.width > containerWidth ? containerWidth*0.7 : img.width;
                var height = width / img.width * img.height;
                canvas.width = width;
                canvas.height = height;
                ctx.drawImage(img, 0, 0, width, height);
                $overlayInner = $('<div />').addClass('overlay-inner');
                $overlay = $('<div />').addClass('overlay').append($overlayInner);
                $crop = $('<div />').addClass('crop').append($overlay).insertAfter('.asdas');
                $image.attr('src', canvas.toDataURL("image/png")).insertAfter('.overlay');
                resizeableImage($image);
            }
            img.src = event.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
</script>