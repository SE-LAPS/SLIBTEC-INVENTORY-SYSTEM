<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Analysis Bar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Your HTML content here -->

</body>
</html>
<?php
// Example data (replace with your actual data retrieval logic)
$data = array(
    'January' => 30,
    'February' => 45,
    'March' => 25,
    'April' => 60,
    'May' => 20,
    'June' => 50,
    'July' => 30,
    'August' => 45,
    'September' => 20,
    'October' => 60,
    'November' => 30,
    'December' => 40,
);

$labels = json_encode(array_keys($data));
$values = json_encode(array_values($data));
?>
<canvas id="barChart" width="400" height="200"></canvas>
<script>
    // Convert JSON-encoded PHP variables to JavaScript variables
    var labels = <?php echo $labels; ?>;
    var values = <?php echo $values; ?>;

    // Get the canvas element
    var ctx = document.getElementById('barChart').getContext('2d');

    // Create the bar chart
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Data Analysis',
                data: values,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
