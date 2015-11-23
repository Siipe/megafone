function commonHandlers() {
    $('.message').on('mouseover', function() {
        $('.close-message').show();
    })
    .on('mouseout', function(){
        $('.close-message').hide();
    });

    $('.close-message').on('click', function() {
        $(this).parent().remove();
    });

    $('.cancel-modal').on('click', function() {
        closeModal();
        cleanCropperComponent();
    });

    $('#update-image').on('click', function() {
        $('input:file').trigger('click');
    });

    $('#browse-image').on('change', function(e) {
        openModal();
        handleUpload(e);
        $(this).val('');
    });

    $('.manager').on('click', function() {
        $(this).siblings('.options').toggle();
    });

    $('input:not(input:checkbox, input:radio), textarea').on('keydown keyup', function() {
        handleMaxlengthEvent($(this));
    })
    .bind('paste', function() {
        $self = $(this);
        setTimeout(function() {
            handleMaxlengthEvent($self);
        }, 1);
    });

    $('#commentForm').on('submit', function(e) {
        $element = $(this).find('textarea');
        if(!$element.val().trim()) {
            $element.val('');
            return false;
        }

        return true;
    });
}