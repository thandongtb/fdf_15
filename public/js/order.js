$(document).ready(function () {
    $('.homepage-menu').removeClass('active');

    $('.checkout-menu').addClass('active');

    $('.btn-order-submit').on('click', function () {
        var formOrder = $('.form-store-order');
        var title = $(this).data('title');
        var content = $(this).data('content');

        $.confirm({
            title: title,
            text: content,
            confirm: function(button) {
                startLoading();
                formOrder.submit();
            },
            cancel: function(button) {
            },
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger'
        });
    });
});
