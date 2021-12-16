<?php
session_start();
include ("dbConn.php");
include ("functionS.php");
$staff_data = check_login($conn);
$user = $staff_data['icNumber'];
$sql = "SELECT * FROM leave_app WHERE icNumber = '$user'";
$query_run = mysqli_query($conn, $sql);
?>
<html>
    <head>
       <title>SEMAKAN PERMOHONAN</title>
       <?php include 'navi.php' ?>
	   <link rel="stylesheet" href="Cutistyle.css">

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


    <body class="is-preload" style="margin:0";>
        <center>
          <br><br><br><br>
          <center><h0>SEMAKAN PERMOHONAN CUTI </h0></center>
          <br><br>
             <table>
                <thead>
                    <tr>
                        <th>REQUEST DATE</th>
                        <th>LEAVE ID</th>
                        <th>START DATE</th>
                        <th>END DATE</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                 
                <tbody>
                    <?php 
                        
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            while($items = mysqli_fetch_array($query_run))
                        {
                            ?>
                            <tr>
                                <td><?= $items['reqDate']; ?></td>
                                <td><?= $items['leaveId']; ?></td>
                                <td><?= $items['startDate']; ?></td>
                                <td><?= $items['endDate']; ?></td>
                                <td><?= $items['status']; ?></td>
                            </tr>
                            <?php
                            }
                            }
                            else
                            {
                                ?>
                                    <tr>
                                        <td colspan="4">Tiada Percutian Untuk Kamu</td>
                                    </tr>
                                <?php
                            }
                            
                    ?>
                     </tbody>
                     </table>
        </center>
    </body>
</html>