<?php

 $leaveId = $_GET['leaveId'];
 $status=$_POST['status'];
 include "dbConn.php";


$sql = "UPDATE `leave_app` SET `status`='$status'WHERE `leaveId`='$leaveId'";

$results = mysqli_query($conn, $sql);
if ($results){
        mysqli_commit($conn);
        Print '<script>alert("Status have successfully updated.");</script>';
		Print '<script>window.location.assign("CzutiListPermohonan.php");</script>';
    }
    else{
        mysqli_rollback($conn);
        Print '<script>alert("Failed to update Status.");</script>';
		Print '<script>window.location.assign("CzutiListPermohonan.php");</script>';
}
?>
?>