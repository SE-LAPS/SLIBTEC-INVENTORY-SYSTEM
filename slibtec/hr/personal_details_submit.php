<?php
include 'config/config.php';

// Create a database connection
$mysqli = new mysqli('localhost', 'root', '', 'rposystem');

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get form data
$otherName = $_POST['otherName'];
$email = $_POST['email'];
$nationality = $_POST['nationality'];
$civilStatus = $_POST['civilStatus'];
$religion = $_POST['religion'];
$bloodGroup = $_POST['bloodGroup'];
$district = $_POST['district'];
$profileImagePath = $_POST['profileImage'];



// Prepare the SQL statement with placeholders
$sql = "INSERT INTO user_information (other_name, email, nationality, civil_status, religion, blood_group, district, profile_image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

// Bind parameters
$stmt->bind_param('ssssssss', $otherName, $email, $nationality, $civilStatus, $religion, $bloodGroup, $district, $profileImagePath);

// Execute the statement
if ($stmt->execute()) {
    // Close prepared statement and database connection
    $stmt->close();
    $mysqli->close();

    // Redirect to a success page or wherever you want
    header("Location: success_page.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close prepared statement and database connection (in case of an error)
$stmt->close();
$mysqli->close();
?>
