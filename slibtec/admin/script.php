<?php
// search.php

// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rposystem";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the 'query' key is set in the $_POST array
$query = isset($_POST['query']) ? $_POST['query'] : '';

// Initialize an empty suggestions array
$suggestions = array();

// Perform the search query on your MySQL database table
if (!empty($query)) {
    $sql = "SELECT prod_desc FROM rpos_products WHERE prod_desc LIKE '%$query%' ORDER BY prod_desc";
    $result = $conn->query($sql);

    // Populate the suggestions array
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row['prod_desc'];
    }
}

// Output the suggestions in JSON format
echo json_encode($suggestions);

$conn->close();
?>


<script>
$(document).ready(function() {
    $('.search-bar').keyup(function() {
        var query = $(this).val();
        if (query !== '') {
            $.ajax({
                url: 'script.php',
                method: 'POST',
                data: {query: query},
                success: function(data) {
                    // Display the search results when there are search results
                    if (data.length > 0) {
                        $('.search-results').html(data).show();
                    } else {
                        // Show a message when there are no search suggestions
                        $('.search-results').html('<p>Not suggest item</p>').show();
                    }
                }
            });
        } else {
            // Hide the search results when there is no search query
            $('.search-results').hide();
        }
    });
});
</script>
