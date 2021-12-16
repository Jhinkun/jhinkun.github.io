<?php
session_start();
session_destroy();
header("location:index.html"); 
//to redirect back to "adminlogin.php" after logging out
exit();
?>