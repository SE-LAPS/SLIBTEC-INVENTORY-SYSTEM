<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
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
        }

        textarea {
            resize: vertical;
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
        <h2>Contact Form</h2>
        <form action="process.php" method="post">
            <label for="name">Full Name:</label>
            <textarea name="name" rows="2" cols="15" required></textarea>

            <label for="email">Email:</label>
            <textarea name="email" rows="2" cols="15" required></textarea>

            <label for="phone">Phone No:</label>
            <textarea name="phone" rows="2" cols="15" required></textarea>

            <label for="message">Your Message:</label>
            <textarea name="message" rows="5" required></textarea>

            <div class="button-group">
                <button type="submit" name="submit">Submit</button>
                <a href="dashboard.php">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
