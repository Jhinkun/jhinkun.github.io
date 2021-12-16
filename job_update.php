<?php 
include 'dbConn.php';

	if (count($_POST) >0 ) {
		$name = $_POST['name'];
		$age = $_POST['age'];
        $gender = $_POST['gender'];
        $education = $_POST['education'];
        $phoneNum = $_POST['phoneNum'];
        $email = $_POST['email'];
        $resume_pdf = $_FILES['resume_pdf']['name'];
        $remarks = $_POST['remarks'];

        if(empty($resume_pdf)){
            $sql = "UPDATE job_app SET name='$name', age='$age',gender='$gender', education='$education', phoneNum='$phoneNum', email='$email', remarks='$remarks' WHERE email='$email'";
                if(mysqli_query($conn, $sql)) {
                    echo "<script>alert('Data has been updated')</script>";
                    echo "<script> location.href='hr_jobApplication.php'; </script>";
                }
        }else{
        //destination of the file on the server
        $destination = 'uploads/resume_pdf/' . $resume_pdf;
        
        //get the file extension
        $extension = pathinfo($resume_pdf, PATHINFO_EXTENSION);
        
        //the physical file on a temporary uploads directory on the server
        $file = $_FILES['resume_pdf']['tmp_name'];
        
        if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
            echo "You file extension must be .zip, .pdf or .docx";
        } else if($_FILES['resume_pdf']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
            echo "File too large!";
        } else {
            //move the uploaded (temp) file to the specified destination
            if(move_uploaded_file($file,$destination)) {
                $sql = "UPDATE job_app SET name='$name', age='$age',gender='$gender', education='$education', phoneNum='$phoneNum', email='$email', resume_pdf='$resume_pdf', remarks='$remarks' WHERE email='$email'";
                if(mysqli_query($conn, $sql)) {
                    echo "<script>alert('Data has been updated')</script>";
                    echo "<script> location.href='hr_jobApplication.php'; </script>";
                }
            } else{
                echo "Failed to update the data.";
            }
        }
    }
    }
    
$result=mysqli_query($conn, "SELECT * FROM job_app where email='".$_GET['email']."'");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Staff Add</title>
        <link rel="stylesheet" href="hr_style.css">
	    <link rel="stylesheet" href="css/all.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	    <link rel="preconnect" href="https://fonts.gstatic.com">
	    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Lemon&family=Lemonada:wght@300&family=Viga&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1 style="text-align:center;">Job Application <?php echo $row["name"];?></h1>
        <div class="table">
            <br><br><br><br>
            <form name="staff_add" method="post" action="" enctype="multipart/form-data">
                <table id="form" cellspacing="5px" align="center">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" value="<?php echo $row["name"];?>"></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><input type="text" name="age" value="<?php echo $row["age"];?>"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><input type="radio" name="gender" <?php if($row['gender']=="F") {echo "checked";}?> value="F">Female &nbsp;&nbsp;<input type="radio" name="gender" <?php if($row['gender']=="M") {echo "checked";}?> value="M">Male</td>
                    </tr>
                    <tr>
                        <td>Education</td>
                        <td><input type="text" name="education" value="<?php echo $row["education"];?>"></td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td><input type="text" name="phoneNum" value="<?php echo $row["phoneNum"];?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" value="<?php echo $row["email"];?>"></td>
                    </tr>
                    <tr>
                        <td>Resume</td>
                        <td><input type="file" name="resume_pdf"></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><select name="remarks"><br>
                            <option value="Unchecked">Unchecked</option>
                            <option value="Checked"> Checked </option>
                        </select></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="submit" value="SUBMIT" class="button"></td>
                    </tr>
                </table>
            </form>
            <a href="hr_jobApplication.php"><button class="back"><i class="fas fa-arrow-left" style="font-size: 25px;"></i></button></a>
        </div>
    </body>
</html>