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
      background-image: url('../hr/assets/theme/bk3.jpg');
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

    .checkbox-group {
      margin-bottom: 16px;
    }

    .checkbox-group label {
      display: block;
      margin-bottom: 10px;
    }

    .checkbox-group input {
      margin-right: 8px;
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
 .official-use {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center; /* Adjust this property to control vertical alignment */
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
      left: 565px;
      top: 106px;
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

    .form-container {
      position: relative;
    }
  </style>
</head>
<body>
  <form id="employeeForm" method="post" enctype="multipart/form-data" action="submit_form_job.php">
    <img src="../hr/assets/theme/Logo.png" alt="Company Logo" style="max-width: 30%; height: auto;">
    <h2>Complex Roster</h2>

    <div class="official-use">

            <label class="radio-label" for="approved">Group</label>
            <input type="radio" id="approved" name="officialUse" value="">

            <label class="radio-label" for="rejected">Department</label>
            <input type="radio" id="rejected" name="officialUse" value="">

             <label class="radio-label" for="rejected">Employee</label>
            <input type="radio" id="rejected" name="officialUse" value="">
        </div>
    <label for="employeeGroup">Employee Group:</label>
    <select id="employeeGroup" name="employeeGroup">
      <option value="permanent">Permanent</option>
      <option value="contract">Contract</option>
      <option value="probation">Probation</option>
      <option value="intern">Intern</option>
    </select>

    <label for="rosterFrom">Roster From:</label>
    <input type="date" id="rosterFrom" name="rosterFrom" required>

    <label for="rosterTo">Roster To:</label>
    <input type="date" id="rosterTo" name="rosterTo" required>

    <div class="form-group">
      <button type="submit">Load</button>
      <button type="button" class="btn-cancel" onclick="clearForm()">Clear</button>
      <a href="dashboard.php" class="back round">&#8249;</a>
    </div>

    <script>
      function clearForm() {
        var form = document.getElementById('employeeForm');
        form.reset();
      }
    </script>
  </form>

  <script>
    function submitForm() {
      alert("Form submitted!");
    }

    function cancelForm() {
      document.getElementById("employeeForm").reset();
    }
  </script>
</body>
</html>
