<?php 

session_start();

	include("dbConn.php");
    include("functionA.php");
	if(isset($_SESSION['icNumber']))
	{
		echo "<script> window.location='adminHome.php'</script>";
		die;
	}
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$icNumber = $_POST['icNumber'];
		$password = $_POST['password'];

		//read from database
		$sql = "SELECT * FROM admin WHERE icNumber='$icNumber' AND password = '$password'";
		
		$query = mysqli_query($conn, $sql);
		if(mysqli_num_rows($query)==0)
		{
			//display message if login failed
			echo "<script>alert('Login Failed. Incorrect ID or password.');
			window.location='adminlogin.php'</script>";
		}
		else{
			$admin_data = mysqli_fetch_assoc($query);
			$_SESSION['icNumber'] = $admin_data['icNumber'];
			echo "<script>alert('Login Successfully.');
			window.location='hr_stafflist.php'</script>";
			die;
		}
	}

?>
<!doctype html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Poppins:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
<title>Admin Login</title>
	<style>
		body{
			background:url( "images/5.png")center center no-repeat ;
			background-size: cover;
			overflow: hidden;
			object-fit: cover;
			object-position: bottom top;
			width: 100%;
  			height: 100vh;
		}
		/* Bordered form */
		form {
			text-align: center;
			font-size: 20px;
		}
		h1{
			padding-top: 90px;
			color:#f7a609;
			font-size: 50px;
			font-weight: bold;
			font-family: 'Poppins', sans-serif;
			-webkit-text-fill-color: whitesmoke; /* Will override color (regardless of order) */
			-webkit-text-stroke-width: 2px;
			-webkit-text-stroke-color: black;
			
		}
		/* Full-width inputs */
		input[type=text], input[type=password] {
		  width: 100%;
		  padding: 12px 20px;
		  margin: auto;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		}
		label{
			font-family: 'Poppins', sans-serif;
			-webkit-text-stroke: 0.5px whitesmoke;  
		}
		/* Set a style for all buttons */
		button {
		  background-color: #04AA6D;
		  color: white;
		  padding: 14px 20px;
		  margin: 8px 0;
		  border: none;
		  cursor: pointer;
		  width: 100%;
		}

		/* Add a hover effect for buttons */
		button:hover {
		  opacity: 0.8;
		}

		/* Extra style for the cancel button (red) */
		.cancelbtn {
		  width: auto;
		  padding: 10px 18px;
		  background-color: #273269;
		  border-radius:7px;
		}

		/* Avatar image */
		img.avatar {
		  width: 40%;
		  border-radius: 50%;
		}
        /* .imgcontainer{
		margin-top: 200px;
		background-color: #2792CD;
		width: 30% ;
		text-align: center;
		margin-left: auto;
	    margin-right: auto;  
        } */
		/* Add padding to containers */
		.container {
			margin-left: auto;
			margin-right: auto;
			margin-top: -30px;
			width:20%;

		}
		/* The "Forgot password" text */
		span.psw {
		  float: right;
		  padding-top: 16px;
		}

		/* Change styles for span and cancel button on extra small screens */
		@media screen and (max-width: 300px) {
		  span.psw {
			display: block;
			float: none;
		  }
		  .cancelbtn {
			width: 100%;
		  }
		}
		b{
			color:black;
			letter-spacing: 2px;
		}
	</style>
</head>
<body>
<form method="post">
	<h1>ADMIN LOGIN</h1><br>
	<div class="container">
		<label for="icNumber"><b>USERNAME</b></label>
		<input type="text" placeholder="Enter Username" name="icNumber" id="icNumber" required><br><br>
		<label for="StaffPass"><b>PASSWORD</b></label>
		<input type="password" placeholder="Enter Password" name="password" required><br><br>
		<button type="submit">Login</button>
		<a style="text-decoration: none;color:white;" href="login.php"><button type="button" class="cancelbtn">BACK</button></a>
	</div>
</form>
</body>
</html>