
<!DOCTYPE html>
<html>
<head>
<title> Borang Cuti </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript></head>
<body>

<script>

        function checkNum1()
        {
            var checkhp=document.form1.managerIC.value;

            if (isNaN(checkhp))
            {
                alert("Must be in digit value!");
                document.form1.managerIC.click();
            }
        }


        function checkNum2()
        {
            var checkhp=document.form1.telNum.value;

            if (isNaN(checkhp))
            {
                alert("Must be in digit value!");
                document.form1.telNum.click();
            }
        }


        function checkNum3()
        {
            var checkhp=document.form1.accNum.value;

            if (isNaN(checkhp))
            {
                alert("Must be in digit value!");
                document.form1.accNum.click();
            }
        }

</script>

<h2><center>BORANG PERMOHONAN CUTI</center></h2>
<form name="form1" method="post" action="mohonproses.php" autocomplete="off">
<center><table border="1"align="center">

<tr>
<td>IC NUMBER : </td>
<td><input type ="text" name="pencutiIC" placeholder="without()" onkeyup="checkNum1()" required> <br><br></td>
</tr>

<tr>
<td> NAME: </td>
<td><input type ="text" name="pencutiName" required> <br><br></td>
</tr>

<tr>
<td> POSITION: </td>
<td><input type ="text" name="pencutiPosition" required> <br><br></td>
</tr>

<tr>
<td> DEPARTMENT: </td>
<td><input type ="text" name="pencutiDepartment" required> <br><br></td>
</tr>

<tr>
<td> LEAVE TYPE: </td>
<td><input type ="text" name="jeniscuti" required> <br><br></td>
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
<td><input type ="text" name="sebabcuti" required> <br><br></td>
</tr>


<tr>
<td><input type="submit" value="Submit"></td>
<td><input type="button" onclick="window.location.href='index.php';" value="Main menu" /></td></td>

</center>
    </form>
    </body>
</html>