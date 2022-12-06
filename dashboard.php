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
   <h1 class="clrblk">Stock Search</h1>
      <div class="divboxsearch">
         <form action="" method="GET">
            <input type="search" name="searchmed" placeholder="Search here..." class="searchbar" value="<?php if(isset($_GET['searchmed'])){echo $_GET['searchmed'];}?>">
            <input type="submit" name="searchsubmit" class="searchbar searchbtn" value="Search">
         </form>
      </div>
      <table>
         <thead>
            <tr>
               <td>Sl.No</td>
               <td>Name of Medicine</td>
               <td>Quantity</td>
               <td>Per Unit Price</td>
               <td>Batch</td>
               <td>Expiry</td>
               <td>Category</td>
               <td>Availability</td>
               <td></td>
            </tr>
         </thead>
         <tbody>
         <?php
         $count=1;
         if(isset($_GET['searchmed']))
         {
            $filtervalues=$_GET['searchmed'];
            $query="SELECT * FROM stock WHERE concat(s_medname,s_qty,s_price,s_batch,s_expiry,s_category) LIKE '%$filtervalues%' && s_status='Available'";
            $result1 = mysqli_query($mysqli, $query);
               if (mysqli_num_rows($result1) > 0) 
               {
                  foreach ($result1 as $row) 
                  {
                     echo "<tr><td>".$count."</td>
                     <td>".$row['s_medname']."</td>
                     <td>".$row['s_qty']."</td>
                     <td>".$row['s_price']."</td>
                     <td>".$row['s_batch']."</td>
                     <td>".$row['s_expiry']."</td>
                     <td>".$row['s_category']."</td>
                     <td>".$row['s_status']."</td>
                     <td><a href='edit.php?edit=$row[s_id]' class='tda'>Edit</a>
                     <a href='delete.php?del=$row[s_id]' onClick=\"return confirm('Are you SURE DELETE this RECORD?')\" class='tda tda1'>Delete</a></td></tr>";
                     $count++;  
                  }
               } 
               else 
               {
                  // echo "<td colspan='7'>No Records Found</td>";
                  header('location: stockentry.php');
               }
         }
         else
         {
            $sql1 = "SELECT * FROM stock WHERE s_status='Available'";
            $result = mysqli_query($mysqli, $sql1);
            if (mysqli_num_rows($result) > 0) 
            {
               while($row = mysqli_fetch_assoc($result)) 
               {
                  echo "<tr><td>".$count."</td>
                  <td>".$row['s_medname']."</td>
                  <td>".$row['s_qty']."</td>
                  <td>".$row['s_price']."</td>
                  <td>".$row['s_batch']."</td>
                  <td>".$row['s_expiry']."</td>
                  <td>".$row['s_category']."</td>
                  <td>".$row['s_status']."</td>
                  <td><a href='edit.php?edit=$row[s_id]' class='tda'>Edit</a>
                  <a href='delete.php?del=$row[s_id]' onClick=\"return confirm('Are you SURE DELETE this RECORD?')\" class='tda tda1'>Delete</a></td></tr>";
                  $count++;
                  }
               }  
            else 
            {
               echo "<tr><td>No Data</td></tr>";
            }
            }
?>
         </tbody>
      </table>
</body>
</html>
