/**
 * Created by Siipe on 01/09/2015.
 */

$(document).ready(function(){
    commonHandlers();
});

function openModal() {
    var $overlay = $('<div />').attr('id', 'super-overlay');
    $overlay.prependTo('body').add($('#modal')).fadeIn('slow');
}

function closeModal() {
    $('#modal').fadeOut('fast');
    $('#super-overlay').fadeOut('fast', function(){
        $(this).remove();
    });
}

function handleUpload(e) {
    var reader = new FileReader(), $image = $('<img />'), containerWidth = $('#content').width();
    reader.onload = function(event) {
        var img = new Image();
        img.onload = function() {
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var width = img.width > containerWidth*0.8 ? containerWidth*0.8 : img.width;
            var height = width / img.width * img.height;
            canvas.width = width;
            canvas.height = height;
            ctx.drawImage(img, 0, 0, width, height);
            $image.attr('src', canvas.toDataURL("image/png")).appendTo('.crop');
            resizeableImage($image);
        }
        img.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
}

function cleanCropperComponent() {
    $('.resize-container').remove();
}

function handleMaxlengthEvent($obj) {
    $maxlength = parseInt($obj.attr('maxlength'));
    if($obj.val().length == $maxlength)
        $obj.addClass('maximum');
    else
        $obj.removeClass('maximum');
}
