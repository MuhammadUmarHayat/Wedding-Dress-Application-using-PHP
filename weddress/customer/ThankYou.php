<?php include '../config.php';?>
<?php
	$customerID="";

$customerID=$_SESSION["userid"] ;
echo "<h3> Thank you : ".$customerID."</h3>";

if(isset($_POST['done']))
{
	
	header('Location:http://localhost/weddress/customer/feedback.php');

}


?>


<?php
$result = $con->query("SELECT * FROM orders where cusId='$customerID'"); 



//SELECT `cusId`, `dressid`, `price`, `quantity`, `date`, 
//`status`, `id`, `total`, `orderid` FROM `orders` WHERE 1




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    

    <title> </title>
	<script>
    function doPrint() {
        var prtContent = document.getElementById('div1');
        prtContent.border = 0; //set no border here
        var WinPrint = window.open('', '', 'left=100,top=100,width=1000,height=1000,toolbar=0,scrollbars=1,status=0,resizable=1');
        WinPrint.document.write(prtContent.outerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>
</head>
<body>
<h1> </h1>
<a href="index.php">Home</a>
   <form method="POST" action="ThankYou.php">
<div id="div1">

<h2>Your Receipet</h2>
<?php
if($result->num_rows > 0)
 {
	while($row = $result->fetch_assoc())
	{		
	
?>


<?php echo "<br> Customer ID ".$row['cusId']; ?> <?php echo" Dress No". $row['dressid']; ?> <?php echo "Price: ".$row['price'];?><?php echo "Quantity ".$row['quantity'];?> <?php echo"Total: ".$row['total'];?> <?php  echo" Order No ".$row['orderid'];?>


<?php
 }
 }
 $result = mysqli_query($con, 'SELECT SUM(`total`) AS value_sum FROM orders'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "<br> <h2>Total Amount : ".$sum."</h2>";
 
        ?> 



	
</div>
<button type="submit" name="print" onclick="doPrint()" >Print Receipet</button>
<br>
<button type="submit" name="done">Send Feedback /Suggestions</button>	

                </form>
            
        
    </main>
</div>
</body>
</html>