

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
    background-color:#F3FCF8;
    align-items: start;
}

    table {
margin-top:50px;
      width: 90%;
      border-collapse: collapse;
      margin-bottom: 100px;
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
    
    

.menu1 {
    display: flex;
    flex-wrap: wrap;
    text-align: center;
    font-weight: bold;
    height: 30px;
    color: white;
    margin-top: 20px;
    font-size: 23px;
    gap: 80px;
    font-family: 'montserrat', sans-serif;
}
.menu1 a {
    background-color: #3CC78F;
    width: 100%;
    color: #fff;
    border-radius: 5px;
    font-weight: 600;
    display: flex;
    justify-content: center;
    flex-direction: column;
    margin: 10px;
}
.accept-button, .reject-button {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin-bottom: 10px;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    margin-right: 10px;
}
    
          .accept-button {
              background-color: green;
              color: white;
          }

  </style>
</head>
<body>


<div class="section_padding" style=" padding-top: 50px;padding-bottom:0px;margin-bottom:10px;">
        <div class="container">
            <div class="row justify-content-center">  
                    <div class="section_title text-center ">
                        <h3><span>Food Items</span></h3>
                    </div>
                </div>
        </div>
    </div>
<div class="menu1">
    <div>
      <a href="#offers" onclick="window.location.href='offer.php'">Donate</a>
</div>
<div>
    <a href="#requests" onclick="window.location.href='rfood.php'">Request</a>
  </div>
    </div>
  
 
   </div>

  
<table>
  <thead>
    <tr>
      <th>S.NO</th>
      <th>DATE</th>
      <th>NAME </th>
      <th>DESCRIPTION</th>
      <th>QUANTITY</th>
      <th>ADDRESS</th>
      <th>CODE</th>
      <th>ACTION</th>


    </tr>
  </thead>
  <tbody>
  <?php
        // Database connection
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'reefood_db';

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to select all images from the table
        $sql = "SELECT * FROM offer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Retrieve the image data
                $id = $row['id'];
                $date = $row['Date'];
                $name = $row['Name'];
                $Description = $row['Description'];
                $FoodQuantity = $row['FoodQuantity'];
                $Address = $row['Address'];
                $code = $row['code'];

               

                // Generate the HTML for each image with Bootstrap card styling
                echo '<div class="col-sm-6 col-md-3">';
                echo '<tr>';
                echo '<td>'.$id.'</td>';
                echo '<td>'.$date.'</td>';
                echo '<td>'.$name.'</td>';
                echo '<td>'.$Description.'</td>';
                echo '<td>'.$FoodQuantity.'</td>';
                echo '<td>'.$Address.'</td>';
                echo '<td>'.$code.'</td>';
                echo '<td><button class="accept-button" onclick="window.location.href=\'additems.php?id='.$row['id'].'\'">Request items</button></td>';
             echo '</tr>';
            }
        } else {
            echo 'No data is avaliable';
        }

        $conn->close();
        ?>
  </tbody>
</table>
