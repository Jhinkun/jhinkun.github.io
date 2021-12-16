<?php
session_start();
include 'dbConn.php';
include 'functionS.php';
include 'navi.php';
$staff_data = check_login($conn);
$user = $staff_data['icNumber'];
$recordID= rand(0,10000);
$filepath = "uploads/records/";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Records</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="records.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>RECORDS</h1>
        <div class="contents">
            <h2>Search Record : </h2>
            <form name= "admin" action="" method="GET" autocomplete="off">
                <div class="carian"><center>
                    <input class="bar" type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Enter file name">
                    <br><br>
                    <button type="submit" class="search"><i class="fas fa-search"></i></button>
                    <button class="search-back" type="button" onclick="window.location.href='records.php';" ><i class="fas fa-arrow-left"></i></button>
                    </center>
                </div>
            </form>
            <br>
            <?php
            if (isset($_GET['search'])){
                $search = $_GET['search'];
                $sql = "SELECT recordID, file_name, icNumber FROM records WHERE icNumber='$user' AND CONCAT(recordID, file_name, icNumber) LIKE '%$search%'"; 
                $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) >0){
            ?>
            <table>
                <tr>
                    <th>RECORD ID</th>
                    <th>FILE NAME</th>
                    <th>ACTION</th>
                </tr>
                <?php
                $i=0;
                while($row=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['recordID']; ?></td>
                    <td><?php echo $row['file_name']; ?></td>
                    <td><a href="<?php echo $filepath.$row['file_name'] ?>"><button class="btn_download" type="button">DOWNLOAD</button></a></td>
                </tr>
            <?php
                }
            }
            } else{

            $sql = "SELECT recordID, file_name, icNumber FROM records WHERE icNumber='$user'"; 
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) >0){
            ?>
            <table>
                <tr>
                    <th>RECORD ID</th>
                    <th>FILE NAME</th>
                    <th>ACTION</th>
                </tr>
            <?php
            $i=0;
            while($row=mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td><?php echo $row['recordID']; ?></td>
                    <td><?php echo $row['file_name']; ?></td>
                    <td><a href="<?php echo $filepath.$row['file_name'] ?>"><button class="btn_download" type="button">DOWNLOAD</button></a></td>
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
	    <p>Copyright &copy; <a>KaFerry Sdn.Bhd</a>. All Rights Reserved</p>
    </div>
    </body>
</html>