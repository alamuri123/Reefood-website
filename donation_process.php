<?php
// Include your database connection file and define getTotalFunds() and updateTotalFunds() functions
include_once "includes/db_connection.php";

// Get the donation amount from the form
$donationAmount = $_POST['donationAmount'];

// Update the total amount donated in the database
updateTotalFunds($donationAmount);

// Return the updated total funds
echo getTotalFunds();
?>
