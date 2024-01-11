<?php
include 'config/config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Employee Information Form</title>
  <style>

    body {
  font-family: Arial, sans-serif;
  background-image: url('../hr/assets/theme/bk3.jpg'); /* Change the path accordingly */
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

form {
  max-width: 400px;
  width: 100%;
  padding: 20px;
   background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.form-group {
    margin-bottom: 10px;
    
}
label {
  display: block;
  margin-bottom: 8px;
}

input,
select {
  width: 100%;
  padding: 10px;
  margin-bottom: 16px;
  box-sizing: border-box;
}

.buttons {
  display: flex;
  justify-content: space-between;
}

button {
  padding: 10px;
  cursor: pointer;
  background-color: #4caf50;
  color: white;
  border: none;
  border-radius: 5px;
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
    left: 565px; /* Adjust the left position as needed */
    top: 22px; /* Adjust the top margin as needed */
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

  <form id="employeeForm" method="post" enctype="multipart/form-data" action="submit_form_job.php">
    <img src="../hr/assets/theme/Logo.png" alt="Company Logo" style="max-width: 30%; height: auto;">
    <h2>Job Details Form</h2>

         <form action="submit_job.php" method="post" id="employeeForm">

    <label for="epfNo">EPF No:</label>
    <input type="text" id="epfNo" name="epfNo" required>

    <label for="etfNo">ETF No:</label>
    <input type="text" id="etfNo" name="etfNo" required>

    <label for="employeeGrade">Employee Grade:</label>
    <select id="employeeGrade" name="employeeGrade" required>
      <option value="Intern">Intern</option>
      <option value="Assistant">Assistant</option>
      <option value="Junior Executive">Junior Executive</option>
      <option value="Executive">Executive</option>
      <option value="Executive">Senior Executive</option>
      <option value="Executive">Assistant Manager</option>
      <option value="Executive">Manager</option>
      <option value="Executive">Senior Manager</option>
      <option value="Executive">Director</option>
      <option value="Executive">Chief Officer</option>
    </select>

    <label for="serviceType">Service Type:</label>
    <select id="serviceType" name="serviceType" required>
      <option value="Fixed Term Contract">Fixed Term Contract</option>
      <option value="Contract">Contract</option>
      <option value="Probation">Probation</option>
      <option value="Permanent">Permanent</option>
    </select>

    <label for="startDate">Start Date:</label>
    <input type="date" id="startDate" name="startDate" required>

    <label for="endDate">End Date:</label>
    <input type="date" id="endDate" name="endDate">

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

  
<script>
    function submitForm() {
  // You can add form submission logic here
  alert("Form submitted!");
}

function cancelForm() {
  // You can add cancel logic here
  document.getElementById("employeeForm").reset();
}

</script>  
</body>
</html>
