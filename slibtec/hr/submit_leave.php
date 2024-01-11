<?php
// Get form data
$date = $_POST['date'];
$name = $_POST['name'];
$mail = $_POST['mail'];
$designation = $_POST['designation'];
$employeeNo = $_POST['employeeNo'];
$coveringPerson = $_POST['coveringPerson'];
$leaveType = $_POST['leaveType'];
$dateRequested = $_POST['dateRequested'];
$numberOfDays = $_POST['numberOfDays'];

// Insert data into the database
$mysqli = new mysqli('localhost', 'root', '', 'rposystem');

if ($mysqli->connect_error) {
    die('Connection Failed: ' . $mysqli->connect_error);
}

$sql = "INSERT INTO leave_request (date, name, mail, designation, employeeNo, coveringPerson, leaveType, dateRequested, numberOfDays) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

$stmt->bind_param('ssssssssi', $date, $name, $mail, $designation, $employeeNo, $coveringPerson, $leaveType, $dateRequested, $numberOfDays);

if ($stmt->execute()) {
    // Close prepared statement and database connection
    $stmt->close();
    $mysqli->close();

    // Redirect to a success page or wherever you want
    header("Location: leave_preview.php?date=$date&name=$name&mail=$mail&designation=$designation&employeeNo=$employeeNo&coveringPerson=$coveringPerson&leaveType=$leaveType&dateRequested=$dateRequested&numberOfDays=$numberOfDays");
    exit(); // Ensure that the script stops execution after the redirect
} else {
    echo "Error: " . $stmt->error;
}

// Close prepared statement and database connection (in case of an error)
$stmt->close();
$mysqli->close();
?>