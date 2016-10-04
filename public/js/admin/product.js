$(document).ready(function () {
    $('.btn-task-product').on('click', function(e) {
        var productId = $(this).data('product-id');
        var taskModal = $('.modal-product-task');
        var formDelete = $(this).parents('form.form-delete-product');

        taskModal.modal({
            show: 'false'
        });

        $('.btn-product-detail').on('click', function() {
            window.location.href = 'product/' + productId;
        });

        $('.btn-product-edit').on('click', function() {
            window.location.href = 'product/' + productId + '/edit';
        });

        $('.btn-product-delete').on('click', function(e) {
            e.preventDefault();
            $.confirm({
                title: $('#products-table').data('confirm-title'),
                text: $('#products-table').data('confirm-content'),
                confirm: function(button) {
                    startLoading();
                    formDelete.submit();
                },
                cancel: function(button) {
                },
                confirmButtonClass: 'btn-info',
                cancelButtonClass: 'btn-danger'
            });
        });
    });

    $('.btn-edit-product-submit').on('click', function() {
        startLoading();
    });

    $('.btn-create-product-submit').on('click', function() {
        startLoading();
    });

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

