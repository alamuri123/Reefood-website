
<?php 
include "includes/header.php";
?>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <style>
        /* Your CSS styles here */
        html, body {
            display: grid;
            height: 100%;
            width: 100%;
            place-items: center;
            background-color: #F3FCF8;
            align-items: start;
        }

        .section_padding {
            padding-top: 50px;
            padding-bottom: 0px;
            margin-bottom: 10px;
        }
        .container {
    width: 80%;
    margin: 0 auto;
    text-align: center; /* Added property to center-align content */
}

.row {
    display: flex;
    justify-content: center;
}


        

        .row {
            display: flex;
            justify-content: center;
        }

        .section_title {
            text-align: center;
        }

        table {
            margin-top: 70px;
            width: 90%;
            border-collapse: collapse;
            margin-bottom: 100px;
        }

        th, td {
            border: 1px solid #999;
            text-align: center;
            font-weight: 500;
            color: white;
        }

        td {
            text-decoration: none;
            font-weight: 300;
            color: black;
        }

        th {
            background-color: #800080;
        }

        .accept-button, .reject-button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        .accept-button {
            background-color: green;
            color: white;
        }

        .reject-button {
            background-color: red;
            color: white;
        }
    </style>
    <script>
        function hideAcceptedOrder(orderId) {
            var orderRow = document.getElementById('orderRow-' + orderId);
            if (orderRow) {
                orderRow.style.display = 'none';
            }
        }
    </script>
</head>
<body>

<div class="section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section_title" style="width :30% !important">
                <h3><span>Status Check</span></h3>
            </div>
        </div>
    </div>
</div>

<table>
    <thead>
    <tr>
        <th>Order Number</th>
        <th>Date</th>
        <th>Name</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Order Status</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Replace the database connection code with your own
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'reefood_db';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to select accepted requests
    $sql = "SELECT * FROM tbl_request WHERE status = 'accepted'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr id="orderRow-' . $row['id'] . '">';
            echo '<td>' . $row['id'] . '</td>';
            if ($row['status'] == 'accepted') {
                echo '<td>' . $row['date'] . '</td>';
            } else {
                echo '<td></td>';
            }
            echo '<td>' . $row['trust_name'] . '</td>';
            echo '<td>' . $row['Trust_description'] . '</td>';
            echo '<td>' . $row['quantity'] . '</td>';
            echo '<td>';
            echo '<button class="accept-button" onclick="hideAcceptedOrder(' . $row['id'] . '); window.location.href=\'delivery1.php?id=' . $row['id'] . '\'">Check</button>';
            echo '</td>';
            echo '</tr>';
        }
    }
    ?>
    </tbody>
</table>

</body>
</html>
