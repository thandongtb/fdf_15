$(document).ready(function () {
    $('.homepage-menu').removeClass('active');

    $('.category-menu').addClass('active');

    $('.btn-add-to-cart').on('click', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');
        var formData = new FormData();
        formData.append('id', productId);

        $.ajax({
            url: '/cart',
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

    $('.all-rate-product').each(function () {
        $(this).jRate({
            startColor: '#BF00FF',
            endColor: '#6A0888',
            readOnly: true,
            precision: 0.1,
            rating : parseFloat($(this).data('rating')),
            count: 5,
            width: 30,
            height: 30,
        });
    });
});
