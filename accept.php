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



// Query to get the food quantity from the request
$requestQuantitySQL = "SELECT * FROM tbl_request WHERE id = $request_id";
$requestQuantityResult = $conn->query($requestQuantitySQL);
$row = $requestQuantityResult->fetch_assoc();
$requestQuantity = $row['quantity'];
$code = $row['code'];


// Query to get the food quantity from the offer
$offerQuantitySQL = "SELECT FoodQuantity FROM offer WHERE code = '$code'";
$offerQuantityResult = $conn->query($offerQuantitySQL);
$row = $offerQuantityResult->fetch_assoc();
$offerQuantity = $row['FoodQuantity'];
// Calculate the updated quantity
$updatedQuantity = $offerQuantity - $requestQuantity;

// Update the tbl_request with the updated quantity
$updateRequestQuantitySQL = "UPDATE tbl_request SET status = 'accepted' WHERE id = $request_id";
$conn->query($updateRequestQuantitySQL);

$updateofferQuantitySQL = "UPDATE offer SET FoodQuantity = $updatedQuantity WHERE code = '$code'";
$conn->query($updateofferQuantitySQL);
// Close the database connection


// Redirect or do other operations as needed
?>


<?php 
include "includes/header.php";
?>
<style>
         html, body {
            display: grid;
            height: 88%;
            width: 100%;
            place-items: center;
            background-color: #F3FCF8;
            /* background: linear-gradient(-135deg, #c850c0, #4158d0); */
            align-items: start;
         }
         .items {
            font-weight: bold;
            color: white;
            font-size: 40px;
            font-family: 'montserrat', sans-serif;
         }
         table {
            width: 90%;
            border-collapse: collapse;
            margin-bottom: 400px; /* Adjusted margin to fit the button */
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
        
         .button-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: calc(14% - 40px);
         }  /* Adjusted width to match table width */
         
         .accept-button, .reject-button {
            display: block;
            width: 100%;
            margin-bottom: 10px; /* Adjust the margin between buttons */
            padding: 10px 15px;
            border: none;
            cursor: pointer;
         }
         .accept-button {
            background-color:#A36E4A ;
            color: white;
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
   </head>
   <div class="section_padding" style=" padding-top: 50px;padding-bottom:0px;margin-bottom:10px;">
        <div class="container">
            <div class="row justify-content-center">  
                    <div class="section_title text-center ">
                        <h3><span>Accepted Info</span></h3>
                    </div>
                </div>
        </div>
    </div>
   <body>
   
     
      <table>
         <thead>
            <tr>
               <th>S.NO</th>
               <th>DATE</th>
               <th>NAME </th>
               <th>DESCRIPTION</th>
               <th>QUANTITY</th>
            </tr>
            <?php



 // Query to select all images from the table
 $sql = "SELECT * FROM tbl_request WHERE status = 'accepted'";
$result = $conn->query($sql);




            if ($result->num_rows > 0) {
            // Assume $requestData is an array containing request data
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['date'].'</td>';
                echo '<td>'.$row['trust_name'].'</td>';
                echo '<td>'.$row['Trust_description'].'</td>';
                echo '<td>'.$row['quantity'].'</td>';
              
                echo '</tr>';
            }
         }
         ?>
         </tbody>
      </table>
     
   </body>
</html>
