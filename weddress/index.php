<?php include 'config.php';?>
<?php
//session_start();

 $userid = "";
$password = "";
if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
    if(!empty($_POST['userid']))
	{
        if(!empty($_POST['password']))
	    {
			//"userType"
            $userid = $_POST['userid'];
            $password = $_POST['password'];
   
   
   
				
         $qry = "Select * from users where  userid= '$userid' and password='$password'";

            $results = mysqli_query($con, $qry);
            if ($results->num_rows> 0) //username and password is corract
			{
				$usertype="";
				$row = $results->fetch_assoc();//getting the single row only
				
					$usertype=$row['usertype'];//fetching the usertype
				
					$_SESSION['userid'] = $userid;//session
					if($usertype=="Admin")
					{
					session_start();
					header('Location:http://localhost/weddress/admin/index.php');
					}
					else if($usertype=="Customer")
					{
						session_start();
					header('Location:http://localhost/weddress/customer/index.php');
					}
					
            }
   
   			
			else 
			{
                echo "Invalid username or password.";
            }
   
        }
		else 
		{
           echo "Password field is empty.";
        }
    } 
	else 
	{
        echo "username field is empty";
    }
	
	
}
}
// Get image data from database 
$result = $con->query("SELECT * FROM dress"); 
 if($result->num_rows > 0)
 { 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
<link rel="stylesheet" href="styles.css">
    <title>Login Form</title>
</head>
<body>
<h1> Online Wed dress shop</h1>
   <form method="POST" action="index.php">
<table>

<tr><td><a href="AdminRegistrationForm.php"> Register Now as Admin !</a></td>
<td><a href="CustomerRegistration.php"> Register Now as Customer!</a></td></tr>
<tr><td>Enter User Name :</td><td><input type="text" name="userid"  id="username"></td></tr>
<tr><td>Enter User password : </td><td><input type="password" name="password"  id="password"></td></tr>
<tr><td></td><td><button type="submit" name="done">Submit</button></td></tr>

</table>
<br>
<hr>
  <?php while($row = $result->fetch_assoc())
		{ ?> 
	<div style="float:left; padding:10px; margine:10px;">
		<br>
		Dress ID:<?php echo $row['dressid']?>
		<br>
				Category:<?php echo $row['category']?>
				<br>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" width=100px height=100px /> 
      <br>
	  Dress type:<?php echo $row['dresstype']?>
	   <br>
	  Price:<?php echo $row['price']?>
	   <br>
	 
	  
 </div>

<?php 

//echo '<br><a href="ViewDress.php?id=' . $row['dressid'].'">Add to Cart Now !</a>';
	
//$con->close();	
} 
	 }else
	 { 
    echo "<br>Record not found <br>";
 }  
                    
?>		
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>