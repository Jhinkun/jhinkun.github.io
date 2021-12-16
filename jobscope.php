<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="nav.css">
<meta charset="utf-8">
<title>Department</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
			font-weight: 800;
		}
        h1{
            font-family: 'Montserrat', sans-serif;
			text-align: left;
			padding-left:90px;
            color: black;
            padding-top: 90px;
            font-weight:900;
		}
        th{
            font-family: 'Montserrat', sans-serif;
            color: black;

        }
	</style>
</head>
	
<body>
<div>
  <nav>
	<!-- Navigation-->
	<ul>
        <li><a href="hr_staffList.php">Staff List</a></li>
        <li><a href="jobscope.php">Department</a></li>
        <li><a href="hr_jobApplication.php">Job Application</a></li>
        <li><a href="report/rpt.php">Report</a></li> 
        <li><a href="CzutiListPermohonan.php">Leave Application</a></li>
        <li><a onClick="return confirm('Confirm to logout?')" href="adminlogout.php">Log Out</a></li>
	</ul>
  </nav>
	<hr>
	<h1 class="light" style="padding-top: 60px; padding-left:100px ">Department</h1>
	<div style="padding-left: 200px; padding-top: 20px;">
		<button style="width: 150px; height: 40px; background: #E3894D;" onclick="document.location='newJob.php'">NEW DEPARTMENT</button>
	</div>
	
	
	<div class="container mb-3 mt-3">
		<table class="table  table-bordered" id="dataTable" style="width: 100%;">
			<thead>
				<tr style="background: #4743EA; font-weight: bold;"cellspacing="0">
					<th style="width:30%;">Department</th>
					<th style="width:50%;">Job Scope</th>
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

				$sql = "Select * from staff order by StaffID asc";
				$result = mysqli_query($conn,$sql);
				if (mysqli_num_rows($result) > 0) 
				{
				$i=0;
				// output data of each row
				while($row = mysqli_fetch_assoc($result))
				{
			?>
						<tr>
							<td style="width:30%;"></td> <?php echo $row["department"];?></td>
							<td> <?php echo $row["skop"];?></td>
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
