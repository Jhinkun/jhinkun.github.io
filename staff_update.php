<?php

include 'dbConn.php';

if(count($_POST)>0){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $password=$_POST['password'];
    $icNumber=$_POST['icNumber'];
    $gender=$_POST['gender'];
    $position=$_POST['position'];
    $department=$_POST['department'];
    $phoneNum=$_POST['phoneNum'];
    $address=$_POST['address'];
    $education=$_POST['education'];
    $status=$_POST['status'];
    $filename = $_FILES['resume']['name'];

    if($position==='None' and $department==='None')
    {
        echo 'Please appoint the correct position and department of the staff.';
    }else if($department==='None')
    {
        echo 'Please appoint the correct department of the staff.';
    }else{
        echo 'Please appoint the correct position of the staff.';
    }

    if(empty($filename)){
        $sql = "UPDATE staff_intern SET icNumber='$icNumber', name='$name', age='$age',pass='$password', gender='$gender', position='$position', department='$department', phoneNum='$phoneNum', address='$address', education='$education', status='$status' WHERE icNumber='$icNumber'";
        if(mysqli_query($conn, $sql)) {
            echo "<script>alert('Staff data has been updated')</script>";
            echo "<script> location.href='hr_staffList.php'; </script>";
        } else{
            echo "Failed to update staff's data.";
        }
    }else{
    //destination of the file on the server
    $destination = 'uploads/staff_resume/' . $filename;

    //get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    //the physical file on a temporary uploads directory on the server
    $file = $_FILES['resume']['tmp_name'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } else if($_FILES['resume']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        $resume = 0;
        //move the uploaded (temp) file to the specified destination
        if(move_uploaded_file($file,$destination)) {
            $sql = "UPDATE staff_intern SET icNumber='$icNumber', name='$name', age='$age',pass='$password', gender='$gender', position='$position', department='$department', phoneNum='$phoneNum', address='$address', education='$education', status='$status', file_name='$filename' where icNumber='$icNumber'";
            if(mysqli_query($conn, $sql)) {
                echo "<script>alert('Staff data has been updated')</script>";
                echo "<script> location.href='hr_staffList.php'; </script>";
            }
        } else{
            echo "Failed to update staff's data.";
        }
    }
    }
}

$result=mysqli_query($conn, "SELECT * FROM staff_intern where icNumber='".$_GET['icNumber']."'");
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Staff Update</title>
        <link rel="stylesheet" href="hr_style.css">
    <link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Lemon&family=Lemonada:wght@300&family=Viga&display=swap" rel="stylesheet">
    </head>
    <body>
    <a href="hr_staffList.php"><button class="back"><i class="fas fa-arrow-left" style="font-size: 25px;"></i></button></a>
        <br><br>
        <h1>STAFF UPDATE <?php echo $row["name"];?></h1>
        <div class="table">
            <br>
            <form name="staff_add" method="post" action="" enctype="multipart/form-data">
                <table id="form" cellspacing="5px" align="center">
                    <tr>
                        <td class="head">Name</td>
                        <td><input type="text" size="30px" name="name" value="<?php echo $row["name"];?>"></td>
                    </tr>
                    <tr>
                        <td class="head">Password</td>
                        <td><input type="text" size="30px" name="password" value="<?php echo $row["pass"];?>"></td>
                    </tr>
                    <tr>
                        <td class="head">Age</td>
                        <td><input type="text" size="30px" name="age" value="<?php echo $row["age"];?>"></td>
                    </tr>
                    <tr>
                        <td class="head">IC Number</td>
                        <td><input type="text" size="30px" name="icNumber" value="<?php echo $row["icNumber"];?>"></td>
                    </tr>
                    <tr>
                        <td class="head">Gender</td>
                        <td><input type="radio" name="gender" <?php if($row['gender']=="F") {echo "checked";}?> value="F">Female &nbsp;&nbsp;
                        <input type="radio" name="gender" <?php if($row['gender']=="M") {echo "checked";}?> value="M">Male</td>
                    </tr>
                    <tr>
                        <td class="head">Position</td>
                        <td><select name="position"><br>
                            <option value="Staff" <?php if($row['position']=="Staff") {echo "selected";}?>> Staff </option>
                            <option value="Intern" <?php if($row['position']=="Intern") {echo "selected";}?>> Intern </option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class="head">Department</td>
                        <td><select name="department"><br>
                            <option value="ECOM" <?php if($row['department']=="ECOM") {echo "selected";}?>> E-Commerce </option>
                            <option value="Creative" <?php if($row['department']=="Creative") {echo "selected";}?>> Creative </option>
                            <option value="Agent" <?php if($row['department']=="Agent") {echo "selected";}?>> Agent </option>
                            <option value="Operation" <?php if($row['department']=="Operation") {echo "selected";}?>>Operation</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class="head">Phone Number</td>
                        <td><input type="text" size="30px" name="phoneNum" value="<?php echo $row["phoneNum"];?>"></td>
                    </tr>
                    <tr>
                        <td class="head">Address</td>
                        <td><input type="text" size="30px" name="address" value="<?php echo $row["address"];?>"></td>
                    </tr>
                    <tr>
                        <td class="head">Education</td>
                        <td><input type="text" size="30px" name="education" value="<?php echo $row["education"];?>"></td>
                    </tr>
                    <tr>
                        <td class="head">Status</td>
                        <td><select name="status"><br>
                            <option value="Active" <?php if($row['status']=="Active") {echo "selected";}?>>Active</option>
                            <option value="Retired" <?php if($row['status']=="Retired") {echo "selected";}?>>Retired</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class="head">Staff Resume (Optional)</td>
                        <td><input type="file" name="resume"></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="submit" value="SUBMIT" class="btn_submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>