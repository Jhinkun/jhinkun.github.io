<?php
session_start();
include 'dbConn.php';
include("functionA.php");
$admin_data=check_login($conn);

$ops = $agent = $ecom = $creative = $dept = "";
// $sql = "SELECT department FROM department";
// $result = mysqli_query($conn, $sql);
// $depts = mysqli_fetch_all($result, MYSQLI_ASSOC);
// $agent = $depts[0];
// $creative = $depts[1];
// $ecom = $depts[2];
// $ops = $depts[3];
$dept = $_GET['department'];

if (isset($_POST['edit'])){
    $dept = $_GET['department'];

}

if(count($_POST)>0){
    $name=$_POST['deptName'];
    $sop = $_FILES['sop']['name'];
    $scope = $_FILES['scope']['name'];

    //destination of the file on the server
    $destination1 = 'uploads/skop_kerja/' . $sop;
    $destination2 = 'uploads/skop_kerja/' . $scope;

    //get the file extension
    $extension1 = pathinfo($sop, PATHINFO_EXTENSION);
    $extension2 = pathinfo($scope, PATHINFO_EXTENSION);

    //the physical file on a temporary uploads directory on the server
    $file1 = $_FILES['sop']['tmp_name'];
    $file2 = $_FILES['scope']['tmp_name'];

    // if (!in_array($extension1, ['zip', 'pdf', 'docx']) && !in_array($extension2, ['zip', 'pdf', 'docx'])) {
    //     echo "Your file extension must be .zip, .pdf or .docx";
    // } else if($_FILES['sop']['size'] > 1000000  || $_FILES['scope']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
    //     echo "File too large!";
    // } else {
        //move the uploaded (temp) file to the specified destination
        
        if(move_uploaded_file($file1,$destination1) || move_uploaded_file($file2,$destination2)) {
            $sql = "UPDATE department SET sop = '$sop', skop = '$scope' WHERE department = '$name'";
        $result = mysqli_query($conn, $sql);
        }  else{
            echo "Failed to save department's data.";
        }
    // }

    if($result){
        echo "<script>alert('Department data has been edited')</script>";
        echo "<script> location.href='department.php'; </script>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Edit Dept</title>
        <link rel="stylesheet" href="hr_style.css">
    <link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Lemon&family=Lemonada:wght@300&family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <style>
        html{
			scroll-behavior: smooth;
		}
		body{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}
        .banner {
            width: 100%;
            height: 17vh;
            background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.100)),url(background2.jpg);
            background-position: center;
        }
        .navibar {

            width: 100%;
            margin: center;
            display: flex;
            padding: 30px 0;
            text-align: center;
            background: rgba(50, 50, 120, 0.9);
            position: fixed;
            justify-content: center;
            z-index: 9999;
        }
        .logo {
            float: left;
            position:absolute;
            top: 10px;
            left: 50px;
            width: 100px;
            height: 100px;
        }
        .navibar ul li{

            list-style: none;
            object-position: center;
            display: inline-block;
            margin: 0 10px;
            position: relative;
        }
        .navibar ul li a{

            display: inline-block;
            color: white;
            margin: 0px;
            padding: 5px 20px;
            font-family: 'Squada One', cursive;
            font-size: 25px;
            text-decoration: none;
        }
        .navibar a{

            background: none;
        }
        .navibar a:hover{

            background:white;
            color:black;
            border-radius:10px;
            transition: 0.5s;
        }
        .navibar ul li::after{

            content: '';
            height: 3px;
            width: 0%;
            position: absolute;
            background: red;
            left: 0;
            bottom: -6px;
            transition: 0.5s;
        }
        .navibar ul li:hover::after{

            width: 100%;
        }
        .back {   
            background-color:#050505;
            padding: 10px;   
            cursor: pointer;   
            border: none; 
            border-radius: 10px;
            width:60px;
            color:white;
        }
        .submit {   
            background-color:#050505;
            padding: 10px;   
            cursor: pointer;   
            border: none; 
            border-radius: 10px;
            width:auto;
            color:white;
        }
    </style>
    </head>
    <body>
    <div class="banner">
		<nav class="navibar">
			<img class="logo" src="images/logo.png" style="width: 100px; height: 100px;">
			<ul>
				<li><a href="hr_staffList.php">Staff List</a></li>
				<li><a href="department.php">Department</a></li>
				<li><a href="hr_records.php">Records</a></li>
				<li><a href="hr_jobApplication.php">Job Application</a></li>
				<li><a href="report/rpt.php">Report</a></li> 
				<li><a href="CzutiListPermohonan.php">Leave Application</a></li>
				<li><a href="displayasset.php">Asset</a></li>
				<li><a onClick="return confirm('Confirm to logout?')" href="adminlogout.php">Log Out</a></li>
			</ul>
		</nav>
    </div>
    <!-- <a href="department.php"><button class="back"><i class="fas fa-arrow-left" style="font-size: 25px;margin-top:90px;"></i></button></a> -->
    <br><br>
        <h1>EDIT DEPARTMENT</h1>
        <div class="table">
            <br>
            <form name="staff_add" method="post" action="" enctype="multipart/form-data">
                <table id="form" cellspacing="5px" align="center">
                    <tr>
                        <td class="head">Dept Name</td>
                        <td><input type="text" name="deptName" size="30px" value="<?php echo $dept; ?>"></td>
                    </tr>
                    <tr>
                        <td class="head">Sop</td>
                        <td><input type="file" name="sop" ></td>
                    </tr>
                    <tr>
                        <td class="head">Job Scope</td>
                        <td><input type="file" name="scope" ></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="edit" value="SUBMIT" class="btn_submit"></td>
                    </tr>
                    
                </table>
                <!-- <table class="tbl" cellspacing="20px" align="center">
                    <tr>
                        <td><button class="back"><a style="color:white;text-decoration: none;" onClick="return confirm('The form will not be saved')" href="department.php">BACK</a></button></td>
                        <td><button class="submit" type="submit" name="submit" >SUBMIT</button></td>
                    </tr>
                </table> -->
            </form>
        </div>
    </body>
</html>