$(document).ready(function () {
    $('.homepage-menu').removeClass('active');

    $('.cart-menu').addClass('active');

    var subTotalPrice = parseFloat($('#sub-total-price').data('subtotal'));

    $('.minus').on('click', function (e) {
        e.preventDefault();
        var divChangeAmount = $(this).parent();
        var cartId = divChangeAmount.data('cart-id');
        var price = parseFloat($('#cart-price-' + cartId).data('price'));
        var qty = parseInt(divChangeAmount.children('input.qty').val());
        var divSubTotalPrice = $('#sub-total-price');
        var divOrderTotal = $('#sub-total-order');

        if (qty >= 1) {
            var subTotal = (qty - 1) * price;
            subTotalPrice = subTotalPrice - price;
            divSubTotalPrice.attr('data-subtotal', subTotalPrice);
            divSubTotalPrice.html(subTotalPrice);
            divOrderTotal.attr('data-subtotal', subTotalPrice);
            divOrderTotal.html(subTotalPrice);
            divChangeAmount.children('input.qty').val(qty - 1);
            divChangeAmount.children('input.qty').html(qty - 1);

            $('#amount-' + cartId).attr('data-subtotal', subTotal);
            $('#amount-' + cartId).html(subTotal);
        }
    });

    $('.plus').on('click', function (e) {
        e.preventDefault();
        var divChangeAmount = $(this).parent();
        var cartId = divChangeAmount.data('cart-id');
        var price = parseFloat($('#cart-price-' + cartId).data('price'));
        var qty = parseInt(divChangeAmount.children('input.qty').val());
        var subTotal = (qty + 1) * price;
        var divSubTotalPrice = $('#sub-total-price');
        var divOrderTotal = $('#sub-total-order');

        subTotalPrice = subTotalPrice + price;
        divSubTotalPrice.attr('data-subtotal', subTotalPrice);
        divSubTotalPrice.html(subTotalPrice);
        divOrderTotal.attr('data-subtotal', subTotalPrice);
        divOrderTotal.html(subTotalPrice);

        divChangeAmount.children('input.qty').val(qty + 1);
        divChangeAmount.children('input.qty').html(qty + 1);

        $('#amount-' + cartId).attr('data-subtotal', subTotal);
        $('#amount-' + cartId).html(subTotal);
    });

    $('.btn-update-cart').on('click', function(e) {
        e.preventDefault();
        var formUpdateCart = $('.form-update-cart');
        var tableUdpateCart = $('.shop-table');

        $.confirm({
            title: tableUdpateCart.data('confirm-title'),
            text: tableUdpateCart.data('confirm-content'),
            confirm: function(button) {
                startLoading();
                formUpdateCart.submit();
            },
            cancel: function(button) {
                // nothing to do
            },
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger'
        });
    });

    $('.remove-item').on('click', function(e) {
        e.preventDefault();

        var tableUdpateCart = $('.shop-table');
        var rowId = $(this).data('row-id');
        var item = $('#cart-item-' + rowId);

        $.confirm({
            title: tableUdpateCart.data('confirm-delete-title'),
            text: tableUdpateCart.data('confirm-detele-content'),
            confirm: function(button) {
                startLoading();
                $.ajax({
                    url: '/cart/' + rowId,
                    processData : false,
                    cache: false,
                    contentType: false,
                    method:'DELETE',
                    data : rowId,
                    success: function(data) {
                        if (data.success) {
                            toastr.success(data.message);
                            item.empty();
                            endLoading();
                        } else {
                            toastr.warning(data.message);
                        }
                    },
                    error: function() {}
                });
            },
            cancel: function(button) {
                // nothing to do
            },
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger'
        });
    });
});
