<?php
// Get form data
$otherName = $_POST['otherName'];
$email = $_POST['email'];
$nationality = $_POST['nationality'];
$civilStatus = $_POST['civilStatus'];
$religion = $_POST['religion'];
$bloodGroup = $_POST['bloodGroup'];
$district = $_POST['district'];
$profile_Img = $_POST['profile_Img'];


// Create a database connection
$mysqli = new mysqli('localhost', 'root', '', 'rposystem');

// Check the connection
if ($mysqli->connect_error) {
    die('Connection Failed: ' . $mysqli->connect_error);
}

// Prepare the SQL statement with placeholders
$sql = "INSERT INTO personal_profile  (otherName, email, nationality, civilStatus, religion, bloodGroup, district, profile_Img) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

// Bind parameters
$stmt->bind_param('ssssssss', $otherName, $email, $nationality, $civilStatus, $religion, $bloodGroup, $district, $profile_Img);

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
