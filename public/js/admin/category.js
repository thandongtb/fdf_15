$(document).ready(function () {
    $('.btn-delete-category').on('click', function(e) {
        var formDelete = $(this).parents('form.form-delete-category');
        e.preventDefault();
        $.confirm({
            title: $('#categories-table').data('confirm-title'),
            text: $('#categories-table').data('confirm-content'),
            confirm: function(button) {
                 formDelete.submit();
            },
            cancel: function(button) {
                // nothing to do
            },
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger'
        });
    });
});
