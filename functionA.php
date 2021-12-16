<?php

function check_login($conn)
{

	if(isset($_SESSION['icNumber']))
	{

		$id = $_SESSION['icNumber'];
		$query = "select * from admin where icNumber = '$id'";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$admin_data = mysqli_fetch_array($result);
			return $admin_data;
		}
	}

	//redirect to login
	header("Location: adminlogin.php");
	die;

}
?>