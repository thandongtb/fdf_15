$(document).ready(function () {
    $('.btn-task-category').on('click', function(e) {
        var categoryId = $(this).data('category-id');
        var formDelete = $(this).parents('form.form-delete-category');
        var taskModal = $('.modal-category-task');

        taskModal.modal({
            show: 'false'
        });

        $('.btn-category-detail').on('click', function() {
            window.location.href = 'category/' + categoryId;
        });

        $('.btn-category-edit').on('click', function() {
            window.location.href = 'category/' + categoryId + '/edit';
        });

        $('.btn-category-delete').on('click', function(e) {
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
});
