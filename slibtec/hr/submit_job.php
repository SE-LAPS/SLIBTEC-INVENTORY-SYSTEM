<?php
// Get form data
$epfNo = $_POST['epfNo'];
$etfNo = $_POST['etfNo'];
$employeeGrade = $_POST['employeeGrade'];
$serviceType = $_POST['serviceType'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];



// Create a database connection
$mysqli = new mysqli('localhost', 'root', '', 'rposystem');

// Check the connection
if ($mysqli->connect_error) {
    die('Connection Failed: ' . $mysqli->connect_error);
}

// Prepare the SQL statement with placeholders
$sql = "INSERT INTO job_profile (epfNo, etfNo, employeeGrade, serviceType, startDate, endDate) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

// Bind parameters
$stmt->bind_param('ssssss', $epfNo, $etfNo, $employeeGrade, $serviceType, $startDate, $endDate);

// Execute the statement
if ($stmt->execute()) {
    // Close prepared statement and database connection
    $stmt->close();
    $mysqli->close();

    // Redirect to a success page or wherever you want
    header("Location: success_page.php");
    exit(); // Ensure that the script stops execution after the redirect
} else {
    echo "Error: " . $stmt->error;
}

// Close prepared statement and database connection (in case of an error)
$stmt->close();
$mysqli->close();
?>
