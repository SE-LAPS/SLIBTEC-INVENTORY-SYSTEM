<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Room Reservation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            animation: fadeInBackground 2s ease-in-out;
        }

        @keyframes fadeInBackground {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid blueviolet;
            border-radius: 5px;
            background-color: rgba(0, 128, 0, 0.7); /* Add a semi-transparent background */
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
            color: white;
        }

        textarea {
            resize: vertical;
        }

        select,
        input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            background-color: lightseagreen;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: #333;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        h2 {
            color: white;
            text-align: center;
        }
    </style>
</head>
<body style="background-image: url('../admin/assets/img/theme/bk1.jpg');">
    <br><br>
    <div class="container">
        <h2>Meeting Room Reservation Form</h2>
        <form action="processboard.php" method="post">
            <label for="name">Full Name:</label>
             <input type="text" name="name" required>

            <label for="staff_id">Staff ID:</label>
            <input type="text" name="staff_id" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

           

            <label for="room">Choose a Room:</label>
            <select name="room" required>
                <option value="Guanine Block">Guanine Block</option>
                <option value="Adenine Chamber">Adenine Chamber</option>
                <option value="Cytosine Cave">Cytosine Cave</option>
            </select>

            <label for="department">Department:</label>
            <input type="text" name="department" required>

            <label for="agenda">Brief Description of Meeting Agenda:</label>
            <textarea name="agenda" rows="5" required></textarea>

            <div class="button-group">
                <button type="submit" name="submit">Submit</button>
                <a href="dashboard.php">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
