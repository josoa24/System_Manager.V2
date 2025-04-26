$(document).ready(function() {
    $('#search-input').on('input', function() {
        var query = $(this).val();

        $.ajax({
            url: 'search-treatment.php',
            method: 'GET',
            data: {
                search: query
            },
            success: function(data) {
                $('.list-box').html(data);
            }
        });
    });
});
