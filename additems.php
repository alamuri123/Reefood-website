<?php 
include "includes/header.php";
?>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #F3FCF8;
      padding: 20px;
    }

    .wrapper {
    margin: 0 auto;
    max-width: 400px;
    margin-top: 75px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

    .title {
      font-size: 35px;
      font-weight: 600;
      text-align: center;
      line-height: 100px;
      color: #fff;
      user-select: none;
      border-radius: 15px 15px 0 0;
      background: #3CC78F;
      margin-bottom: 20px;
    }

    form label {
      display: block;
      font-size: 18px;
      margin-bottom: 5px;
    }
    form input {
    width: 91%;
    padding: 14px;
    margin-bottom: 19px;
    border: 1px solid #A36E4A;
    border-radius: 18px;
}

    form input[type="Request"] {
      background-color: #3CC78F;
      color: #fff;
      font-size: 18px;
      border: none;
      padding: 15px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    form input[type="Request"]:hover {
      background-color: #A36E4A;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="title">Request FoodItems</div>
    <form action="request_1.php" method="post">
    <label for="date">Date:</label>
      <input type="date" id="date" name="Date" required><br><br>
      
      <label for="name">Name of Trust:</label>
     
      <input type="text" id="name" name="Trustname" required><br><br>
      <label for="name"> Trust Description:</label>
      <input type="text" id="name" name="Trustdescription" required><br><br>
      
      <label for="Address">Address:</label>
      <input type="text" id="Address" name="Address" required><br><br>
      
      <label for="foodquantity">Food Quantity(per members):</label>
      <input type="text" id="foodquantity" name="Quantity" required><br><br>

      <label for="foodquantity"  >Code:</label>
      <input type="text" id="code" name="code" required><br><br>
      
       
      
      
      <input type="submit" style=" background: #3CC78F;" value="Request">
    </form>
  </div>
</body>
</html>

