<?php
session_start();
include ("dbConn.php");
include("functionS.php");
$staff_data = check_login($conn);
$user = $staff_data['icNumber'];
$sql = "SELECT d.department, d.skop, d.sop FROM department d , staff_intern s  WHERE d.department = s.department AND s.icNumber = '$user'";
$result = mysqli_query($conn, $sql);
$sop = mysqli_fetch_assoc($result);
$path = "uploads/skop_kerja/";
?>
<!DOCTYPE html>
<style>
    .footer {
			position: fixed;
			left: 0;
			bottom: 0;
			height: 5%;
			width: 100%;
			background-color: #f7a609;
			color: black;
			text-align: center;
			letter-spacing: 3px;
			font-family: 'Montserrat', sans-serif;
			font-weight: 300;
		}
        body{
            height: 100%;
            min-height: 100%;
        }
</style>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="nav.css">
        
        <div>
            <nav>
                <!-- Navigation-->
                <ul>
                <li><a href="dashboard.php">DASHBOARD</a></li>
                <li><a href="records.php">RECORDS</a></li>
                <li><a href="sopindex.php">SOP</a></li>
                <li><a href="Cutiindex.php">LEAVE</a></li>
                <li><a href="report/rptst.php">REPORT</a></li>
                <li><a onClick="return confirm('Confirm to logout?')" href="logout.php">LOG OUT</a></li>    
            </ul>
        </nav>
    </div>
</head>
<body style="margin:0;" class="is-preload">
    <title>STAFF SOP</title>
        <div class="content">
            <br><br>
            <center>
            <h1 style="font-family: sans-serif;"><?php echo $sop['department'] ?> SKOP</h1>
            <iframe src="<?php echo $path.$sop['skop']; ?>" width="90%" height="500px"></iframe>
            <h1 style="font-family: sans-serif;"><?php echo $sop['department'] ?> SOP</h1>
            <iframe src="<?php echo $path.$sop['sop']; ?>" width="90%" height="500px"></iframe>
            </center></div>
    <!-- Wrapper -->
        <div id="wrapper">


            <!-- Banner -->
            <section id="banner" class="major">


        
    </div>
</div>
</section>
</head>
<div class="footer">
	<p>Copyright &copy; <a>KaFerry Sdn.Bhd</a>. All Rights Reserved</p>
</div>
</body>
</html>