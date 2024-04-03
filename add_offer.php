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


$Name= $_POST['name'];
$Description = $_POST['description'];
     $FoodQuantity = $_POST['FoodQuantity'];

     $Date = $_POST['Date'];
     $code = $_POST['code'];
     $Address = $_POST['Address'];
     

    

     $sql = "INSERT INTO offer (Name,Description,FoodQuantity,Date,code,Address) VALUES('$Name','$Description','$FoodQuantity','$Date','$code','$Address')";
	 

if ($conn->query($sql) === TRUE) {
  
  echo "<script type='text/javascript'>alert('Offer Added');window.location.href='requestfood.php';</script>";
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
