<?php include('connect.php');
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

$editid=$_GET["edit"];

$sql = "SELECT * FROM stock where s_id='$editid' LIMIT 1";
         $result = mysqli_query($mysqli, $sql);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            	$medname=$row['s_medname'];
            	$qty=$row['s_qty'];
               $rate=$row['s_price'];
               $batch=$row['s_batch'];
               $expiry=$row['s_expiry'];
               $category=$row['s_category'];
            }
         } else {
            echo "invalid";
         }

if(isset($_POST["enter"])) { 
$medname=$_POST["medname"];
$qty=$_POST["qty"];
$rate=$_POST["rate"];
$batch=$_POST["batch"];
$expiry=$_POST["expiry"];
$category=$_POST["category"];

$update = "UPDATE stock SET s_medname='".$medname."',s_qty='".$qty."', s_price='".$rate."', s_batch='".$batch."', s_expiry='".$expiry."',
s_category='".$category."' WHERE s_id='".$editid."'";
   
   if (mysqli_query($mysqli, $update)) {
      echo "Record updated successfully";
      header('location: dashboard.php');
   } else {
      echo "Error updating record: " . mysqli_error($mysqli);
   }
   mysqli_close($mysqli);
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
   <h1 class="clrblk">Stock Edit</h1>
   <p class="plink"><a href="dashboard.php" class="alink"><-Back To Dashboard</a></p>
   <div class="stockmaindiv" align="center">
      <form accept="" method="post">
         <div class="divstbox1">
            <p class="inputlbl">Medicine Name</p>
            <input type="text" name="medname" class="inputstock" value="<?php echo $medname; ?>">
            <p class="inputlbl">Quantity</p>
            <input type="number" name="qty" class="inputstock" value="<?php echo $qty; ?>">
         </div>
         <div class="divstbox1">   
            <p class="inputlbl">Rate Per Unit</p>
            <input type="number" name="rate" class="inputstock" value="<?php echo $rate; ?>">
            <p class="inputlbl">Batch No</p>
            <input type="text" name="batch" class="inputstock" value="<?php echo $batch; ?>">
         </div>
         <div class="divstbox1"> 
            <p class="inputlbl">Expiry Date</p>
            <input type="date" name="expiry" class="inputstock" value="<?php echo $expiry; ?>">       
            <p class="inputlbl" >Category Name</p>
            <select class="selectinputstock" name="category">
               <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
               <option value="Tablet">Tablet</option>
               <option value="Syrups">Syrups</option>
               <option value="Ointments">Ointments</option>
               <option value="Injections">Injections</option>
               <option value="Other">Other</option>
            </select>
         </div>
         <input type="submit" name="enter" value="Submit" class="btnsubmit">     
      </form>
   </div>
</body>
</html>