<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            padding: 10px;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #ef10de;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            font-weight: bold;
            color: #ef10de;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #ef10de;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ef10de;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e7f5e6;
            border-left: 5px solid #4CAF50;
            border-radius: 5px;
            font-size: 18px;
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 20px;
            }

            input[type="submit"] {
                font-size: 14px;
                padding: 10px;
            }

            input[type="text"],
            input[type="date"] {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>FORM TO WELCOME YOU HOME</h1>
        <form method="POST" action="">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="address">Home Address:</label>
            <input type="text" id="address" name="address" required>

            <input type="submit" value="Submit">
        </form>

        <?php
        function computeAge($dob) {
            $birthDate = new DateTime($dob);
            $currentDate = new DateTime();
            $interval = $currentDate->diff($birthDate);
            return $interval->y;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
            $dob = $_POST['dob'];
            $address = htmlspecialchars(strip_tags(trim($_POST['address'])));

            $age = computeAge($dob);
            echo "<div class='result'>$name, welcome back to your home at $address. You are now $age years old!</div>";
        }
        ?>
    </div>

</body>
</html>
