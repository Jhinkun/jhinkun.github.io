<?php

include 'dbConn.php';

if(count($_POST)>0){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $password=$_POST['password'];
    $icNum=$_POST['icNum'];
    $gender=$_POST['gender'];
    $position=$_POST['position'];
    $department=$_POST['department'];
    $phoneNum=$_POST['phoneNum'];
    $address=$_POST['address'];
    $education=$_POST['education'];
    $status='Active';
    $filename = $_FILES['resume']['name'];
    $recordID= rand(0,10000);

    //profile picture
    $images = $_FILES['imagefile']['tmp_name'];

    if(empty($_FILES['imagefile']['tmp_name'])){
        $image = addslashes(file_get_contents("D:/xampp/htdocs/finalproject/images/profile_picture/default_profile_picture.png"));
    }else{
        $image = addslashes(file_get_contents($images));
    }


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
        //move the uploaded (temp) file to the specified destination
        if(move_uploaded_file($file,$destination)) {
            $sql = "INSERT INTO staff_intern VALUES ('$icNum', '$password', '$name', '$age', '$gender', '$position', '$department', '$phoneNum', '$address', '$education', '$filename', '$image', '$status')";
            $query_run = mysqli_query($conn, $sql);
            $sql2 = "INSERT INTO records VALUES ('$recordID', '$icNum', '$filename')";
            $query_run2 = mysqli_query($conn, $sql2);
            echo "Data failed to be add".mysqli_error($conn);
        } else{
            echo "Failed to save staff's data.";
        }
    }

    if($query_run && $query_run2){
        echo "<script>alert('Staff data has been added')</script>";
        echo "<script> location.href='hr_staffList.php'; </script>";
    }
}
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Lemon&family=Lemonada:wght@300&family=Viga&display=swap" rel="stylesheet">
    </head>
    <body>
    <a href="hr_staffList.php"><button class="back"><i class="fas fa-arrow-left" style="font-size: 25px;"></i></button></a>
    <br><br>
        <h1>STAFF ADD</h1>
        <div class="table">
            <br>
            <form name="staff_add" method="post" action="" enctype="multipart/form-data">
                <table id="form" cellspacing="5px" align="center">
                    <tr>
                        <td class="head">Name</td>
                        <td><input type="text" name="name" size="30px" placeholder="Enter staff's name"></td>
                    </tr>
                    <tr>
                        <td class="head">Password</td>
                        <td><input type="text" name="password" size="30px" placeholder="Enter staff's password"></td>
                    </tr>
                    <tr>
                        <td class="head">Age</td>
                        <td><input type="text" name="age" size="30px" placeholder="Enter staff's age"></td>
                    </tr>
                    <tr>
                        <td class="head">IC Number</td>
                        <td><input type="text" name="icNum" size="30px" placeholder="Enter staff's IC Number"></td>
                    </tr>
                    <tr>
                        <td class="head">Gender</td>
                        <td><input type="radio" name="gender" value="F">Female &nbsp;&nbsp;<input type="radio" name="gender" value="M">Male</td>
                    </tr>
                    <tr>
                        <td class="head">Position</td>
                        <td><select name="position"><br>
                            <option value="None">- PLEASE SELECT -</option>
                            <option value="Staff"> Staff </option>
                            <option value="Intern"> Intern </option>
                        </select></td>
                    </tr>
                    <tr>
                        <?php
                        $sql = "SELECT department FROM department";
                        $result = mysqli_query($conn,$sql);
                        ?>
                        <td class="head">Department</td>
                        <td><select name="department"><br>
                        <option value="None">- PLEASE SELECT -</option>
                        <?php
                        while($row=mysqli_fetch_assoc($result)){
                        ?>
                            <option value="<?php echo $row['department'];?>"><?php echo $row['department'];?></option>
                            <?php
                            }
                            ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td class="head">Phone Number</td>
                        <td><input type="text" size="30px" name="phoneNum" placeholder="Enter staff's phone number"></td>
                    </tr>
                    <tr>
                        <td class="head">Address</td>
                        <td><input type="text" name="address" size="30px" placeholder="Enter staff's home address"></td>
                    </tr>
                    <tr>
                        <td class="head">Education</td>
                        <td><input type="text" name="education" size="30px" placeholder="Enter your education level"></td>
                    </tr>
                    <tr>
                        <td class="head">Staff Resume</td>
                        <td><input type="file" name="resume"></td>
                    </tr>
                    <tr>
                        <td class="head">Staff's Profile Picture (Optional)</td>
                        <td><input type="file" name="imagefile"></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="submit" value="SUBMIT" class="btn_submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>