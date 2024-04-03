<?php
 $servername = "localhost";

    $username = "root";

    $password = "";

    $dbname = "reefood_db"; 
	
	$message = "Register successful";
	
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$fullname= $_POST['fullname'];
$phonenumber = $_POST['phonenumber'];
     $email = $_POST['email'];

     $password = $_POST['password'];

     $confirmpassword = $_POST['confirmpassword'];

     $sql = "INSERT INTO signup(fullname,phonenumber,email, password,confirmpassword) VALUES('$fullname','$phonenumber','$email','$password','$confirmpassword')";
	 

if ($conn->query($sql) === TRUE) {
  
  echo "<script type='text/javascript'>alert('$message');window.location.href='login.php';</script>";
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>