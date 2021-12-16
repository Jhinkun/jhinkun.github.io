<?php
    include("dbConn.php");
    $dep = $_GET['department'];
    if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    $sql = "DELETE FROM department where department='$dep'";
    $result = mysqli_query($conn, $sql);
    if($result)
        {
            mysqli_commit($conn);
            Print '<script>alert("Department Successfuly Deleted.");</script>';
            Print '<script>window.location.assign("department.php");</script>';
         }
    else
    {
        mysqli_rollback($conn);
        Print '<script>alert("Department is failed to be Deleted.");</script>';
        Print '<script>window.location.assign("department.php");</script>';
    }
?>