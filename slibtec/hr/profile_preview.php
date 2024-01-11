<?php
// Retrieve form data from URL parameters
$employeeId = isset($_GET['employeeId']) ? $_GET['employeeId'] : '';
$initials = isset($_GET['initials']) ? $_GET['initials'] : '';
$firstName = isset($_GET['firstName']) ? $_GET['firstName'] : '';
$lastName = isset($_GET['lastName']) ? $_GET['lastName'] : '';
$title = isset($_GET['title']) ? $_GET['title'] : '';
$gender = isset($_GET['gender']) ? $_GET['gender'] : '';
$dob = isset($_GET['dob']) ? $_GET['dob'] : '';
$designation = isset($_GET['designation']) ? $_GET['designation'] : '';
$department = isset($_GET['department']) ? $_GET['department'] : '';
$nic = isset($_GET['nic']) ? $_GET['nic'] : '';
$joinedOn  = isset($_GET['joinedOn']) ? $_GET['joinedOn'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Preview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
            padding-top:25px;
        }

        table {
            width: 50%; /* Adjust the table width as needed */
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            color: #555;
            margin: 10px 0;
            opacity: 0;
            transform: translateX(-20px);
            animation: fadeInRight 0.5s ease-out forwards;
        }

        @keyframes fadeInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .back-button {
            margin-top: 20px;
            padding: 10px 50px;
            background-color: #ff8c00;
            color: #fff;
            border: none;
            cursor: pointer;
            margin: auto;
        }
    </style>
</head>
<body>

    <h2>Profile Request Preview</h2>

    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td><strong>Employee ID</strong></td>
            <td><?php echo htmlspecialchars($employeeId); ?></td>
        </tr>
        <tr>
            <td><strong>Initials</strong></td>
            <td><?php echo htmlspecialchars($initials); ?></td>
        </tr>
        <tr>
            <td><strong>First Name</strong></td>
            <td><?php echo htmlspecialchars($firstName); ?></td>
        </tr>
        <tr>
            <td><strong>Last Name</strong></td>
            <td><?php echo htmlspecialchars($lastName); ?></td>
        </tr>
        <tr>
            <td><strong>Title</strong></td>
            <td><?php echo htmlspecialchars($title); ?></td>
        </tr>
        <tr>
            <td><strong>Gender</strong></td>
            <td><?php echo htmlspecialchars($gender); ?></td>
        </tr>
        <tr>
            <td><strong>Date of Birth</strong></td>
            <td><?php echo htmlspecialchars($dob); ?></td>
        </tr>
        <tr>
            <td><strong>Designation</strong></td>
            <td><?php echo htmlspecialchars($dateRequested); ?></td>
        </tr>
        <tr>
            <td><strong>Department</strong></td>
            <td><?php echo htmlspecialchars($numberOfDays); ?></td>
        </tr>
        <tr>
            <td><strong>NIC Number</strong></td>
            <td><?php echo htmlspecialchars($numberOfDays); ?></td>
        </tr>
        <tr>
            <td><strong>Joined On</strong></td>
            <td><?php echo htmlspecialchars($numberOfDays); ?></td>
        </tr>
       
    </table>

    <script>
        function goBack() {
            window.location.href = 'change_profile.php';
        }
    </script>
    <button class="back-button" onclick="goBack()">Back</button>

</body>
</html>
