<?php 
include "includes/header.php";
?>


    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 120px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
    
    </style>
</head>
<body>
    <div class="container">
        <h2>History</h2>
        <table>
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Address</th>
                    <th>Status</th>
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
            

                $sql = "SELECT * FROM tbl_request";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $counter = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $counter . '</td>';
                        echo '<td>' . $row['date'] . '</td>';
                        echo '<td>' . $row['trust_name'] . '</td>';
                        echo '<td>' . $row['Trust_description'] . '</td>';
                        echo '<td>' . $row['quantity'] . '</td>';
                        echo '<td>' . $row['address'] . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                        echo '</tr>';
                        $counter++;
                    }
                } else {
                    echo '<tr><td colspan="5">No records found</td></tr>';
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
