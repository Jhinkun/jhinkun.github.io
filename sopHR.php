<?php
    include "dbConn.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <title>ADMIN SOP</title>
    <center><div class="content">
            <h1>DEPARTMENT SOP</h1>
            <a href="sopHR.php?id=ecom"><button class="btn_add" type="button"><span>ECOM SOP</span></button></a>

            <a href="sopHR.php?id=agent"><button class="btn_add" type="button"><span>AGENT SOP</span></button></a>

            <a href="sopHR.php?id=operation"><button class="btn_add" type="button"><span>OPERATION SOP</span></button></a>

            <a href="sopHR.php?id=creative"><button class="btn_add" type="button"><span>CREATIVE SOP</span></button></a>

            <a href="sopHR.php?id=customer_service"><button class="btn_add" type="button"><span>CUSTOMER SERVICE SOP</span></button></a>

            <a href="sopHR.php?id=human_resources"><button class="btn_add" type="button"><span>HUMAN RESOURCES SOP</span></button></a>

            <a href="sopHR.php?id=retail"><button class="btn_add" type="button"><span>RETAIL SOP</span></button></a>

            <a href="sopHR.php?id=accounting"><button class="btn_add" type="button"><span>ACCOUNTING SOP</span></button></a>
            <button class="btn_add" type="button" onclick="show();"><span>ADD NEW DEPT</span></button>
        </div></center>

        <html>



    <body class="is-preload">
        <!-- Wrapper -->
            <div id="wrapper">


                <!-- Banner -->
                <section id="banner" class="major">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">

                                    <!-- <form name= "admin" action="" method="GET" autocomplete="off">
                                        <div class="input-group mb-3">
                                            <input type="text" name="search" >
                                            <br>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                            <input type="button" onclick="window.location.href='Cutiindex.php';" value="Back"/>
                                        </div>
                                    </form> -->

                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","finalproject");

                                    if(isset($_GET['id']))
                                    {
                                        $filtervalues = $_GET['id'];
                                        $query = "SELECT * FROM sop WHERE CONCAT(id) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) == 1)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['text_sop']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">Tiada Percutian Untuk Kmau</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="center-all" id="form" style="display: none; float: right;">
      <form method="post" action="rptproc.php">
        <label for="name">Dept Name</label>
        <br>
        <input type="text" id="name" name="dpt">
        <br>
        <br>
        <input type="submit" value="SUBMIT" name="submit">
      </form>
</div>
<?php 
  if (isset($_POST['submit'])){

    if (!empty($_POST['dpt'])){
      $name = htmlspecialchars($_POST['dpt']);
    }
    
    $name = mysqli_escape_string($conn, $_POST['dpt']);
  
    $sql = "INSERT INTO report(id) VALUES ('$dpt')";
  }
?>

            </div>

    <script>
      function show() {
        var x = document.getElementById("form");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
    </script>
    </body>
</html>