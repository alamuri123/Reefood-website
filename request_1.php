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

 $Date= $_POST['Date'];
 $Trustname= $_POST['Trustname'];

$Trustdescription = $_POST['Trustdescription'];
$Address= $_POST['Address'];
     $Quantity = $_POST['Quantity'];
     $code= $_POST['code'];

     

     

    

     $sql = "INSERT INTO tbl_request (date,trust_name,Trust_description,Address,quantity,code) VALUES('$Date','$Trustname','$Trustdescription','$Address','$Quantity','$code')";
	 

if ($conn->query($sql) === TRUE) {
  
  echo "<script type='text/javascript'>alert('Request Added');window.location.href='requestfood.php';</script>";
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>