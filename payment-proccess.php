<?php
     
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reefood_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the payment information from the POST request
$payment_id = $_POST['razorpay_payment_id'];
$amount = $_POST['totalAmount'];
$product_id = $_POST['product_id'];

// Prepare SQL statement to insert data into the orders table
$sql = "INSERT INTO orders (payment_id, amount, product_id) VALUES (?, ?, ?)";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind parameters to the statement
$stmt->bind_param("sss", $payment_id, $amount, $product_id);

// Execute the statement
if ($stmt->execute()) {
    // If insertion is successful, return success message
    $response = array('msg' => 'Payment successfully credited', 'status' => true);
    echo json_encode($response);
} else {
    // If insertion fails, return error message
    $response = array('msg' => 'Error: Unable to insert data into the database', 'status' => false);
    echo json_encode($response);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
