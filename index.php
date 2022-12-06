<?php
session_start();
 include('connect.php');
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$failed="";

if (isset($_POST['login'])) 
{
	$email=$_POST["username"];
	$password=$_POST["password"];
	$sql = "SELECT * FROM register where r_name='$email' && r_password='$password'";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) 
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
               $_SESSION["securpin"]=$row["r_id"];
               if(isset($_SESSION["securpin"])) 
               {
               		header('location: dashboard.php');
               }
			}
		}
if (mysqli_query($mysqli, $sql)) 
{
	$failed="<div class='warndiv'><p class='warnlogin'><i class='fas fa-skull-crossbones'></i>Invalid e-mail/password</p></div>";
} 
else 
{
	header('location: index.php');
}  
}
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://kit.fontawesome.com/f52c5f8429.js" crossorigin="anonymous"></script>
	<title>Medical Stock Entry: LogIn</title>
</head>
<body class="backgroundimg">
	<div class="loginbox">
		<form action="" method="post">
		<h1>LOG IN</h1>
		<p class="lblinput">Username</p>
		<input type="text" name="username" class="btninput" placeholder="Enter Username" required><br><br>
		<p class="lblinput">Password</p>
		<input type="password" name="password" class="btninput" placeholder="Enter Password" required><br>
		<input type="submit" name="login" value="Log In" class="btnlogin">
		<?php echo $failed; ?>
		</form>
	</div>
</body>
</html>