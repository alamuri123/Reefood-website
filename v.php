<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Realtime Chat App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wrapper {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .wrapper header {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .field {
            margin-bottom: 20px;
            text-align: left;
        }

        .field label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .field input[type="text"],
        .field input[type="password"],
        .field input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .field input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .link {
            margin-top: 20px;
            color: #888;
        }

        .link a {
            color: #007bff;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
  <div class="wrapper">
    <header>Realtime Chat App</header>
    <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="field">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" placeholder="Enter your first name" required>
        </div>
        <div class="field">
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" placeholder="Enter your last name" required>
        </div>
        <div class="field">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="field">
            <label for="image">Select Image:</label>
            <input type="file" id="image" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field">
            <input type="submit" name="submit" value="Continue to Chat">
        </div>
    </form>
    <div class="link">Already signed up? <a href="login.php">Login now</a></div>
  </div>

<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "reefood_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Assuming you want to store the image filename in the database
    $image = $_FILES['image']['name'];

    $sql = "INSERT INTO users (fname, lname, email, password, img, status)
            VALUES ('$fname', '$lname', '$email', '$password', '$image', 'active')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

</body>
</html>
