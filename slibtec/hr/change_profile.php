<?php
include 'config/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Employee Form</title>

    <style>
        body {
    font-family: Arial, sans-serif;
    background-image: url('../hr/assets/theme/bk3.jpg'); /* Change the path accordingly */
    background-size: cover;
    background-position: center;
}

.form-container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
    
}

label {
    display: block;
    margin-bottom: 8px;
}

input,
select {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
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
.back {
    position: absolute;
    left: 20px; /* Adjust the left position as needed */
    top: 20px; /* Adjust the top margin as needed */
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none;
}

.back:hover {
    background-color: #2980b9;
}

/* Add this to adjust the form container's position */
.form-container {
    position: relative;
}


    </style>
</head>
<body>
    <div class="form-container">

    <form id="employeeForm" method="post" action="submit_form.php">

        <form action="submit_profile.php" method="post" id="employeeForm">

            <img src="../hr/assets/theme/Logo.png" alt="Company Logo" style="max-width: 30%; height: auto;">
            <h2>Profile Details Form</h2>
            <!-- Employee ID, Initials, First Name, Last Name -->
            <div class="form-group">
                <label for="employeeId">Employee ID:</label>
                <input type="text" id="employeeId" name="employeeId" required>
            </div>
            <div class="form-group">
                <label for="initials">Initials:</label>
                <input type="text" id="initials" name="initials" required>
            </div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>

            <!-- Title, Gender, Date of Birth -->
            <div class="form-group">
                <label for="title">Title:</label>
                <select id="title" name="title" required>
                    <option value="mrs">Mrs</option>
                    <option value="mr">Mr</option>
                    <option value="miss">Miss</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <!-- Designation, Department -->
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" id="designation" name="designation" required>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <select id="department" name="department" required>
                    <option value="hr">HR</option>
                    <option value="it">IT</option>
                    <option value="engineer">Engineer</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- NIC Number, Joined On Date -->
            <div class="form-group">
                <label for="nic">NIC Number:</label>
                <input type="text" id="nic" name="nic" required>
            </div>
            <div class="form-group">
                <label for="joinedOn">Joined On:</label>
                <input type="date" id="joinedOn" name="joinedOn" required>
            </div>

            <!-- Submit Button -->
            <div class="form-group">

                <button type="submit">Submit</button>
                <button type="button" class="btn-cancel" onclick="clearForm()">Clear</button>    
                <a href="dashboard.php" class="back round">&#8249;</a>    
            </div>
            
<script>
    function clearForm() {
        // Replace 'employeeForm' with the actual ID of your form
        var form = document.getElementById('employeeForm');
        
        // Reset the form
        form.reset();
    }
</script>
        </form>
    </div>
</body>
</html>