<?php
include('connect.php');

$deleteid=$_GET["del"];

$query = "DELETE FROM stock WHERE s_id='$deleteid' LIMIT 1";
$result = mysqli_query($mysqli,$query) or die ( mysqli_error());
header("Location: dashboard.php"); 
?>