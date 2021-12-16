<?php
include 'dbConn.php';
session_start();
include 'functionA.php';
$admin_data = check_login($conn);

?>
<!DOCTYPE html>
<html>
    <head>
        <title> SENARAI PEMOHON CUTI </title>
        <!-- <link rel="stylesheet" href="Cutistyle.css"> -->
        <link rel="stylesheet" href="hr_style.css">
		<link rel="stylesheet" href="css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="preconnect" href="https://fonts.googleapis.com">
	 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    </head>
    <script>
        

            function checkNum()
            {
                var checkhp=document.admin.search.value;
                    if (isNaN(checkhp))
                    {
                        alert("Must be in digit value!");
                        document.admin.search.click();
                    }
            }   

    </script>



<body style=margin:0>
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
<br><br><br>
<h1 style="margin:20">Masukkan No Kad Pengenalan : </h1>
<form name= "admin" action="" method="GET" autocomplete="off">
    <div class="carian"><center>
        <input class="bar_leave" type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data" onkeyup="checkNum()">
        <br><br><br>
        <button type="submit" class="btn btn-primary">Search</button>
        <button type="button" onclick="window.location.href='CzutiListPermohonan.php';" > Back </button>
        </center>
    </div>
</form>
 <h1 align="center">SENARAI PERMOHONAN CUTI  </h1>
 <table align="center" border="1" style=margin:30px>
 <tr>

 <th> Request Date&nbsp; </th>
 <th> Leave ID&nbsp; </th>
 <th> IC Number&nbsp; </th>
 <th> Name&nbsp; </th>
 <th> Position&nbsp; </th>
 <th> Department&nbsp; </th>
 <th> Leave Type&nbsp; </th>
 <th> Start Date&nbsp; </th>
 <th> End Date&nbsp; </th>
 <th> Duration&nbsp; </th>
 <th> Reasons&nbsp; </th>
 <th> Status&nbsp; </th>

 <th colspan="2"> Action &nbsp; </th>
 </tr>
 <?php 
    $con = mysqli_connect("localhost","root","","finalproject");
    if(isset($_GET['search']))
    {
    $filtervalues = $_GET['search'];
    $query = "SELECT * FROM leave_app WHERE CONCAT(icNumber) LIKE '%$filtervalues%' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
    foreach($query_run as $row)
    {
    ?>
    <tr>
    <td><?php echo $row['reqDate'] ?></td>
    <td><?php echo $row['leaveId'] ?></td>
    <td><?php echo $row['icNumber'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['position'] ?></td>
    <td><?php echo $row['department'] ?></td>
    <td><?php echo $row['leaveType'] ?></td>
    <td><?php echo $row['startDate'] ?></td>
    <td><?php echo $row['endDate'] ?></td>
    <td><?php echo $row['duration'] ?></td>
    <td><?php echo $row['reason'] ?></td>
    <td><?php echo $row['status'] ?></td>
    <td><a href="Czutiupdmohon.php?leaveId=<?php echo $row['leaveId'] ?>"  role="button"><button class="btn_upd">UPDATE</button></a></td>
    <td><a href="Czutidelmohon.php?leaveId=<?php echo $row['leaveId'] ?>"  role="button"><button class="btn_del">DELETE</button></a></td>
    </tr>
    <?php
    }
    }
}
else
{
$sql = "SELECT * from leave_app ORDER BY reqDate";
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $row['reqDate'] ?></td>
<td><?php echo $row['leaveId'] ?></td>
<td><?php echo $row['icNumber'] ?></td>
<td><?php echo $row['name'] ?></td>
<td><?php echo $row['position'] ?></td>
<td><?php echo $row['department'] ?></td>
<td><?php echo $row['leaveType'] ?></td>
<td><?php echo $row['startDate'] ?></td>
<td><?php echo $row['endDate'] ?></td>
<td><?php echo $row['duration'] ?></td>
<td><?php echo $row['reason'] ?></td>
<td><?php echo $row['status'] ?></td>
<td><a href="Czutiupdmohon.php?leaveId=<?php echo $row['leaveId'] ?> & "  role="button"><button class="btn_upd">UPDATE</button></a></td>
<td><a href="Czutidelmohon.php?leaveId=<?php echo $row['leaveId'] ?> & "  role="button"><button class="btn_del">DELETE</button></a></td>
</tr>
<?php
}
}
?>
<?php
// include_once "dbConn.php";
// //write the SQL command

// $sql = "SELECT * from leave_app ORDER BY reqDate";
//  $result = mysqli_query($conn, $sql);
//  while($row = mysqli_fetch_assoc($result))
//   {
//  Print '<tr>
//  <td>'.$row['reqDate'].'</td>
//  <td>'.$row['leaveId'].'</td>
//  <td>'.$row['icNumber'].'</td>
//  <td>'.$row['name'].'</td>
//  <td>'.$row['position'].'</td>
//  <td>'.$row['department'].'</td>
//  <td>'.$row['leaveType'].'</td>
//  <td>'.$row['startDate'].'</td>
//  <td>'.$row['endDate'].'</td>
//  <td>'.$row['duration'].'</td>
//  <td>'.$row['reason'].'</td>
//  <td>'.$row['status'].'</td>

//  <td><a href="Czutiupdmohon.php?leaveId='.$row['leaveId'].' & "  role="button"><button class="btn_upd">UPDATE</button></a></td>
//  <td><a href="Czutidelmohon.php?leaveId='.$row['leaveId'].' & "  role="button"><button class="btn_del">DELETE</button></a></td>';

//  }
?>

 </table>


</center><br>
<div class="footer">
    <p class="fp">Copyright &copy; <a>Ferryrich Sdn Bhd</a>. All Rights Reserved</p>
</div>
</body>
</html>