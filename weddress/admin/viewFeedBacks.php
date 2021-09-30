
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
<a href="viewFeedBacks.php"> view Feed Back!</a>
<a href="../logout.php"> Logout!</a>
<br>
<br>

<div style="background-color:Orange; width:40%; height:200px;float:left; padding:10px; margine:10px;">
<?php
$result = $con->query("SELECT * FROM feedback"); 
 if($result->num_rows > 0)
 { 
 while($row = $result->fetch_assoc())
 {
	//`customerID`, `Message`, `date1` 
	 
echo	"<br>"."Customer Name : ".$row['customerID']." Message : ". $row['Message']." Date: ".$row['date1']."<br>";

	 
	 
	 
 }
 }
 
        ?> 


</div>
</body>
</html>