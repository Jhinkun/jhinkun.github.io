<?php
session_start(); //blh setup
include("dbConn.php");
include("functionS.php");
include("navi.php");
$staff_data = check_login($conn);

if(isset($_POST['update']))
 {
    $icNumber=$_SESSION['icNumber'];
    $name=$_POST['name'];
    $age=$_POST['age'];
	$address=$_POST['address'];
	$education=$_POST['education'];
    $phoneNum=$_POST['phoneNum'];
    $select= "select * from staff_intern where icNumber='$icNumber'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['icNumber'];
    if($res === $icNumber)
    {
       $update = "update staff_intern set  name='$name',age='$age',address='$address',education='$education',phoneNum='$phoneNum' where icNumber='$icNumber'";
	   
       $sql2=mysqli_query($conn,$update);
	   if($sql2)
       { 
           /*Successful*/
           header('location:dashboard.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:edit.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:edit.php');
    }
 }
else if(isset($_POST['upload']))
{
	$icNumber=$_SESSION['icNumber'];
	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$select= "select * from staff_intern where icNumber='$icNumber'";
	$sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($sql);
    $res= $row['icNumber'];
    if($res === $icNumber)
	{
		$query = "update staff_intern set img='$file' where icNumber='$icNumber'";
		if(mysqli_query($conn, $query))
		{
			echo '<script>alert("Image Inserted into Database")</script>';
		}
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
<title>Edit Profile</title>
	<style>
		html{
			scroll-behavior: smooth;
		}
		body{
			font-family: acme;
			background-color:azure;
			margin: 0;
			}
        h1{
            font-family: 'Montserrat', sans-serif;
            color: whitesmoke;
		}
        label{
            font-family: 'Montserrat', sans-serif;
            color: black;
            font-weight: 400px;
            font-size: 12px;
        }
		.light {
			font-weight: bold;
			color:black;
			font-size: 30px;
			text-transform: uppercase;
			letter-spacing: 3px;
		}
		.display{
			border-collapse: collapse;
		    border: 5px solid red;
			padding-top: 10px;
		}
		.submit {   
			background-color:darkred;    
			color:white;   
			padding: 10px;   
			margin: 7px 0px;   
			border: none;   
			cursor: pointer;   
			border-radius: 10px;
		}
		.submit:hover{
			background-color: black;
			color:white;
		}
		.btn{
			padding-right: 50px;
			padding-bottom: 30px;
			right: 0;
			bottom: 0;
			position: absolute;
		}
		.timeline{
			background-image: url("../image/6.jpg");
			background-position: bottom right;
			height: 270px;
			padding:0;
			border: 0;
			margin: 0;
		}
		
		.img{
			padding-left: 100px;
			float:left; 
			width: 30%;
		}
		.info{
			float: right;
			width:40%;
			padding-top: 80px;
			padding-right: 20%;
		}
		input[type="text"] {
			width: 500px;
			box-sizing:content-box;
			height: 20px;
            font-family: 'Montserrat', sans-serif;
            color: black;
            font-weight: 900px;
            font-size: 12px;
		}
		input[type="email"] {
			width: 500px;
			box-sizing:content-box;
			height: 20px;
		}
		.info label{
			font-size: 20px;
		}
	</style>
</head>
	
<body>
<div>
	<div>
		<hr>
		<h1 class="light" style="padding-top: 60px; padding-left:100px ">Edit Profile</h1>
	  <div class="img">
			<?php  
                $icNumber=$_SESSION['icNumber'];
                $query = "SELECT img FROM staff_intern where icNumber='$icNumber'"; 
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_assoc($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img style="background-position: 50% 50%;width: 350px;border-radius: 100%;height: 350px;object-fit:cover;" src="data:image/jpeg;base64,'.base64_encode($row['img'] ).' " />  <br>
                               </td>  
                          </tr>  
                     ';  
                }  
              ?>  <br>
		  <form method="post" enctype="multipart/form-data">
			<?php
				$currentuser=$_SESSION['icNumber'];
				$sql = "select img from staff_intern where icNumber='$currentuser'";
				$gotresults = mysqli_query($conn,$sql);
				if($gotresults)
				{
			?>
				<table style="margin-top:10px;" align="center" border="0">
				  <tr>
					<td>
					<label style="width: 100%;font-size: 16px;color: darkblue;" for="image">Change Profile</label><br><br>
					<input type="file" name="image" >
					<input type="submit" name="upload" value="Upload" >
			  	</table>
			<?php
					
				}
			?>
			
		</div>
		<div class="info">
			<form method="post" >
		  <?php
				$currentuser=$_SESSION['icNumber'];
				$sql = "select * from staff_intern where icNumber='$currentuser'";
				$gotresults = mysqli_query($conn,$sql);
				if($gotresults){
					if(mysqli_num_rows($gotresults)){
						while($row = mysqli_fetch_array($gotresults)){
				?>
		  <table border="0">
			  <tr>
				<td>
				  <label style="width: 100%;" for="name">Name</label><br>
				  <input type="text" name="name"  value="<?php echo $row['name']; ?>">
				  <br>
				  <br></td>
			  </tr>
			  <tr>
				<td><br>
				  <label style="width: 100%;" for="age">Age</label><br>
				  <input type="text" name="age" value="<?php echo $row['age']; ?>">
				  <br>
				  <br></td>
			  </tr>
			  <tr>
				<td><br>
				  <label style="width: 100%;" for="address">Address</label><br>
				  <input type="text" name="address" value="<?php echo $row['address']; ?>">
				  <br>
				  <br></td>
			  </tr>
              <tr>
				<td><br>
				  <label style="width: 100%;" for="education">Education</label><br>
				  <input type="text" name="education" value="<?php echo $row['education']; ?>">
				  <br>
				  <br></td>
			  </tr>
			  <tr>
				<td><br>
				  <label style="width: 100%;" for="phoneNum">Phone Number</label><br>
				  <input type="text" name="phoneNum" value="<?php echo $row['phoneNum']; ?>">
				  <br>
				  <br></td>
			  </tr>
		</table>
		  <div class="btn">
			  <button class="submit" type="submit" name="update" >SUBMIT</button>
		  </div>
		  <?php	
						}
					}
				} 
			?>
	 	 </form>
		</div>
		
	</div>
</div>
</body>
</html>
<script>
	$(document).ready(function(){  
	  $('#upload').click(function(){  
		   var image_name = $('#image').val();  
		   if(image_name == '')  
		   {  
				alert("Please Select Image");  
				return false;  
		   }  
		   else  
		   {  
				var extension = $('#image').val().split('.').pop().toLowerCase();  
				if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
				{  
					 alert('Invalid Image File');  
					 $('#image').val('');  
					 return false;  
				}  
		   }  
	  });  
	});
</script>