<?php
session_start();
session_destroy();
header("location:index.html"); 
//to redirect back to "stafflogin.php" after logging out
exit();
?>