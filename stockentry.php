<?php
session_start();
include('connect.php');
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

 
$sql = "SELECT * FROM register where r_id='" . $_SESSION["securpin"] . "'";
         $result = mysqli_query($mysqli, $sql);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               $name=$row["r_name"];
               $password=$row["r_password"];
                       }
         } else {
             header('location: index.php');
         } 
?>
<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$success="";
$fail="";
if (isset($_POST["enter"])) {

$medname=$_POST["medname"];
$qty=$_POST["qty"];
$rate=$_POST["rate"];
$batch=$_POST["batch"];
$expiry=$_POST["expiry"];
$category=$_POST["category"];


$sql="INSERT INTO `stock`(`s_medname`, `s_qty`, `s_price`, `s_batch`, `s_expiry`, `s_category`, `s_time`, `s_status`) VALUES
('$medname','$qty','$rate','$batch','$expiry','$category',now(),'Available')";


if (mysqli_query($mysqli, $sql)) {
             $success="<p class=''>Added successfully</p>";
            } 
            else
            {
               $fail="<p class=''>Error</p>";
            }
            $mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="style.css">
   <script src="https://kit.fontawesome.com/f52c5f8429.js" crossorigin="anonymous"></script>
   <title>Medical Stock Entry: Dashboard</title>
</head>
<body>
   <?php include('header.php'); ?>
   <h1 class="clrblk">Stock Entry</h1>
   <div class="stockmaindiv" align="center">
      <form accept="" method="post">
         <div class="divstbox1">
            <p class="inputlbl">Medicine Name</p>
            <input type="text" name="medname" class="inputstock" placeholder="Enter Medicine Name Here" required>
            <p class="inputlbl">Quantity</p>
            <input type="number" name="qty" class="inputstock" placeholder="Enter Quantity in Units Here" required>
         </div>
         <div class="divstbox1">   
            <p class="inputlbl">Rate Per Unit</p>
            <input type="number" name="rate" class="inputstock" placeholder="Enter Rate per Unit Here" required>
            <p class="inputlbl">Batch No</p>
            <input type="text" name="batch" class="inputstock" placeholder="Enter Batch Code Here" required>
         </div>
         <div class="divstbox1"> 
            <p class="inputlbl">Expiry Date</p>
            <input type="date" name="expiry" class="inputstock" placeholder="" required>       
            <p class="inputlbl" >Category Name</p>
            <select class="selectinputstock" name="category" required>
               <option value="">--Select any One--</option>
               <option value="Tablet">Tablet</option>
               <option value="Syrups">Syrups</option>
               <option value="Ointments">Ointments</option>
               <option value="Injections">Injections</option>
               <option value="Other">Other</option>
            </select>
         </div>
         <input type="submit" name="enter" value="Submit" class="btnsubmit">  
         <?php 
            echo $success;
            echo $fail;
         ?>    
      </form>
   </div>
</body>
</html>