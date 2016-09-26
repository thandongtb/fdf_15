$(document).ready(function () {
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
