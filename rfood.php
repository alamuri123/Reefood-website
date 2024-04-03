
<?php 
include "includes/header.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>reefood</title>
      <link rel="stylesheet" href="style.css">
      <style>
          html, body {
              display: grid;
              height: 88%;
              width: 100%;
              place-items: center;
              background-color: #F3FCF8;
              align-items: start;
          }
        
         table {
            margin-top:70px;
            width: 90%;
            border-collapse: collapse;
            margin-bottom: 234px; /* Adjusted margin to fit the button */
         }
         .accept-button, .reject-button {
            display: block;
            width: 100%;
            margin-bottom: 10px; /* Adjust the margin between buttons */
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            margin-right:10px
         }
         .accept-button {
            background-color: green;
            color: white;
         }
         .reject-button {
            background-color: red;
            color: white;
         }
         th, td {
    border: 1px solid #999;
    text-align: center;
    font-weight: 500;
    color:white;
}
td{
  text-decoration:none;
  font-weight:300;
  color:black;

  
}
th {
    background-color: #800080;
}
        
         .leftmenu h4 {
            padding-left: 70px;
            font-weight: bold;
            color: white;
            font-size: 23px;
            font-family: 'montserrat', sans-serif;
         }
         .menu1{
  background-color: #A36E4A;
  border-radius:10px;
  color:#fff;
  text-align:center;
  height:50px;
  width:10%;
  padding:10px;
}
      </style>
     
   <div class="section_padding" style=" padding-top: 50px;padding-bottom:0px;margin-bottom:10px;">
        <div class="container">
            <div class="row justify-content-center">  
                    <div class="section_title text-center ">
                        <h3><span>Request Food</span></h3>
                    </div>
                </div>
        </div>
    </div>
   <body>
   </head>
   
   
      <table>
         <thead>
            <tr>
               <th>S.NO</th>
               <th>DATE</th>
               <th>NAME </th>
               <th>DESCRIPTION</th>
               <th>ADDRESS</th>
               <th>QUANTITY</th>
               <th>ACTION</th> <!-- Add a new header for the action column -->
            </tr>
         </thead>
         <tbody>
         <?php
          $db_host = 'localhost';
          $db_user = 'root';
          $db_pass = '';
          $db_name = 'reefood_db';
  
          $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
  
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
  
          // Query to select all images from the table
          $sql = "SELECT * FROM tbl_request WHERE status = 'NA'";
          $result = $conn->query($sql);
  
          if ($result->num_rows > 0) {
            // Assume $requestData is an array containing request data
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['trust_name'].'</td>';
                echo '<td>'.$row['Trust_description'].'</td>';
                echo '<td>'.$row['address'].'</td>';
                echo '<td>'.$row['quantity'].'</td>';
                echo '<td><button class="accept-button" onclick="window.location.href=\'accept.php?id='.$row['id'].'\'">Accept</button>';
                echo '<button class="reject-button" onclick="window.location.href=\'reject.php?id='.$row['id'].'\'">Reject</button></td>';
                echo '</tr>';
            }

            
         }else
         {
            echo '<tr>';
            echo '<td colspan="7" style="text-align: center;">No Records Found</td>';
            echo '</tr>'; 

         }
         ?>
         </tbody>
      </table>
  
  
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

// Assuming you have a user authentication system in place
if (isset($_SESSION['user_email'])) {
    $userEmail = $_SESSION['user_email'];

    $Name = $_POST['name'];
    $Description = $_POST['description'];
    $FoodQuantity = $_POST['FoodQuantity'];
    $Date = $_POST['Date'];
    $code = $_POST['code'];

    // Get user ID based on the email
    $userIdQuery = "SELECT id FROM users WHERE email = '$userEmail'";
    $userIdResult = $conn->query($userIdQuery);

    if ($userIdResult->num_rows > 0) {
        $row = $userIdResult->fetch_assoc();
        $userId = $row['id'];

        // Insert the offer data along with the user ID
        $sql = "INSERT INTO offer (user_id, Name, Description, FoodQuantity, Date, code) 
                VALUES ('$userId', '$Name', '$Description', '$FoodQuantity', '$Date', '$code')";

        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('Offer Added');window.location.href='requestfood.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "User ID not found for the given email.";
    }
} 


$conn->close();
?>
