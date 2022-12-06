<?php
session_start();

if (session_status() == PHP_SESSION_ACTIVE) { session_destroy();header('location: index.php'); } 
else {
	echo "LOGOUT ERROR";
}


?>