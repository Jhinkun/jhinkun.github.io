<?php

include "dbConn.php";
session_start();
include 'functionA.php';
$admin_data = check_login($conn);
$sql = "SELECT * FROM job_app ORDER BY jobdate desc";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

$filepath = 'uploads/resume_pdf/';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
        <title>Job Application List</title>
        <link rel="stylesheet" href="hr_style.css">
    <link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
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
    <div class="content">
    <h1>JOB APPLICATION</h1>
    <br><br>
        <h3>SEARCH JOB'S EDUCATION: </h3>
        <form name= "admin" action="" method="GET" autocomplete="off">
            <div class="searchbar"><center>
                <input class="bar_jobApp" type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Enter education level">
                <br><br>
                <button type="submit" class="search_jobApp"><i class="fas fa-search"></i></button>
                <button class="search-back_jobApp" type="button" onclick="window.location.href='hr_jobApplication.php';" ><i class="fas fa-arrow-left" style="font-size: 25px;"></i></button>
                </center>
            </div>
        </form>
        <div class="table">
                <table>
                    <thead>
                        <th>DATE</th>
                        <th>NAME</th>
                        <th>AGE</th>
                        <th>GENDER</th>
                        <th>EDUCATION</th>
                        <th>PHONE NUMBER</th>
                        <th>EMAIL</th>
                        <th>RESUME</th>
                        <th>REMARKS</th>
                        <th colspan="2">ACTION</th>
                    </thead>
                    <?php
                    if (isset($_GET['search'])){
                        $resultjob = $_GET['search'];
                        $result = mysqli_query($conn, "SELECT * FROM job_app WHERE CONCAT(education) LIKE '%$resultjob%'" );
                        if (mysqli_num_rows($result) >0) {
                            while ($file = mysqli_fetch_array($result)){
                                ?>
                    <tr>
                        <td><?php echo $file["jobdate"];?></td>
                        <td><?php echo $file["name"];?></td>
                        <td><?php echo $file["age"];?></td>
                        <td><?php echo $file["gender"];?></td>
                        <td><?php echo $file["education"];?></td>
                        <td><?php echo $file["phoneNum"];?></td>
                        <td><?php echo $file["email"];?></td>
                        <td><a href="<?php echo $filepath.$row['file_name'] ?>"><button class="btn_download" type="button">DOWNLOAD</button></a></td>
                        <td><?php echo $file["remarks"];?></td>
                        <td class="btn_action"><a href="job_update.php?email=<?php echo $file["email"];?>"><button class="btn_upd" type="button"><span></span>UPDATE</button></a></td>
                        <td class="btn_action"><a  onclick="confirmDelete(this); return false;" href="job_delete.php?email=<?php echo $file["email"];?>"><button class="btn_del" type="button"><span></span>DELETE</button></a></td>
                    </tr>
                    <?php }}}
                    else {
                    $result = mysqli_query($conn, "SELECT * FROM job_app" );
                    foreach ($files as $file):
                    ?>
                    <tr>
                        <td><?php echo $file["jobdate"];?></td>
                        <td><?php echo $file["name"];?></td>
                        <td><?php echo $file["age"];?></td>
                        <td><?php echo $file["gender"];?></td>
                        <td><?php echo $file["education"];?></td>
                        <td><?php echo $file["phoneNum"];?></td>
                        <td><?php echo $file["email"];?></td>
                        <td><a href="<?php echo $filepath.$row['file_name'] ?>"><button class="btn_download" type="button">DOWNLOAD</button></a></td>
                        <td><?php echo $file["remarks"];?></td>
                        <td class="btn_action"><a href="job_update.php?email=<?php echo $file["email"];?>"><button class="btn_upd" type="button"><span></span>UPDATE</button></a></td>
                        <td class="btn_action"><a  onclick="confirmDelete(this); return false;" href="job_delete.php?email=<?php echo $file["email"];?>"><button class="btn_del" type="button"><span></span>DELETE</button></a></td>
                    </tr>
                    <?php endforeach;} ?>
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
    </div>
    <div class="footer">
        <p class="fp">Copyright &copy; <a>Ferryrich Sdn Bhd</a>. All Rights Reserved</p>
    </div>
    </body>
</html>