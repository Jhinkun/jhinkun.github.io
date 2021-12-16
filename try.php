<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/cp.css">
<link rel="stylesheet" href="CSS/stnav.css">
<meta charset="utf-8">
<title>Staff List</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<style>
		html{
			scroll-behavior: smooth;
		}
		body{
			font-family: acme;
			background-color:azure;
			margin: 0;
			}
		
		.light {
			font-weight: bold;
			color:black;
			font-size: 30px;
			text-transform: uppercase;
			letter-spacing: 3px;
		}
	</style>
</head>
	
<body>
<div>
  <nav>
	<!-- Navigation-->
	<ul>
	 <li><a href="hr_staffList.php">Staff List</a></li>
                    <li><a href="hr_attendance.php">Attendance</a></li>
                    <li><a href="hr_jobApplication.php">Job Application</a></li>
                    <li><a href="report/rpt.php">Report</a></li> 
                    <li><a href="CzutiListPermohonan.php">Leave Application</a></li>
                    <li><a onClick="return confirm('Confirm to logout?')" href="adminlogout.php">Log Out</a></li>
	</ul>
  </nav>
	<hr>
	<h1 class="light" style="padding-top: 60px; padding-left:100px ">Staff List</h1>
	<div style="padding-left: 200px; padding-top: 20px;">
		<button style="width: 150px; height: 40px; background: #E3894D;" onclick="document.location='newStaff.php'">NEW STAFF</button>
	</div>
	
	
	<div class="container mb-3 mt-3">
		<table class="table  table-bordered" id="dataTable" style="width: 100%;">
			<thead>
				<tr style="background: #4743EA; font-weight: bold;"cellspacing="0">
					<th>Staff ID</th>
					<th>First Name</th>
				</tr>
			</thead>
			<tbody>
				<?php
				session_start();
				include("dbconn.php");
				include("functionS.php");
				$staff_data = check_login($connection);

				$sql = "Select * from staff order by StaffID asc";
				$result = mysqli_query($connection,$sql);
				if (mysqli_num_rows($result) > 0) 
				{
				$i=0;
				// output data of each row
				while($row = mysqli_fetch_assoc($result))
				{
			?>
						<tr>
							<td> <?php echo $row["StaffID"];?></td>
							<td> <?php echo $row["StaffFirstnme"];?></td>
							<td> <?php echo $row["StaffLastnme"];?></td>
							<td> <?php echo $row["StaffICno"];?></td>
							<td> <?php echo $row["StaffPhone"];?></td>
							<td> <?php echo $row["StaffEmail"];?></td>
							<td> <?php echo $row["StaffPass"];?></td>
							<td> <button style="background: green;" onclick="document.location='editStaff.php?StaffID=<?php echo $row["StaffID"];?>'">EDIT</button></td>
							<form action="deleteStaff.php?fid=<?php echo $row["StaffID"];?>" method="post">
							<td> <input type="submit" value="Delete" onClick="return confirm('Are you sure?')"/></td>
							</form>
							
						</tr>
			<?php
					$i++;
				}
				} else
				{
					echo "0 results";
				}
				$connection->close();
		?>
			</tbody>
		</table>
	</div>
</div>
<div class="footer">
  <p>Copyright &copy; <a>Rent n' Go</a>. All Rights Reserved</p>
</div>
</body>
</html>
