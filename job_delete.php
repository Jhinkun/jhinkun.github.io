<?php

include 'dbConn.php';

$email= $_GET['email'];
$sql = "DELETE FROM job_app WHERE email='$email'";
$result=mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data has been deleted')</script>";
    echo "<script> location.href='hr_jobApplication.php'; </script>";
} else {
    echo "Error deleting record: ".mysqli_error($conn);
}

?>