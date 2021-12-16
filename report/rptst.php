<?php
include "rptstproc.php";
include ("rptnavi.php");
if (isset($_GET['sub'])){
  echo "<script>alert('Submitted Successfully.');
  window.location='rptst.php'</script>";
}

if (isset($_GET['edit'])){
  echo "<script>alert('Edited Successfully.');
  window.location='rptst.php'</script>";
}

include "rpthead.php";
?>
  <title>Staff Report</title>
</head>
<body>
  <div class="center_nav">
    <h2>STAFF REPORT</h2>
    <form method="POST">
        <label for="srch">Search</label>
        <div class="tooltip">
          <input type="text" id="srch" name="srch">
          <span class="tooltiptext">Put in the report date</span>
        </div>
        <button type="submit" name="search"><i class="fas fa-search"></i></button>
      </form>
    <div style="margin-bottom: 10px;">
      <div class="tooltip">
        <a href="../dashboard.php"><button class=""><i class="fas fa-arrow-alt-circle-left" style="font-size: 25px;"></i></button></a>
        <span class="tooltiptext">Go Back to Dashboard</span>
      </div>
      <div class="tooltip right">
        <a href="rptstnew.php"><button><i class="fas fa-plus-circle" style="font-size: 25px;"></i></button></a>
        <span class="tooltiptext">Add New Report</span>
      </div>
    </div>
  </div>
  <div class="center">
    <table class="center" style="width:100%; text-align: center;"> 
      <tr>
        <th class="">No</th>
        <th class="">Id</th>
        <th class="">Ic Number</th>
        <th class="">Name</th>
        <th class="">Date</th>
        <th class="">Task</th>
      </tr>
      <?php
      $no = 1;
      foreach ($rpts as $rpt){
      ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $rpt["reportID"]; ?></td>
          <td><?php echo $rpt["icNumber"]; ?></td>
          <td><?php echo $rpt["name"]; ?></td>
          <td><?php echo $rpt["date"]; ?></td>
          <td><?php echo nl2br($rpt["task"]); ?></td>
          <!-- <td class="btn_action">
            <a onclick="confDel(this); return false;" href="rptproc.php?del=<?php echo $rpt["reportID"]; ?>"><button><i class="fas fa-trash" style="font-size: 25px;"></i></button></a>
          </td> -->
          <td class="btn_action">
            <a href="rptstedit.php?upd=<?php echo $rpt["reportID"]; ?>"><button><i class="fas fa-edit" style="font-size: 25px;"></i></button></a>
          </td>
        </tr>
      </form>
      <?php $no++; } ?>
    </table>
  </div>
  <div class="footer">
	  <p>Copyright &copy; <a>KaFerry Sdn.Bhd</a>. All Rights Reserved</p>
</div>
</body>
</html>