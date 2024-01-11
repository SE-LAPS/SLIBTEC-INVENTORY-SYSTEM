<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rposystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit'])) {
    // Sanitize and validate user inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $room = mysqli_real_escape_string($conn, $_POST['room']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $agenda = mysqli_real_escape_string($conn, $_POST['agenda']);

    // Perform additional validation if needed (e.g., email validation)

    // Insert data into the database using prepared statements to prevent SQL injection
    $sql = "INSERT INTO meeting_rooms (name, staff_id, email, room, department, agenda) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $staff_id, $email, $room, $department, $agenda);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Reservation submitted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

// Close database connection
mysqli_close($conn);
?>
