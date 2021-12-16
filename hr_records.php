<?php

include 'dbConn.php';

session_start();
include 'functionA.php';
$admin_data = check_login($conn);
$sql = "SELECT * FROM staff_intern";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

$filepath = 'uploads/records/';


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Records List</title>
        <link rel="stylesheet" href="hr_style.css">
        <link rel="stylesheet" href="css/all.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	    <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    </head>
    <body>
    <div class="banner">
        <nav class="navbar">
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
    <div class="contents">
        <h1>RECORDS</h1>
        <a class="a_add" href="record_add.php"><button class="btn_add" type="button"><span>ADD NEW RECORD</span></button></a>
        <h2>Search Record : </h2>
        <form name= "admin" action="" method="GET" autocomplete="off">
            <div class="carian"><center>
                <input class="bar" type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Enter file name/staff name/staff ic number">
                <br><br>
                <button type="submit" class="search"><i class="fas fa-search"></i></button>
                <button class="search-back" type="button" onclick="window.location.href='hr_records.php';" ><i class="fas fa-arrow-left"></i></button>
                </center>
            </div>
        </form>
        <br>
        <?php
        if (isset($_GET['search'])){
            $search = $_GET['search'];
            $sql = "SELECT records.recordID, records.file_name, records.icNumber, staff_intern.name, staff_intern.icNumber FROM records JOIN staff_intern ON records.icNumber=staff_intern.icNumber AND CONCAT(records.recordID, records.file_name, records.icNumber, staff_intern.name, staff_intern.icNumber) LIKE '%$search%'"; 
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) >0){
            ?>
            <table>
                <tr>
                    <th>RECORD ID</th>
                    <th>FILE NAME</th>
                    <th>IC NUMBER</th>
                    <th>STAFF NAME</th>
                    <th colspan="2">ACTION</th>
                </tr>
                <?php
                $i=0;
                while($row=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['recordID']; ?></td>
                    <td><?php echo $row['file_name']; ?></td>
                    <td><?php echo $row['icNumber']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><a href="<?php echo $filepath.$row['file_name'] ?>" target="_blank"><button class="btn_download" type="button">DOWNLOAD</button></a></td>
                    <td class="btn_action"><a  onclick="confirmDelete(this); return false;" href="record_delete.php?recordID=<?php echo $row["recordID"];?>"><button class="btn_del" type="button"><span></span>DELETE</button></a></td>
                </tr>
                <?php
                }
            }
        } else {

        $sql = "SELECT records.recordID, records.file_name, records.icNumber, staff_intern.name, staff_intern.icNumber FROM records JOIN staff_intern ON records.icNumber=staff_intern.icNumber"; 
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) >0){
        ?>
        <table>
            <tr>
                <th>RECORD ID</th>
                <th>FILE NAME</th>
                <th>IC NUMBER</th>
                <th>STAFF NAME</th>
                <th colspan="2">ACTION</th>
            </tr>
            <?php
            $i=0;
            while($row=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['recordID']; ?></td>
                <td><?php echo $row['file_name']; ?></td>
                <td><?php echo $row['icNumber']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><a href="<?php echo $filepath.$row['file_name'] ?>"><button class="btn_download" type="button">DOWNLOAD</button></a></td>
                <td class="btn_action"><a  onclick="confirmDelete(this); return false;" href="record_delete.php?recordID=<?php echo $row["recordID"];?>"><button class="btn_del" type="button"><span></span>DELETE</button></a></td>
            </tr>
            <?php
            }
            }
        }
        ?>
        </table>
        <script>
            function confirmDelete(anchor) {
             var conf = confirm("Do you want to delete this data?");
             if(conf){
                 window.location=anchor.attr("href");
                }
            }
        </script>
    </div>
    <div class="footer">
        <p class="fp">Copyright &copy; <a>Ferryrich Sdn Bhd</a>. All Rights Reserved</p>
    </div>
    </body>
</html>