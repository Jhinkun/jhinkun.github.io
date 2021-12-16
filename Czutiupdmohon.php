<html>
	<head>

	    <link rel="stylesheet" href="Cutistyle.css">
	</head>

	<body style=margin:0>

	<?php
		include_once "dbConn.php";

		$leaveId = $_GET['leaveId'];
		$sql = "SELECT * FROM leave_app WHERE leaveId = '$leaveId'";
		$result = mysqli_query($conn,$sql);
		if (false === $result)
		{
		echo mysqli_error($conn);
		}
		$row = mysqli_fetch_assoc($result)
	?>

	<center>
		<form action="Czutiupdmohonproses.php?leaveId=<?php echo $leaveId;?>" method="post">
			<br><br><br><br>
			<h2 align="center">Update Status Permohonan</h2>
			<table align="center" border="1">
				<tr>
					<h3><td>IC NUMBER</td>
						<td><input class="read"  type="text" name="icNumber" value='<?=$row['icNumber'];?>' READONLY ></td>
					</h3>
				</tr>

				<tr>
					<td>LEAVE TYPE </td>
					<td><input class="read" type="text" name="leaveType" value='<?=$row['leaveType'];?>' READONLY></td>
				</tr>

				<tr>
					<td>STATUS : </td><br>
					<td>
						<select name="status"><br>
							<option value="PENDING"> PLEASE SELECT </option>
							<option value="PENDING">PENDING </option>
							<option value="ACCEPTED">ACCEPTED </option>
							<option value="DECLINED">DECLINED </option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2">
                        <center><button type="submit" value="Update" onClick="return confirm('Are you sure?')">SUBMIT</button>  
                            <button type="button" onclick="window.location.href='CzutiListPermohonan.php';">BACK</button></center>
					</td>
				</tr>
			</table>
		</form>
	</center>

	</body>
</html>