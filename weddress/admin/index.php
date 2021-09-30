


<?php include '../config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
<link rel="stylesheet" href="styles.css">
    <title>Login Form</title>
</head>
<body>
<h1> Online Wed dress shop </h1>
<a href="index.php">  Admin Pannel!</a>
<a href="categoryManagement.php"> Category Management!</a>
<a href="addDress.php"> Add Dresses!</a>
<a href="viewDress.php"> view Dresses!</a>
<a href="viewFeedBacks.php"> view Feedback!</a>
<a href="../logout.php"> Logout!</a>
<br>
<br>
<div style="background-color:Orange; width:40%; height:200px;float:left; padding:10px; margine:10px;">
<?php
$result = mysqli_query($con, "select count(*)As Total_Customer from users  WHERE usertype='customer'"); 
$row = mysqli_fetch_assoc($result); 
$cus = $row['Total_Customer'];
echo "<br> <h2>Total Customers : ".$cus."</h2>";
 
        ?> 


</div>
<div style="background-color:SlateBlue; width:40%; height:200px;float:left; padding:10px; margine:10px;">
<?php
$result1 = mysqli_query($con, "SELECT count(dressid)As Total_Income FROM dress "); 
$row1 = mysqli_fetch_assoc($result1); 
$dress = $row1['Total_Income'];
echo "<br> <h2>Total dresses : ".$dress."</h2>";
 
        ?> 



</div>
<div style="background-color:Tomato; float:left; width:40%; height:200px; padding: 10px; margine:10px;">
<?php
$result = mysqli_query($con, "SELECT sum(amount)As Total_Income FROM `payments`"); 
$row = mysqli_fetch_assoc($result); 
$income = $row['Total_Income'];
echo "<br> <h2>Total Income : ".$income."</h2>";
 
        ?> 
</div>
<div style="background-color:Green; float:left; width:40%; height:200px; padding: 10px; margine:10px;">
<?php
$result = mysqli_query($con, "SELECT count(*) As Total_feedbacks FROM `feedback`"); 
$row = mysqli_fetch_assoc($result); 
$Total_feedbacks = $row['Total_feedbacks'];
echo "<br> <h2>Total feedbacks : ".$Total_feedbacks."</h2>";
 
        ?> 


</div>
</body>
</html>