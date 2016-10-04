$(document).ready(function() {
    $('.homepage-menu').removeClass('active');

    $('.suggest-menu').addClass('active');

    $('#create-product-image').on('click', function() {
        $('#file-product-image').trigger('click');
    });

    $('#file-product-image').change(function(event) {
        var reader = new FileReader();
        reader.onload = function(e) {
             $( '#create-product-image' ).attr('src', e.target.result);
        };
        reader.readAsDataURL(event.target.files[0]);
    });
});
