<?php
include 'config/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>User Information Form</title>

    <style>
        /* Add this CSS to your existing styles.css file */
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
    </style>
</head>
<body>
    <div class="form-container">
        <img src="../hr/assets/theme/Logo.png" alt="Company Logo" style="max-width: 30%; height: auto;">
        <h2>Personal Details Form</h2>
        <form id="userInfoForm" method="post"  action="personal_details_submit.php">
            <!-- Other Name, Email, Nationality -->
            <div class="form-group">
                <label for="otherName">Other Name:</label>
                <input type="text" id="otherName" name="otherName" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="nationality">Nationality:</label>
                <select id="nationality" name="nationality" required>
                    <option value="srilanka">Sri Lanka</option>
                    <option value="india">India</option>
                </select>
            </div>

            <!-- Civil Status, Religion, Blood Group -->
            <div class="form-group">
                <label for="civilStatus">Civil Status:</label>
                <select id="civilStatus" name="civilStatus" required>
                    <option value="married">Married</option>
                    <option value="unmarried">Unmarried</option>
                </select>
            </div>
            <div class="form-group">
                <label for="religion">Religion:</label>
                <select id="religion" name="religion" required>
                    <option value="buddhist">Buddhist</option>
                    <option value="tamil">Tamil</option>
                    <option value="muslim">Muslim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bloodGroup">Blood Group:</label>
                <select id="bloodGroup" name="bloodGroup" required>
                    <option value="o+">O+</option>
                    <option value="ab">AB</option>
                    <option value="o-">O-</option>
                </select>
            </div>

            <!-- District, Profile Image Upload -->
            <div class="form-group">
                <label for="district">District:</label>
                <select id="district" name="district" required>
                    <option value="colombo">Colombo</option>
                    <option value="matara">Matara</option>
                    <option value="kalutara">Kalutara</option>
                </select>
            </div>
            <div class="form-group">
                <label for="profileImage">Profile Image:</label>
                <input type="file" id="profileImage" name="profileImage" accept="image/jpeg, image/png" required>
                <small>(Max file size: 1MB, Image types: JPG, PNG)</small>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit">Save Changes</button>
                 <button type="button" class="btn-cancel" onclick="cancelForm()">Cancel</button>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>