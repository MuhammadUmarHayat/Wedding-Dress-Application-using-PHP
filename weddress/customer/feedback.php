<?php include '../config.php';?>
<?php 
$customerID=$_SESSION["userid"] ;

if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
    if(!empty($_POST['Message']))
	{
////INSERT INTO `feedback`(`id`, `customerID`, `Message`, `date1`) 
	////VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
        
			
          $Message = $_POST['Message'];
            
			
	$d1= date('Y-m-d');		
			$q1="INSERT INTO `feedback`(`customerID`, `Message`, `date1`)  VALUES ('$customerID','$Message','$d1')";
			$query = mysqli_query($con,$q1);
 
 
 echo 'Thank you for your feed back';
		
	}
	else
	{
		
		echo "Please enter user name and password";
		
	}
}
else{
	
	
	
	echo "Please fill the form first";
}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
   <link rel="stylesheet" href="styles.css">
    <title>Feed Back Page</title>
</head>
<body>
<h1> Online Wed Dress Shop </h1>
<a href="index.php">Home</a>
<br>
				<br>
<div >
	
                <form method="POST" action="feedback.php">
				<table border=1>
			
			<tr><td>Enter your message here: </td><td><input type="text" name="Message"></td></tr>	
				
				
				 
 
                    <tr><td></td><td><button type="submit" name="done">Save Feed Back</button></td></tr>
					
					</table>
            
				
				</form>
            </div>
        </div>
    </main>
</div>
</body>
</html>