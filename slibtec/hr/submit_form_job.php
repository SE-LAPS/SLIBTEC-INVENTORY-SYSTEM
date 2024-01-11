<?php
include 'config/config.php';

// Check the connection
if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve form data
$epfNo = $_POST['epfNo'];
$etfNo = $_POST['etfNo'];
$employeeGrade = $_POST['employeeGrade'];
$serviceType = $_POST['serviceType'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];


// Insert data into the employee_profiles table
$sql = "INSERT INTO job_profile  (epfNo, etfNo, employeeGrade, serviceType, startDate, endDate)
        VALUES ('$epfNo', '$etfNo', '$employeeGrade', '$serviceType', '$startDate', '$endDate')";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>