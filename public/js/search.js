$(document).ready(function () {
    $('#search-button').on('click', function() {
        var inputString = $('#inputString').val();

        if (inputString.length == 0) {
            $('#suggestions').fadeOut();
        } else {
            var formData = new FormData();
            formData.append('name', inputString);

            $.ajax({
                url: '/search-product',
                processData : false,
                cache: false,
                contentType: false,
                method:'POST',
                data : formData,
                success: function(data) {
                    if (data.success) {
                        $('#suggestions').empty();
                        $('#suggestions').append(data.search_result);
                    } else {
                        toastr.warning(data.message);
                    }
                },
                error: function() {}
            });
        }
    });
});
