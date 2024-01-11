<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request Form</title>
    <!-- Add your styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('../hr/assets/theme/bk3.jpg'); /* Change the path accordingly */
            background-size: cover;
            background-position: center;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid blueviolet;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: red;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: lightgreen;
        }

        .btn-cancel {
            background-color: orangered;
        }

        h2 {
            text-align: center;
        }

        img {
            display: block;
            margin: auto;
            max-width: 30%;
            height: auto;
            filter: saturate(200%) brightness(100%);
        }
    </style>
</head>
<body>

    <form action="submit_leave.php" method="post" id="leaveForm">
        <img src="../hr/assets/theme/Logo.png" alt="Company Logo" style="max-width: 30%; height: auto;">
        <h2>Leave Request Form</h2>

        <!-- Employee Information -->
         <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="mail">E-Mail:</label>
        <input type="email" id="mail" name="mail" required>

        <label for="designation">Designation:</label>
        <input type="text" id="designation" name="designation" required>

        <label for="employeeNo">Employee No:</label>
        <input type="text" id="employeeNo" name="employeeNo" required>

        <label for="coveringPerson">Covering Person:</label>
        <input type="text" id="coveringPerson" name="coveringPerson" required>

        <!-- Leave Details -->
        <label for="leaveType">Leave Type:</label> 
        <select id="leaveType" name="leaveType" required>
            <option value="annual">Annual Leave</option>
            <option value="casual">Casual Leave</option>
            <option value="medical">Medical Leave</option>
            <option value="duty">Duty Leave</option>
            <option value="other">Other</option>
        </select>

        <label for="dateRequested">Date Requested:</label>
        <input type="date" id="dateRequested" name="dateRequested" required>

        <label for="numberOfDays">Number of Days Requested:</label>
        <input type="number" id="numberOfDays" name="numberOfDays" required>
        <!-- Other input fields... -->

        <!-- Submit and Cancel Buttons -->
        <button type="button" onclick="submitForm()">Request</button>
        <button type="button" class="btn-cancel" onclick="cancelForm()">Cancel</button>

       

        <script>
        function submitForm() {
            // You can add any necessary validation or processing logic here
            document.getElementById('leaveForm').submit();
        }

        function cancelForm() {
            // Add logic to handle canceling the form if needed
            alert('Form canceled');
        }

        
    </script>
        
    </form>

</body>
</html>