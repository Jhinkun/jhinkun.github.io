<?php
    include 'dbConn.php';
    if(isset($_GET['assets_id']))
    {
        $assets_id=$_GET['assets_id'];

        $sql="DELETE FROM asset WHERE assets_id='$assets_id'";
        $result=mysqli_query($conn, $sql);
        if ($result)
        {
            //echo "Deleted succesfully";
            header('location:displayasset.php');
        }
        else
        {
            die("Connection Failed" . mysqli_connect_error());
        }
    }
?>