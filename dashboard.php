<?php 
    session_start();
    include("dbConn.php");
    include("functionS.php");
    include("navi.php");
    $staff_data = check_login($conn);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
		html{
			scroll-behavior: smooth;
            
		}
		body{
			font-family: acme;
            margin:0;
            height: 100%;
            min-height: 100%;
		}
		
		h1{
            font-family: 'Montserrat', sans-serif;
			text-align: left;
			padding-left:90px;
            color: whitesmoke;
            padding-top: 90px;
		}
        h2{
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            text-align: left;
			padding-left:120px;
            color: whitesmoke;
            margin-top: -17px;
        }
		h3{
			font-family: 'Montserrat', sans-serif;
			color: whitesmoke;
			font-size: 20px;
			letter-spacing: 2px;

		}
		.light {
			font-weight: bold;
            font-size: 25px;
			color:whitesmoke;
		}
		.display{
			border-collapse: collapse;
            border-radius: 30px;
			width: 70%;
            height: 60%;
            margin-left: 50%;
            padding-left:3px;
            padding:0;
			border: 0;
			margin: 0;
			padding-right: 100px;
		}
		.jobscope{
			border-radius: 30px;
			height: 320px;
			width:40%;
            margin-left: 10%;
			padding:0;
			border: 0;
			margin: 0;
			margin-top:-49px;
		}
		button {   
			background-color: #B55609;    
			color:white;   
			padding: 5px;   
			margin: 7px 0px;   
			border: none;   
			cursor: pointer;  
			border-radius: 10px; 
			margin-top: 5px;
		}
		.btn {
			padding-left: 185px;
			position: absolute;
		}
		.img{
			padding-left: 100px;
		}
		.timeline{
			background:url( "images/dashboard.jpeg")center center no-repeat ;
			background-size: cover;
			background-position: bottom;
			height: 440px;
		}
		td{
			padding-left: 30px;
			color: black;
			font-size: 15px;
			font-family: 'Montserrat', sans-serif;
		}
		.footer {
			position: fixed;
			left: 0;
			bottom: 0;
			height: 5%;
			width: 100%;
			background-color: #f7a609;
			color: black;
			text-align: center;
			letter-spacing: 3px;
			font-family: 'Montserrat', sans-serif;
			font-weight: 300;
		}
    </style>
    <title>Dashboard</title>
</head>
<body>
<div class="timeline">
	<h1 class="light" style="padding-top: 60px;">WELCOME,<h2>&nbsp &nbsp &nbsp <?php echo $staff_data[2];?></h2></h1>
		<div class="img">
			<?php  
				$icNumber=$_SESSION['icNumber'];
                $query = "SELECT img FROM staff_intern where icNumber='$icNumber'";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <br><img style="background-position: 50% 50%;object-fit:cover;width: 250px;border-radius: 100%;border-style:solid;border-color:white;border-width:4px;height: 250px;" src="data:image/jpeg;base64,'.base64_encode($row['img'] ).' " />  <br>
                               </td>  
                          </tr>  
                     ';  
                }  
              ?>  
		</div>
		<div class="btn">
			<button onclick="document.location='edit.php'">EDIT PROFILE</button>
		</div>
</div>
<div style="margin-top: -190px;margin-bottom:-300px; padding-right: 20px;">
	  <table class="display"  bgcolor="whitesmoke"  align="right" >
			<tr>
				<td width="192" height="30">IC Number</td>
			    <td width="360"><?php echo $staff_data[0]; ?></td>
			</tr>
			<tr>
				<td height="30">Name</td>
			    <td><?php echo $staff_data[2];?></td>
			</tr>
			<tr>
				<td height="30">Age</td>
			    <td><?php echo $staff_data[3];?></td>
			</tr>
			<tr>
				<td height="30">Address</td>
			    <td><?php echo $staff_data[8];?></td>
			</tr>
			<tr>
				<td height="30">Education</td>
			    <td><?php echo $staff_data[9];?></td>
			</tr>
			<tr>
				<td height="30">Position</td>
			    <td><?php echo $staff_data[5]; ?></td>
			</tr>
			<tr>
				<td height="30">Department</td>
				<td><?php echo $staff_data[6]; ?></td>
			</tr>
			<tr>
				<td height="30">Phone Number</td>
				<td><?php echo $staff_data[7]; ?></td>
			</tr>
		</table>
</div>
<!-- <div style="margin-top: 300px;">
<h3 style="padding-left:200px;padding-top:5px;color:whitesmoke;">JOB SCOPE</h3>
		<table class="jobscope" bgcolor="gray" align="right">
			<tr>
				<td style="padding-left:30px;padding-top:0px;">
					<?php 
						$icNumber=$_SESSION['icNumber'];
						$sql="SELECT * FROM staff_intern WHERE icNumber='$icNumber'";
						$gotresults=mysqli_query($conn,$sql);
						if($gotresults)
						{
							if(mysqli_num_rows($gotresults))
							{
								$select= "SELECT skop FROM department WHERE department='$staff_data[6]'";
								
								if($row=mysqli_fetch_array(mysqli_query($conn,$select)))
								{
									echo nl2br($row["skop"]);
								}
							}
						}
					?>
				</td>
			</tr>
		</table>
</div> --> <br>
<div class="footer">
	<p>Copyright &copy; <a>KaFerry Sdn.Bhd</a>. All Rights Reserved</p>
</div>
</body>
</html>