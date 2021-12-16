<?php
/*php & mysql db connection file */
$user = "root"; //mysql username
$pass = ""; //mysql password
$host = "localhost"; //server name or ip address
$dbname = "finalproject"; // db name

//Create Connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

//Check Connection
if(!$conn)
{
	die("Connection Failed" . mysqli_connect_error());
}
?>