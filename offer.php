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
      margin: 75px auto;
      max-width: 400px;
      width:100%;
     padding:10px;
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .title {
      width:100%;
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
    width: 100%;
    padding: 10px;

    border: 1px solid #ccc;
    border-radius: 15px;
}

    form input[type="submit"] {
      background-color:  #3CC78F;
      color: #000;
      font-size: 20px;
      border: none;
      padding: 15px 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
      cursor: pointer;
    }

    form input[type="submit"]:hover {
      background-color: #3CC78F;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="title">Donate Food</div>
    <form action="add_offer.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br><br>
      <label for="name">Description:</label>
      <input type="text" id="name" name="description" required><br><br>
      
      <label for="foodquantity">Food Quantity(per members):</label>
      <input type="text" id="Description" name="FoodQuantity" required><br><br>
      <label for="foodquantity">Address:</label>
      <input type="text" id="Description" name="Address" required><br><br>
      
      <label for="date">Date:</label>
      <input type="date" id="date" name="Date" required><br><br>
      <label for="code">code:</label>
      <input type="text" id="date" name="code" required><br><br>
      
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>


