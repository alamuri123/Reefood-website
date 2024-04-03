<?php 
include "includes/header.php";
?>
<?php
session_start();
 
// Establish your database connection here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reefood_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch room details from the database (replace 'your_table_name' with your actual table name)
// $sql = "SELECT name, email, phone  FROM signup WHERE id = '" . $_SESSION['id'] . "'";
$sql = "SELECT fullname, phonenumber, email FROM signup WHERE id = '" . $_SESSION['id'] . "'";

$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch and display room details
    $rows = $result->fetch_assoc();
    $fullname = $rows["fullname"];
    $phonenumber = $rows["phonenumber"];
    $email = $rows["email"];
} else {
    // Handle the case where no data is found
    $fullname = "N/A";
    $phonenumber = "N/A";
    $email = "N/A";
}

// Close the database connection
$conn->close();
?>


<style>
        /* Apply styles to the form wrapper */
        .wrapper {
            margin-top:70px;
    text-align: center;
    border-radius: 10px;
    border: 2px solid #999;
    box-shadow: ;
   padding:20px;
    margin-top: 0px;
}
.wrapper form {
    display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: space-between;
    flex-wrap: wrap;
    
}

        /* Style the form title */
        .title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Style form input rowss */
        .rows {
            display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: nowrap;
  padding:20px;
  
    flex-direction: row;
    justify-content: center;
    margin-bottom:10px;
}

        /* Style input icons */
        .rows i {
            font-size: 18px;
            margin-right: 10px;
            color: #3CC78F;
            padding: 10px;
        }

        /* Style form input fields */
        input[type="text"] {
            height: 100%;
            width: 100%;
            border: 2px solid #999;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        /* Style the submit button */
       
        .row1.button input[type="submit"] {
            background-color: #3CC78F;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .row1.button input[type="submit"]:hover {
            background-color: #999;
        }

        /* Add some spacing between the button and the input fields */
        .rows.button {
            margin-top: 15px;
        }

        /* Center the form on the page */
        .container1 {
            display: flex;
            justify-content: center;
            align-items: center;
          
        }
        .wrapper form .rows  {
    width: 100%;
  
    font-size: 16px;
    transition: all 0.3s ease;
}
body {
    font-family: "Yeseva One", cursive;
    font-weight: normal;
    font-style: normal;
    background-color: #F3FCF8;
}










    </style>
</head>
<body>




<div class="container">
            <div class="rows justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Profile</span></h3>
                    </div>
                </div>
            </div>
<div class="container1">
    <div class="wrapper">
        <form class="forms">
            <div class="rows">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="User Name" value="<?php echo $fullname; ?>" readonly>
            </div>
            <div class="rows">
                <i class="fas fa-mobile"></i>
                <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $phonenumber; ?>" readonly>
            </div>
            <div class="rows">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" readonly>
            </div>
            <!-- ... (your existing HTML code) ... -->

<!-- <script>
    function redirectToSignup(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Perform any necessary validation or actions here

        // Redirect to the desired location
        window.location.href = '../ChatApp/index.php';
    }
</script> -->

<!-- ... (your existing HTML code) ... -->
<!-- 
<div class="row1 button">
    <input type="submit" value="Join a community" onclick="redirectToSignup(event)">
</div> -->

<!-- ... (your existing HTML code) ... -->

        </form>
    </div>
</div>

