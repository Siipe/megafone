/**
 * Created by Siipe on 01/09/2015.
 */

$(document).ready(function(){
    $('.message').on('mouseover', function(){
        $('.close-message').show();
    })
    .on('mouseout', function(){
        $('.close-message').hide();
    });

    $('.close-message').on('click', function() {
        $(this).parent().remove();
    });
});
