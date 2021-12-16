<?php

include 'dbConn.php';

?>


<!DOCTYPE html>
<html lang ="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="displayasset.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>ASSET KA FERRY SDN.BHD</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
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
  <div class="container">
  <h1>ASSET KAFERRY SDN BHD</h1>
  <h2>Search Asset : </h2>
  <form class="cari" name= "admin" action="" method="GET" autocomplete="off">
            <div class="carian"><center>
                <input class="bar" type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="asset name/asset id/staff name">
                <br><br>
                <button type="submit" class="search"><i class="fas fa-search"></i></button>
                <a><button class="search-back" type="button" onclick="window.location.href='displayasset.php'" ><i class="fas fa-arrow-left" style="font-size: 25px;"></i></button></a>
                </center>
            </div>
        </form>
    <style>
table, th, td 
{
  border:2px solid grey;
}
</style>
  
  <a href="assets.php"><button class="btn_add">ADD ASSET</button></a>
<?php
if (isset($_GET['search']))
{
  $searchresult = $_GET['search'];
  $result = mysqli_query($conn, "SELECT * FROM asset WHERE CONCAT(assets_name, assets_id, assets_PIC, assets_dateIn) LIKE '%$searchresult%'");
                
  if(mysqli_num_rows($result) >0)
  {
?>
<table class="info" style="width:90%"><a style="text-decoration: none;" href="assets.php">
<thead>
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>QUANTITY</th>
    <th>DATE REGISTERED</th>
    <th>CONDITION</th>
    <th>PERSON IN CHARGE</th>
    <th colspan="2">ACTIONS</th>
  </tr>
</thead>
<tbody>
<?php
$i=0;
while($row = mysqli_fetch_array($result))
{
?>
<tr class="data">
<td class="data1" ><?php echo $row["assets_id"];?></td>
<td><?php echo $row["assets_name"];?></td>
<td><?php echo $row["assets_quantity"];?></td>
<td><?php echo $row["assets_dateIn"];?></td>
<td><?php echo $row["asset_cond"];?></td>
<td><?php echo $row["assets_PIC"];?></td>
<td class="btn_action"><a href="updateasset.php?assets_id=<?php echo $row["assets_id"];?>"><button class="btn_upd" type="button"><span></span>UPDATE</button></a></td>
<td class="btn_action"><a  onclick="confirmDelete(this); return false;" href="deleteasset.php?assets_id=<?php echo $row["assets_id"];?>"><button class="btn_del" type="button"><span></span>DELETE</button></a></td>
</tr>
<?php
$i++;
}
}
} else {

  $result = mysqli_query($conn, "SELECT * FROM asset");
                
  if(mysqli_num_rows($result) >0){
?>
<table class="info" style="width:90%"><a style="text-decoration: none;" href="assets.php">
<thead>
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>QUANTITY</th>
    <th>DATE REGISTERED</th>
    <th>CONDITION</th>
    <th>PERSON IN CHARGE</th>
    <th colspan="2">ACTIONS</th>
  </tr>
</thead>
<tbody>
<?php
$i=0;
while($row = mysqli_fetch_array($result))
{
?>
<tr class="data">
<td class="data1" ><?php echo $row["assets_id"];?></td>
<td><?php echo $row["assets_name"];?></td>
<td><?php echo $row["assets_quantity"];?></td>
<td><?php echo $row["assets_dateIn"];?></td>
<td><?php echo $row["asset_cond"];?></td>
<td><?php echo $row["assets_PIC"];?></td>
<td class="btn_action"><a href="updateasset.php?assets_id=<?php echo $row["assets_id"];?>"><button class="btn_upd" type="button"><span></span>UPDATE</button></a></td>
<td class="btn_action"><a  onclick="confirmDelete(this); return false;" href="deleteasset.php?assets_id=<?php echo $row["assets_id"];?>"><button class="btn_del" type="button"><span></span>DELETE</button></a></td>
</tr>
<?php
$i++;
}
}}
?>
</tbody>
</table>
<script>
function confirmDelete(anchor) {
var conf = confirm("Are you sure you want to delete this data?");
if(conf){
window.location=anchor.attr("href");
}
}
</script>
<?php
// else {
// echo "No result found";
// }

mysqli_close($conn);
?>
</div>
</body>
</html>