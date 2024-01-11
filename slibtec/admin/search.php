


    <script>
     $(document).ready(function() {
    $('.search-bar').keyup(function() {
        var query = $(this).val();
        if (query !== '') {
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: {query: query},
                success: function(data) {
                    // Display the table when there are search results
                    $('.search-results').html(data).show();
                }
            });
        } else {
            // Hide the table when there is no search query
            $('.search-results').hide();
        }
    });

    $(document).on('click', 'li', function() {
        var value = $(this).text();
        $('.search-bar').val(value);
        $('.suggestions').hide();
        $('.search-bar').hide(); // Hide the search bar after selecting an item
    });
});
