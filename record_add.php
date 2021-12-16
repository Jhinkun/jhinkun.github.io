<?php

include 'dbConn.php';

$sql = "SELECT name from staff_intern";
$result = mysqli_query($conn,$sql);

if(count($_POST)>0){

    $name=$_POST['name'];
    $sql = "SELECT icNumber FROM staff_intern WHERE name='$name'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $icNum= $row["icNumber"];
    $recordID= rand(0,10000);
    $filename = $_FILES['resume']['name'];

    //destination of the file on the server
    $destination = 'uploads/records/' . $filename;

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
            $sql = "INSERT INTO records (recordID, icNumber, file_name) VALUES ('$recordID', '$icNum', '$filename')";
            $query_run = mysqli_query($conn, $sql);
            
        } else{
            echo "Data failed to be add".mysqli_error($conn);echo "Failed to save record.";
        }

        if($query_run){
            echo "<script>alert('Record data has been added')</script>";
            echo "<script> location.href='hr_records.php'; </script>";
            
        }
    }

    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Record Add</title>
        <link rel="stylesheet" href="hr_style.css">
    <link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Lemon&family=Lemonada:wght@300&family=Viga&display=swap" rel="stylesheet">
    </head>
    <body>
    <a href="hr_records.php"><button class="back"><i class="fas fa-arrow-left" style="font-size: 25px;"></i></button></a>
    <br><br>
        <h1>RECORD ADD</h1>
        <div class="table">
            <br>
            <form name="record_add" method="post" action="" enctype="multipart/form-data">
                <table id="form" cellspacing="5px" align="center">
                    <tr>
                        <td class="head">Staff Name</td>
                        <td><select name="name">
                        <option value="None">--PLEASE SELECT--</option>
                        <?php
                        while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                        <?php
                        }
                        ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td class="head">Staff Resume</td>
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