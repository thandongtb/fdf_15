$(document).ready(function () {
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

    $('#all-rate-product').jRate({
        startColor: '#BF00FF',
        endColor: '#6A0888',
        readOnly: true,
        precision: 0.1,
        rating : parseFloat($('#all-rate-product').data('rating')),
        count: 5,
        width: 30,
        height: 30,
    });

    $('#rate-product').jRate({
        startColor: '#0404B4',
        endColor: '#0B0B61',
        precision: 0.1,
        rating : parseFloat($('#rate-product').data('rating')),
        count: 5,
        width: 30,
        height: 30,
        onChange: function(rating) {

        },
        onSet: function(rating) {
            $('#rate-product-value').val(rating);
        }
    });

    $('.review-submit').on('click', function() {
        var formStoreReview = $('#form-store-comment');

        $.confirm({
            title: formStoreReview.data('confirm-title'),
            text: formStoreReview.data('confirm-content'),
            confirm: function(button) {
                startLoading();
                formStoreReview.submit();
            },
            cancel: function(button) {
                // nothing to do
            },
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger'
        });
    });

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '325537304461967',
            xfbml      : true,
            version    : 'v2.7'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=325537304461967";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
});
