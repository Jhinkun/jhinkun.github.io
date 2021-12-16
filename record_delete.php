<?php

include 'dbConn.php';

$recordID= $_GET['recordID'];
$sql = "DELETE FROM records WHERE recordID='$recordID'";
$result=mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data has been deleted')</script>";
    echo "<script> location.href='hr_records.php'; </script>";
} else {
    echo "Error deleting record: ".mysqli_error($conn);
}

?>