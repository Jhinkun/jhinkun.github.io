<?php 

session_start();

	include("dbConn.php");
	include("functionS.php");
	if(isset($_SESSION['icNumber']))
	{
		echo "<script> window.location='dashboard.php'</script>";
		die;
	}
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$icNumber = $_POST['icNumber'];
		$pass = $_POST['pass'];

		//read from database
		$sql = "SELECT * FROM staff_intern WHERE icNumber='$icNumber' AND pass = '$pass'";
		
		$query = mysqli_query($conn, $sql);
		if(mysqli_num_rows($query)==0)
		{
			//display message if login failed
			echo "<script>alert('Login Failed. Incorrect ID or password.');
			window.location='stafflogin.php'</script>";
		}
		else{
			$staff_data = mysqli_fetch_assoc($query);
			$_SESSION['icNumber'] = $staff_data['icNumber'];
			echo "<script>alert('Login Successfully.');
			window.location='dashboard.php?id='</script>";
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
<title>Staff Login</title>
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
			color:whitesmoke;
			font-size: 50px;
			font-weight: bold;
			font-family: 'Poppins', sans-serif;
			-webkit-text-stroke: 1px black;
			
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
		label{
			font-family: 'Poppins', sans-serif;
			-webkit-text-stroke: 0.5px whitesmoke;
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
		  color:white;
		}

		/* Avatar image */
		img.avatar {
		  width: 40%;
		  border-radius: 50%;
		}
		/* Add padding to containers */
		.container {
			margin-left: auto;
			margin-right: auto;
			margin-top: -30px;
			width:20%;
			padding: px;

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
<form method="post" autocomplete="off">
  	<div class="imgcontainer">
		<h1>STAFF LOGIN</h1><br>
		<div class="container">
			<label for="icNumber"><b>USERNAME</b></label>
			<input type="text" placeholder="IC Number" name="icNumber" id="icNumber" required><br><br>
			<label for="StaffPass"><b>PASSWORD</b></label>
			<input type="password" placeholder="Enter Password" name="pass" required><br><br>
			<button type="submit">Login</button>
			<a style="text-decoration: none; color:white;" href="login.php"><button type="button" class="cancelbtn">BACK</button></a>
		</div>
  	</div>  
</form>
</body>
</html>