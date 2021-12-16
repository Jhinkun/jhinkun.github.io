<?php
include 'rptstproc.php';
include 'rpthead.php';
?>
    <title>Staff New Report</title>
  </head>
  <body>
    <div class="tooltip">
      <a href="rptst.php"><button><i class="fas fa-arrow-alt-circle-left" style="font-size: 25px;"></i></button></a>
      <span class="tooltiptext">Add New Report</span>
    </div>
    <div class="center_all">
      <h2>Enter Your Report</h2>
      <form method="post" action="rptstproc.php">
        <label for="date" class="gy">Name</label>
        <br>
        <input type="text" id="name" name="name" value="<?php echo $staff_data[2]; ?>">
        <br>
        <label for="date">Report Date</label>
        <br>
        <input type="date" id="date" name="date" value="<?php echo date("Y-m-d"); ?>">
        <br>
        <label for="task">Task</label>
        <br>
        <textarea id="task" name="task" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="SUBMIT" name="submit">
      </form>
      <br><br>
    </div>
  </body>
</html>