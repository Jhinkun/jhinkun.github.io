<?php 
    session_start();
    include("dbConn.php");
    include("functionA.php");
    $admin_data=check_login($conn);
     if(count($_POST)>0){
		 $department=$_POST['department'];
		 $skopfile = $_FILES['skop']['name'];
         $sopfile = $_FILES['sop']['name'];

         //destination of the file on the server
         $destinationSkop = 'uploads/skop_kerja/' . $skopfile;
         $destinationSop = 'uploads/skop_kerja/' . $sopfile;

         //get the file extension
         $extensionSkop = pathinfo($skopfile, PATHINFO_EXTENSION);
         $extensionSop = pathinfo($sopfile, PATHINFO_EXTENSION);

        //the physical file on a temporary uploads directory on the server
        $fileskop = $_FILES['skop']['tmp_name'];
        $filesop = $_FILES['sop']['tmp_name'];

        // if (!in_array($extensionSkop, ['zip', 'pdf', 'docx']) && !in_array($extensionSop, ['zip', 'pdf', 'docx'])) 
        // {
        //     echo "You file extension must be .zip, .pdf or .docx";
        // } 
        // else if($_FILES['sop']['size'] > 1000000 or $_FILES['skop']['size']>1000000) 
        // { // file shouldn't be larger than 1Megabyte
        //     echo "File too large!";
        // } 
        // else 
        // {
            //move the uploaded (temp) file to the specified destination
				if(move_uploaded_file($filesop,$destinationSop) && move_uploaded_file($fileskop,$destinationSkop))
                {
					$sql = "INSERT INTO department(department, skop, sop) VALUES ('$department', '$skopfile', '$sopfile')";
					$query = mysqli_query($conn, $sql);
					if($query)
					{
						echo "<script>alert('Succesfully Add!!');
						window.location='department.php'</script>";
					}
					else{
						echo "<script>alert('Adding Failed!!');
						window.location='newDep.php'</script>";
					}    
				}
                 
            }
        // }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="dep.css">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Lemon&family=Lemonada:wght@300&family=Viga&display=swap" rel="stylesheet">
    <style>
		html{
			scroll-behavior: smooth;
		}
		body{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
            background:url( "images/building.png")center center no-repeat ;
            background-size: cover;
		}
		option{
			text-transform: uppercase;
		}
        .light{
            text-align: center;
            color: white;
            letter-spacing: 2px;
            font-family: 'Poppins', sans-serif;	
        }
	</style>
<title>New Department</title>
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
    <div class="info">
        <div >
            <h1 class="light" style="padding-top: 0px; ">NEW DEPARTMENT</h1>
                <!-- <div style="padding-left: 50px;padding-bottom: 30px;left: 0;bottom: 0;position: absolute;">
                    <button><a style="color: black; text-decoration: none;" onClick="return confirm('The form will not be saved')" href="department.php">BACK</a></button>
                </div> -->
        </div>
        <div>
            <form name="staff_add" method="post" action="" enctype="multipart/form-data">
                <table id="form" cellspacing="40px" align="center">
                    <tr>
                        <td style="width: 100%;" class="head">Department Name</td>
                        <td><input type="text" name="department" style="font-size: 13px;" placeholder="Insert Department Name" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td style="width: 100%;" class="head">Sop</td>
                        <td><input class="head" type="file" name="sop" style="font-size: 13px;"></td>
                    </tr>
                    <tr>
                        <td style="width: 100%;" class="head">Job Scope</td>
                        <td><input class="head" type="file" name="skop" style="font-size: 13px;"></td>
                    </tr>
                    
                </table>
                <table cellspacing="20px" align="center">
                    <tr>
                        <td><button class="back"><a style="color:white;text-decoration: none;" onClick="return confirm('The form will not be saved')" href="department.php">BACK</a></button></td>
                        <td><button class="submit" type="submit" name="submit" >SUBMIT</button></td>
                    </tr>
                </table>
                
            </form>
        </div>
        
    </div>
    
</div>
    
</body>
</html>