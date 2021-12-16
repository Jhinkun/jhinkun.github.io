<!DOCTYPE html>
<html>
<head>
<title> Proses Permohonan </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

<?php
//allow to reuse the code for database connection
include "dbConn.php";
$Date = date('Y-m-d');
$leaveId = rand(000000,999999);
$IC = $_POST["pencutiIC"];
$Name = $_POST["pencutiName"];
$Posisi = $_POST["pencutiPosition"];
$Depart = $_POST["pencutiDepartment"];
$Jenis = $_POST["jeniscuti"];
$Mula = $_POST["mulacuti"];
$Habis = $_POST["akhircuti"];
$Duration = $_POST["duration"];
$Sebab = $_POST["sebabcuti"];

$Status="PENDING";

//write the SQL command
$sql = "INSERT INTO leave_app(reqDate,leaveId,name,icNumber,position,department,leaveType,startDate,endDate,duration,reason,status) VALUES ('$Date','$leaveId','$Name','$IC','$Posisi','$Depart','$Jenis','$Mula','$Habis','$Duration','$Sebab','$Status')";
//Now send the SQL command to MySQL using database connection
$results = mysqli_query($conn, $sql);
if ($results){
        mysqli_commit($conn);
        Print '<script>alert("Permohonan Anda Akan Disemak.");</script>';
		Print '<script>window.location.assign("Cutiindex.php");</script>';
    }
    else{
        mysqli_rollback($conn);
        echo "error odo ";
}
?>

</head>
</html>
