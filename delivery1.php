<?php 
include "includes/header.php";
?>
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'reefood_db';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$request_id = $_GET["id"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Successful</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #F3FCF8;
        }

        .success-message {
            background-color: #2ecc71;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .success-message h1 {
            font-size: 36px;
            margin: 0;
        }

        .success-message p {
            font-size: 18px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="success-message">
        <h1>Accepted Successful</h1>
        <p>Your order with ID <?php echo $request_id; ?> has been successfully processed.</p>
    </div>
  