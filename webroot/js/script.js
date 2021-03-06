/**
 * Created by Siipe on 01/09/2015.
 */

$(document).ready(function(){
    commonHandlers();
});

function openModal() {
    $('#super-overlay').prependTo('body').add($('#modal')).fadeIn('slow');
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

function reply(element, commentId) {
    $replyForm = $('#reply-form');
    $('#comment-id').val(commentId);
    $(element).parents('.comments-details').find('.comment-reply').append($replyForm);
    $replyForm.find('textarea').focus();
}

function sendComment(event, element) {
    event.preventDefault();
    $form = $(element).parents('form');
    $textarea = $form.find('textarea');
    if(formIsReady($textarea)) {
        $.ajax({
            url         : $(element).data('url'),
            type        : 'POST',
            data        : $form.serialize(),
            success     : function() {
                                location.reload();
                            }           
        });
    } else
        $textarea.val('').focus();

    return false;
}

function formIsReady($textarea) {
    return Boolean($textarea.val().trim());
}

function deleteComment(element) {
    $.ajax({
        url         : $(element).data('url')+'/'+$(element).data('id'),
        type        : 'GET',
        success     : function(response) {
                            location.reload();
                        }        
    });
}

function cancelReply(event) {
    event.preventDefault();
    $('#reply-form').appendTo($('#reply-form-container')).find('#comment-id, textarea').val('');

    return false;
}
