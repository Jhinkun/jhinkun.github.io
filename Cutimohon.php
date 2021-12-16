<?php
    session_start();
    include ("dbConn.php");
    include ("functionS.php");
    $staff_data = check_login($conn);
    $name = $position = $dept = "";
    $user = $staff_data['icNumber'];
    $sql = "SELECT * FROM staff_intern WHERE icNumber = '$user'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)){
        $name = $row['name'];
        $position = $row['position'];
        $dept = $row['department'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> PERMOHONAN CUTI </title>
        <?php include 'navi.php' ?>
	    <link rel="stylesheet" href="Cutistyle.css">
    </head>

    <body style="margin:0">

        <!-- Function untuk check number ic -->
        <script>
        

        </script>
        <br><br><br>
        <h0><center>BORANG PERMOHONAN CUTI</center></h0>

        <!-- Table Permohonan -->
        <form name="form1" method="post" action="Cutimohonproses.php" autocomplete="off">
            <table border ="1" align ="center">

                <tr>
                    <td>IC NUMBER : </td>
                    <td><input type ="text" name="pencutiIC" class="read" value="<?php echo $user; ?>" readonly> </td>
                </tr>

                <tr>
                    <td> FULL NAME: </td>
                    <td><input type ="text" name="pencutiName" class="read" value="<?php echo $name; ?>" readonly></td>
                </tr>

                <tr>
                    <td> POSITION : </td><br>
                    <td><input type ="text" name="pencutiPosition" class="read" value="<?php echo $position; ?>" readonly></td>
                </tr>

                <tr>
                    <td> DEPARTMENT : </td><br>
                    <td><input type ="text" name="pencutiDepartment" class="read" value="<?php echo $dept; ?>" readonly></td>
                </tr>

                <tr>
                    <td> LEAVE TYPE : </td><br>
                    <td><select name="jeniscuti"><br>
                        <option value="NONE SELECTED">- PLEASE SELECT -</option>
                        <option value="CUTI TAHUNAN">CUTI TAHUNAN </option>
                        <option value="CUTI KECEMASAN">CUTI KECEMASAN </option>
                        <option value="CUTI TANPA GAJI">CUTI TANPA GAJI </option>
                        <option value="CUTI GANTI">CUTI GANTI </option>
                        <option value="CUTI SAKIT">CUTI SAKIT </option>
                        <option value="CUTI LAIN LAIN">CUTI LAIN LAIN </option>
                    </select></td>
                </tr>


                <tr>
                    <td> START DATE: </td>
                    <td><input type="date" name="mulacuti" onfocus="this.min=new Date().toISOString().split('T')[0]"></td>
                </tr>

                <tr>
                    <td> END DATE: </td>
                    <td><input type="date" name="akhircuti" onfocus="this.min=new Date().toISOString().split('T')[0]"></td>
                </tr>

                <tr>
                    <td> DURATION: </td>
                    <td><input type="number" id="fqty" name="duration" min="1" max="999" size="3"></td>
                </tr>

                <tr>
                    <td> REASON : </td>
                    <td><input type ="text" name="sebabcuti" required> </td>
                </tr>
                <tr>
                    <td colspan="2" >
                        <center>
                            <button type="submit" value="Submit">Submit</button>
                            <button type="button" onclick="window.location.href='Cutiindex.php';">Back</button>
                        </center>
                    </td>
                </tr>
            </table>

        </form>
    </body>
</html>
