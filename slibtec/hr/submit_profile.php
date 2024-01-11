<?php
// Get form data
$employeeId = $_POST['employeeId'];
$initials = $_POST['initials'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$title = $_POST['title'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$designation = $_POST['designation'];
$department = $_POST['department'];
$nic = $_POST['nic'];
$joinedOn = $_POST['joinedOn'];

// Create a database connection
$mysqli = new mysqli('localhost', 'root', '', 'rposystem');

// Check the connection
if ($mysqli->connect_error) {
    die('Connection Failed: ' . $mysqli->connect_error);
}

// Prepare the SQL statement with placeholders
$sql = "INSERT INTO profile_add (employee_id, initials, first_name, last_name, title, gender, dob, designation, department, nic, joined_on) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

// Bind parameters
$stmt->bind_param('ssssssssss', $employeeId, $initials, $firstName, $lastName, $title, $gender, $dob, $designation, $department, $nic, $joinedOn);

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
