<?php include '../config.php';?>

<?php
if(isset($_POST['checkout']))
{
	header('Location:http://localhost/weddress/customer/checkout.php');
}

$customerID=$_SESSION["userid"] ;
echo "<h1> Welcome : ".$customerID."</h1>";

 $dressid=$_GET['id'];

$_SESSION["dressid1"] =$dressid;
$dressid=$_SESSION["dressid1"];

if(isset($_POST['done']))//add to cart
{
	
	$cusId = $customerID;
            $dressid=$_POST['dressid'];
			
 $result = $con->query("SELECT * FROM dress where dressid= '$dressid'"); 

 if($result->num_rows > 0)
 {
	 
	$row = $result->fetch_assoc();
	
$price = $row['price'];
			
$qty=	$_POST['qty'];		
	$TotalPrice=$price*$qty;


                                              echo"<br> cusId ".$cusId." dressid ".$dressid." price ".$price." qty ".$qty." TotalPrice ".$TotalPrice;
	
			$status="confirmed";
			
		$q1="INSERT INTO `cart`(`customerID`, `dressid`, `unitPrice`, `Quantity`, `TotalPrice`)VALUES ('$cusId','$dressid','$price','$qty','$TotalPrice')";	
			$query = mysqli_query($con,$q1);
 	echo"thank you";
	
	header('Location:http://localhost/weddress/customer/index.php');
 }
	
	
	
	
	
	
}



$result = $con->query("SELECT * FROM dress where dressid= '$dressid'"); 

 if($result->num_rows > 0)
 {
	$row = $result->fetch_assoc();
	
	
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    

    <title> </title>
</head>
<body>
<h1> View Dress</h1>
   <form method="POST" action="ViewDress.php">
   <?php 
   
   $unitPrice=$row['price'];
	 $dresstype=$row['dresstype'];
	 $category=$row['category'];

   
   ?>
<table border=1>

<tr><td><a href="index.php">Home</a></td>
<td></td><td></td><td></td>
</tr>
<tr><th>Dress NO</th><th>category</th><th>price</th><th>Choose Quantity</th></tr>
<tr><td><?php echo $dressid  ?></td><td><?php echo $category  ?></td><td><?php echo $unitPrice  ?></td><td> Quantity:
	   <select name ="qty" id="qty">  
  <option value="Select" >--Select--</option> 
  <option value="1">1</option>  
  <option value="2">2</option>  
  <option value="3">3</option>  
  <option value="4">4</option>  
  <option value="5">5</option>  
  <option value="6">6</option>  
  <option value="7">7</option>  
  <option value="8">8</option>  
  <option value="9">9</option>  
  <option value="10">10</option>
</select>
<input type="hidden" id="dressid" name="dressid" value="<?php echo $row['dressid']?>">
</td></tr>
<tr><td></td><td><button type="submit" name="done" >Add to Cart </button></td><td><button type="submit" name="checkout"> check out </button> </td><td></td></tr>

</table>

 	 
<?php		
 }

?>

                    
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>