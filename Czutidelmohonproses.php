<?php
 $leaveId = $_GET['leaveId'];

 include "dbConn.php";


$sql = "DELETE FROM leave_app where leaveId='$leaveId'";

$results = mysqli_query($conn, $sql);
if ($results){
        mysqli_commit($conn);
        Print '<script>alert("Permohonan have successfully DELETED.");</script>';
		Print '<script>window.location.assign("CzutiListPermohonan.php");</script>';
    }
    else{
        mysqli_rollback($conn);
        Print '<script>alert("ERROR ODO.");</script>';
		Print '<script>window.location.assign("CzutiListPermohonan.php");</script>';
}
?>
?>