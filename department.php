<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="dep.css">
<meta charset="utf-8">
<title>Department</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
	<style>
		html{
			scroll-behavior: smooth;
		}
		body{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}
		
		.light {
			color:black;
			font-size: 30px;
			text-transform: uppercase;
			letter-spacing: 3px;
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
			font-family: 'Poppins', sans-serif;	
			font-weight: 500;
		}
		.footer p{
			padding-top:3px;
		}
        h1{
            font-family: 'Poppins', sans-serif;	
			text-align: center;
            color: black;
			padding-top: 20px;
			font-weight: 600;
		}
	</style>
</head>
	
<body>
  <div class="banner">
		<nav class="navibar">
			<img class="logo" src="images/logo.png" style="width: 100px; height: 100px;">
			<ul>
				<li><a href="hr_staffList.php">Staff List</a></li>
				<li><a href="department.php">Department</a></li>
				<li><a href="hr_records.php">Records</a></li>
				<li><a href="hr_jobApplication.php">Job Application</a></li>
				<li><a href="report/rpt.php">Report</a></li> 
				<li><a href="CzutiListPermohonan.php">Leave Application</a></li>
				<li><a href="displayasset.php">Asset</a></li>
				<li><a onClick="return confirm('Confirm to logout?')" href="adminlogout.php">Log Out</a></li>
			</ul>
		</nav>
    </div>
	<h1 class="light" style=" padding-left:100px;text-align:center;">Department</h1>
	<div style="padding-left: 200px; padding-top: 20px;">
		<button class="newDep" onclick="document.location='newDep.php'">NEW DEPARTMENT</button>
	</div>
	
	<div class="container mb-3 mt-3">
		<table class="table  table-bordered" id="dataTable" style="width: 100%;">
			<thead>
				<tr style="background: #4743EA; font-weight: bold;"cellspacing="0">
					<th style="width:20%;">Department</th>
					<th style="width:30%;">Job Scope</th>
					<th style="width:30%;">Sop</th>
					<th style="width:10%;">Edit</th>
					<th style="width:10%;">Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
				session_start();
				include("dbConn.php");
				include("functionA.php");
				$admin_data = check_login($conn);

				$sql = "Select * from department";
				$result = mysqli_query($conn,$sql);
				$destination = "uploads/skop_kerja/";
				if (mysqli_num_rows($result) > 0) 
				{
				$i=0;
				
				// output data of each row
				while($row = mysqli_fetch_assoc($result))
				{	
			?>
						<tr class="display">
							<td style="width:20%;"> <?php echo $row["department"];?></td>
							<td style="width:30%;"> <a href="<?php echo $destination.$row["skop"] ?>"><?php echo $row["skop"];?></a></td>
							<td style="width:30%;"> <a href="<?php echo $destination.$row["sop"] ?>"><?php echo $row["sop"];?></a></td>
							<td style="width:10%;"> <a href="editDepart.php?department=<?php echo $row['department']; ?>"><button class="edit">Edit</button></a></td>
							<td style="width:10%;"> <a href="departdel.php?department=<?php echo $row['department']; ?>" onclick="return confirm('Are you sure?')"><button class="delete">Delete</button></a></td>
							<!-- <form action="departdel.php?department=<?php echo $row["department"];?>" method="post">
							<td style="width:10%;"> <input style="color:black;background-color:red;" type="submit" value="Delete" onClick="return confirm('Are you sure?')"/></td>
							</form> -->
							
						</tr>
			<?php
					$i++;
				}
				} else
				{
					echo "0 results";
				}
				$conn->close();
		?>
			</tbody>
		</table>
	</div><br>
</div>
<div class="footer">
  <p>Copyright &copy; <a>Ferryrich Sdn Bhd</a>. All Rights Reserved</p>
</div>
</body>
</html>
