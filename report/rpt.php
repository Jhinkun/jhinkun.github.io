<?php
include "rptproc.php";
include "rpthead.php";
include "hrnavi.php";

if (isset($_GET['sub'])){
  echo "<script>alert('Submitted Successfully.');
  window.location='rpt.php'</script>";
}

if (isset($_GET['edit'])){
  echo "<script>alert('Edited Successfully.');
  window.location='rpt.php'</script>";
}

if (isset($_GET['dele'])){
  echo "<script>alert('Deleted Successfully.');
  window.location='rpt.php'</script>";
}
?>

<script src="rptsc.js"></script>
<title>Staff/Intern Report</title>
<link rel="stylesheet" href="hr_style.css">
</head>
<body>
  <div class="center_nav">
    <h1>STAFF/INTERN REPORT</h1>
    <div style="margin-bottom: 10px;">
      <div class="tooltip">
        <a href="../hr_staffList.php"><button class=""><i class="fas fa-arrow-alt-circle-left" style="font-size: 25px;"></i></button></a>
        <span class="tooltiptext">Go Back to Dashboard</span>
      </div>
    </div>
    <form method="POST">
      <label for="date">Search</label>
      <div class="tooltip">
        <input type="text" id="srch" name="srch">
        <span class="tooltiptext">Report Info</span>
      </div>
      <button type="submit" name="search"><i class="fas fa-search"></i></button>
    </form>
<form method="POST" action="rptproc.php">
      <div class="tooltip right" style="margin-bottom: 20px;">
        <button type="submit" name="delsel" id="del" style="font-size: 30px; display: none;" onclick="confDel()"><i class="fas fa-trash-alt"></i></button>
      <span class="tooltiptext">Report Info</span>
    </div>
  </div><br>
  <div class="center scroll">
    <table class="center" style="width:100%; text-align: center;"> 
      <tr>
        <th>
        <div class="tooltip">
          <input type="checkbox" id="checkAll" class="checkClass" style="height: 30px; width: 30px;">
          <span class="tooltiptext">Select All</span>
        </div>
        </th>
        <th>No</th>
        <th>Id</th>
        <th style="width: 60px;">Date</th>
        <th>Ic</th>
        <th>Name</th>
        <th>Task</th>
      </tr>
      <?php
      $no = 1;
      foreach ($rpts as $rpt){
        ?>
        <tr>  
          <td><input type="checkbox" name="reportID[]" class="checkClass" value="<?php echo $rpt["reportID"]; ?>" style="height: 30x; width: 30px;"></td>
          <td><?php echo $no; ?></td>
          <td><?= $rpt["reportID"]; ?></td>
          <td style="width: 60px;"><?php echo $rpt["date"]; ?></td>
          <td><?php echo $rpt["icNumber"]; ?></td>
          <td><?php echo $rpt["name"]; ?></td>
          <td><?php echo nl2br($rpt["task"]); ?></td>
          <td class="btn_action">
            <a onclick="confDel(this); return false;" href="rptproc.php?del=<?php echo $rpt["reportID"]; ?>" style="color: #d93232;"><i class="fas fa-trash-alt" style="font-size: 30px;"></i></a>
          </td>
        </tr>
        <?php $no++; } ?>
      </form>
    </table>
  </div>
  <script>
    $(function(e){
      $("#checkAll").click(function(e){
        $(".checkClass").prop("checked",$(this).prop('checked'));
      })
    })
  </script>
  <script>
    $(document).ready(function() {

    var $submit = $("#del").hide(),
        $cbs = $('input[class="checkClass"]').click(function() {
            $submit.toggle( $cbs.is(":checked") );
        });

    });
  </script>
  <div class="footer">
      <p class="fp">Copyright &copy; <a>Ferryrich Sdn Bhd</a>. All Rights Reserved</p>
  </div>
</body>
</html>