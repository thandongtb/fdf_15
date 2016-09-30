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

    $('.btn-add-to-cart').on('click', function(e) {
        e.preventDefault();

        var productId = $(this).data('product-id');
        var formData = new FormData();
        formData.append('id', productId);

        $.ajax({
            url: 'cart',
            processData : false,
            cache: false,
            contentType: false,
            method:'POST',
            data : formData,
            success: function(data) {

                if (data.success) {
                    toastr.success(data.message);
                    $('.cart-amunt').html(data.total_price);
                    $('.product-count').html(data.total_prodcut);
                } else {
                    toastr.warning(data.message);

                }
            },
            error: function() {}
        });
    });
});
