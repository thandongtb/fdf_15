$(document).ready(function () {
    $('.btn-task-product').on('click', function(e) {
        var taskModal = $('.modal-product-task');

        taskModal.modal({
            show: 'false'
        });
    });
});
