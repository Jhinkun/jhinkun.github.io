<?php
    include "dbConn.php";
    session_start();
    include 'functionA.php';
    $admin_data = check_login($conn);
    $sql = "SELECT * FROM staff_intern";
    $result = mysqli_query($conn, $sql);

    $files = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $filepath = 'uploads/staff_resume/';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <title>Staff List</title>
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
            <h1>STAFF LIST</h1>
            <div class="table">
                <a href="staff_add.php"><button class="btn_add" type="button"><span>ADD NEW STAFF</span></button></a>
                <br><br>
                <?php
                    $result = mysqli_query($conn, "SELECT * FROM staff_intern ORDER BY position, department");
                
                    if(mysqli_num_rows($result) >0){
                ?>
                <table>
                    <tr>
                        <th>NAME</th>
                        <th>AGE</th>
                        <th>IC NUMBER</th>
                        <th>POSITION</th>
                        <th>DEPARTMENT</th>
                        <th>PHONE NUMBER</th>
                        <th>GENDER</th>
                        <th>STATUS</th>
                        <th>RESUME</th>
                        <th colspan="2">ACTIONS</th>
                    </tr>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $row["name"];?></td>
                        <td><?php echo $row["age"];?></td>
                        <td><?php echo $row["icNumber"];?></td>
                        <td><?php echo $row["position"];?></td>
                        <td><?php echo $row["department"];?></td>
                        <td><?php echo $row["phoneNum"];?></td>
                        <td><?php echo $row["gender"];?></td>
                        <td><?php echo $row["status"];?></td>
                        <td><a href="<?php echo $filepath.$row['file_name'] ?>"><button class="btn_download" type="button">DOWNLOAD</button></a></td>
                        <td class="btn_action"><a href="staff_update.php?icNumber=<?php echo $row["icNumber"];?>"><button class="btn_upd" type="button"><span></span>UPDATE</button></a></td>
                        <td class="btn_action"><a  onclick="confirmDelete(this); return false;" href="staff_delete.php?icNumber=<?php echo $row["icNumber"];?>"><button class="btn_del" type="button"><span></span>DELETE</button></a></td>
                    </tr>
                    <?php
                    $i++;
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
                <?php
                }
                else {
                echo "No result found";
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>
        <div class="footer">
            <p class="fp">Copyright &copy; <a>Ferryrich Sdn Bhd</a>. All Rights Reserved</p>
        </div>
    </body>
</html>