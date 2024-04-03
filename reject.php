<?php 
include "includes/config.php";
	$conn->query("DELETE FROM `tbl_request` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	header("location:fooditems.php");