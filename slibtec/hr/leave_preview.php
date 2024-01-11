<?php
// Retrieve form data from URL parameters
$date = isset($_GET['date']) ? $_GET['date'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$mail = isset($_GET['mail']) ? $_GET['mail'] : '';
$designation = isset($_GET['designation']) ? $_GET['designation'] : '';
$employeeNo = isset($_GET['employeeNo']) ? $_GET['employeeNo'] : '';
$coveringPerson = isset($_GET['coveringPerson']) ? $_GET['coveringPerson'] : '';
$leaveType = isset($_GET['leaveType']) ? $_GET['leaveType'] : '';
$dateRequested = isset($_GET['dateRequested']) ? $_GET['dateRequested'] : '';
$numberOfDays = isset($_GET['numberOfDays']) ? $_GET['numberOfDays'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Preview</title>
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

    <h2>Leave Request Preview</h2>

    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td><strong>Date</strong></td>
            <td><?php echo htmlspecialchars($date); ?></td>
        </tr>
        <tr>
            <td><strong>Name</strong></td>
            <td><?php echo htmlspecialchars($name); ?></td>
        </tr>
        <tr>
            <td><strong>E-mail</strong></td>
            <td><?php echo htmlspecialchars($mail); ?></td>
        </tr>
        <tr>
            <td><strong>Designation</strong></td>
            <td><?php echo htmlspecialchars($designation); ?></td>
        </tr>
        <tr>
            <td><strong>Employee Number</strong></td>
            <td><?php echo htmlspecialchars($employeeNo); ?></td>
        </tr>
        <tr>
            <td><strong>Covering Person</strong></td>
            <td><?php echo htmlspecialchars($coveringPerson); ?></td>
        </tr>
        <tr>
            <td><strong>Leave Type</strong></td>
            <td><?php echo htmlspecialchars($leaveType); ?></td>
        </tr>
        <tr>
            <td><strong>Date Requested</strong></td>
            <td><?php echo htmlspecialchars($dateRequested); ?></td>
        </tr>
        <tr>
            <td><strong>Number of Days</strong></td>
            <td><?php echo htmlspecialchars($numberOfDays); ?></td>
        </tr>
    </table>

    <?php include 'HODApprove.php';?>

    <script>
        function goBack() {
            window.location.href = 'leave.php';
        }
    </script>
    <button class="back-button" onclick="goBack()">Back</button>

</body>
</html>
