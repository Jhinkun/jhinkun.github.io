<?php
 include 'dbConn.php';

 if(isset($_POST['submit']))
 {
  $assets_id = $_POST['assets_id'];
  $assets_name = $_POST['assets_name'];
  $assets_quantity =$_POST['assets_quantity'];
  $assets_dateIn= $_POST['assets_dateIn'];
  $assets_cond= $_POST['assets_cond'];
  $assets_PIC= $_POST ['assets_PIC'];

  $sql = "INSERT INTO asset (assets_id, assets_name, assets_quantity, assets_dateIn, asset_cond, assets_PIC)
  VALUES ('$assets_id', '$assets_name', '$assets_quantity', '$assets_dateIn', '$assets_cond', '$assets_PIC')";
  $result = mysqli_query($conn,$sql);
  if($result)
  {
    //echo "Data inserted succesfully";
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
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>ASSETS KAFERRY SDN. BHD.</title>
  </head>
  <body>
  <div class="background">
  <a href="displayasset.php"><button class="back"><i class="fas fa-arrow-left" style="font-size: 25px;"> BACK</i></button></a>
  <div class="container">
            <h1>ASSETS KAFERRY SDN. BHD.</h1>
            <div class="table">
                <br><br><br><br>
                <!--PHP codes-->
                <form name="addasset" method="post" action="" enctype="multipart/form-data">
                <table id="form" cellspacing="5px" align="center">
                    <tr>
                      <td>Asset ID:</td>
                      <td><input type="text" name="assets_id" autocomplete="off" placeholder="Enter Assets ID"></td>
                    </tr>
                    <tr>
                      <td>Asset name:</td>
                      <td><input type="text" name="assets_name" autocomplete="off" placeholder="Enter asset name"></td>
                    </tr>
                    <tr>
                      <td>Asset quantity:</td>
                      <td><input type="text" name="assets_quantity" autocomplete="off" placeholder="Enter asset quantity"></td>
                    </tr>
                    <tr>
                      <td>Asset's date registered:</td>
                      <td><input type="date" name="assets_dateIn" autocomplete="off"></td>
                    </tr>
                    <tr>
                      <td>Asset condition:</td>
                      <td><input type="text" name="assets_cond" autocomplete="off" placeholder="Condition"></td>
                    </tr>
                    <tr>
                      <td>Person in charge:</td>
                      <td><input type="text" name="assets_PIC" autocomplete="off" placeholder="Enter PIC name"></td>
                    </tr>
                    <tr>
                      <td align="center"><button type="submit" class="btn-primary" name="submit">SUBMIT</button></td>
                    </tr>
                  </table>
                </form>
            </div>
          </div>
</div>

   

  </body>
</html>