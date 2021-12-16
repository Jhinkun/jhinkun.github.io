<?php
 include 'dbConn.php';
 $assets_id=$_GET['assets_id'];
 $sql="SELECT * FROM asset WHERE assets_id='$assets_id'";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_array($result);
 $assets_id=$row['assets_id'];
 $assets_name=$row['assets_name'];
 $assets_quantity=$row['assets_quantity'];
 $assets_dateIn=$row['assets_dateIn'];
 $asset_cond=$row['asset_cond'];
 $assets_PIC=$row['assets_PIC'];

 if(isset($_POST['submit']))
 {
  $assets_id = $_POST['assets_id'];
  $assets_name = $_POST['assets_name'];
  $assets_quantity =$_POST['assets_quantity'];
  $assets_dateIn= $_POST['assets_dateIn'];
  $asset_cond= $_POST['assets_cond'];
  $assets_PIC= $_POST ['assets_PIC'];

  $sql="UPDATE asset SET assets_id='$assets_id', assets_name='$assets_name', assets_quantity='$assets_quantity',
   assets_dateIn='$assets_dateIn', asset_cond='$asset_cond', assets_PIC='$assets_PIC' where assets_id='$assets_id'";
  $result = mysqli_query($conn,$sql);
  if($result)
  {
    //echo"Updated succesfully ";
    header ('location:displayasset.php');
    
  }
  else
  {
    die("Connection Failed" . mysqli_connect_error());
  }

 }
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="assets.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>ASSETS KA FERRY SDN. BHD.</title>
  </head>
  <body>
  <div class="background">
  <a href="displayasset.php"><button class="back"><i class="fas fa-arrow-left" style="font-size: 25px;"> BACK</i></button></a>
  <div class="container">
            <h1>UPDATE ASSETS KAFERRY SDN. BHD.</h1>
            <div class="table">
                <br><br><br><br>
                <!--PHP codes-->
                <form name="addasset" method="post" action="" enctype="multipart/form-data">
                <table id="form" cellspacing="5px" align="center">
                    <tr>
                      <td>Asset ID:</td>
                      <td><input type="text" class="form-control" name="assets_id" autocomplete="off" value=<?php echo $assets_id;?>></td>
                    </tr>
                    <tr>
                      <td>Asset name:</td>
                      <td><input type="text" name="assets_name" autocomplete="off" placeholder="Enter asset name" value=<?php echo $assets_name;?>></td>
                    </tr>
                    <tr>
                      <td>Asset quantity:</td>
                      <td><input type="text" name="assets_quantity" autocomplete="off" placeholder="Enter asset quantity" value=<?php echo $assets_quantity;?>></td>
                    </tr>
                    <tr>
                      <td>Asset's date registered:</td>
                      <td><input type="date" name="assets_dateIn" autocomplete="off" value=<?php echo $assets_dateIn;?>></td>
                    </tr>
                    <tr>
                      <td>Asset condition:</td>
                      <td><input type="text" class="form-control" name="assets_cond" autocomplete="off" value=<?php echo $asset_cond;?>></td>
                    </tr>
                    <tr>
                      <td>Person in charge:</td>
                      <td><input type="text" name="assets_PIC" autocomplete="off" placeholder="Enter PIC name" value=<?php echo $assets_PIC;?>></td>
                    </tr>
                    <tr>
                      <td align="center"><button type="submit" class="btn-primary" name="submit">UPDATE</button></td>
                    </tr>
                  </table>
                </form>
            </div>
      </div>
</div>
  </body>
</html>