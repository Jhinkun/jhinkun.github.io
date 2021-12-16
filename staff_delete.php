<?php

include 'dbConn.php';

$icNumber= $_GET['icNumber'];
$sql = "DELETE FROM staff_intern WHERE icNumber='$icNumber'";
$result=mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data has been deleted')</script>";
    echo "<script> location.href='hr_staffList.php'; </script>";
} else {
    echo "Error deleting record: ".mysqli_error($conn);
}

?>