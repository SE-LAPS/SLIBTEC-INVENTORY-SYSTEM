<?php
include 'config/config.php';

// Check the connection
if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve form data
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

// Insert data into the employee_profiles table
$sql = "INSERT INTO employee_profiles (employeeId, initials, firstName, lastName, title, gender, dob, designation, department, nic, joinedOn)
        VALUES ('$employeeId', '$initials', '$firstName', '$lastName', '$title', '$gender', '$dob', '$designation', '$department', '$nic', '$joinedOn')";



    // Redirect to a success page or wherever you want
    header("Location: success_page.php");
    exit(); // Ensure that the script stops execution after the redirect


// Close prepared statement and database connection (in case of an error)
$stmt->close();
$mysqli->close();
?>