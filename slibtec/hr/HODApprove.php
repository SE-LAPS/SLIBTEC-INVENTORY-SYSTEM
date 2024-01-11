<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $officialUse = isset($_POST['officialUse']) ? $_POST['officialUse'] : '';

    // Email configuration
    $to = "yourmail@gmail.com"; 
    $subject = "Leave Approval Status";
    $message = "Dear User,\n\nYour leave approval status: $officialUse";

    // Send email
    mail($to, $subject, $message);

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Leave Form</title>
    <!-- Add your styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            width: 30%; 
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        .official-use {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center; /* Adjust this property to control vertical alignment */
        }

        .radio-label {
            margin-right: 45px; /* Adjust this property to control the space between radio button and label */
        }

        input[type="radio"] {
            margin-bottom: 15px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 25px;
        }

        button:hover {
            background-color: #45a049;
        }

        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>

    <form action="leave_preview.php" method="post">
        <h2>Official Use Form</h2>

        <!-- Official Use Section -->
        <div class="official-use">

            <label class="radio-label" for="approved">Approved:</label>
            <input type="radio" id="approved" name="officialUse" value="Approved">

            <label class="radio-label" for="rejected">Not Approved:</label>
            <input type="radio" id="rejected" name="officialUse" value="Not Approved">
        </div>

        <!-- Approval Message Section -->
        <div class="approval-message" id="approvalMessage"></div>

        <!-- Submit Button -->
       <center> <button type="button" onclick="submitForm()">Submit</button></center>

        <!-- Include your JavaScript here -->
        <script>
    function submitForm() {
        // Get the selected radio button value
        var selectedValue = document.querySelector('input[name="officialUse"]:checked');

        // Display the corresponding message
        var approvalMessage = document.getElementById('approvalMessage');
        if (selectedValue) {
            approvalMessage.innerHTML = "Hi... Dear Your approval: <strong>" + selectedValue.value + "</strong>";
        } else {
            approvalMessage.innerHTML = "<strong>Please select an option before submitting.</strong>";
        }

        // Submit the form
        document.getElementById('leaveForm').submit();
    }
</script>
    </form>

</body>
</html>
