<?php

function check_login($conn)
{

	if(isset($_SESSION['icNumber']))
	{

		$id = $_SESSION['icNumber'];
		$query = "select * from staff_intern where icNumber = '$id'";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$staff_data = mysqli_fetch_array($result);
			return $staff_data;
		}
	}
	//redirect to login
	header("Location: stafflogin.php");
	die;

}
?>