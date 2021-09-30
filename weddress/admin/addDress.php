<?php include '../config.php';
 
// If file upload form is submitted 

$status = $statusMsg = ''; 
if(isset($_POST["submit"]))
{ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) 
	{ 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         //INSERT INTO `dress`( `image`, `uploaded`, `dresstype`, `category`, `price`)
		$dresstype= $_POST['dresstype'];
		$category= $_POST['category'];
		 $price=$_POST['price'];
		 
		 
            
            $insert = $con->query("INSERT INTO `dress`( `image`, `uploaded`, `dresstype`, `category`, `price`) VALUES ('$imgContent', NOW(),'$dresstype','$category','$price')"); 
             if($insert){ 
                $status = 'success'; 
                $statusMsg = "Dress is added successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>

<h1>Add Dresses</h1>
<form action="addDress.php" method="post" enctype="multipart/form-data">

<table>
<tr><td><a href="index.php">Home</a></td><td><a href="../logout.php"> Logout!</a></td></tr>

<tr><td>Select dress type:</td><td>

<select id="dresstype" name="dresstype">
  <option value="Man">Man</option>
  <option value="Woman">Woman</option>
  <option value="Boy">Boy</option>
  <option value="Girl">Girl</option>
</select>


</td></tr>
 
<tr><td>Select category: </td><td>
<select name="category">
    <option disabled selected>-- Select Category--</option>
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT `category` FROM `category`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['category'] ."'>" .$data['category'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>




</td></tr>

<tr><td>Enter price:</td><td><input type="Number" name="price"></td></tr>
 
<tr><td><label>Select Image File:</label></td><td><input type="file" name="image"></td></tr>
    
    
	
<tr><td></td><td><input type="submit" name="submit" value="Add Dress"></td></tr>	
	
    
	<tr><td></td><td></td></tr>
	
	</table>
</form>