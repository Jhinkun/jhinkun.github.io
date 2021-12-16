<?php
include 'rptstproc.php';
include 'rpthead.php';
?>
    <title>Staff Edit Report</title>
  </head>
  <body>
    <a href="rptst.php"><button><i class="fas fa-arrow-alt-circle-left" style="font-size: 25px;"></i></button></a>
    <div class="center_all">
    <?php foreach($edits as $edit) { ?>
      <form method="post" action="rptstproc.php?upd=<?php echo $edit["reportID"]; ?>">
        <label for="date">Name</label>
        <br>
        <input type="text" id="name" name="name" value="<?php echo $edit["name"]; ?>">
        <br>
        <label for="date">Report Date</label>
        <br>
        <input type="date" id="date" name="date" value="<?php echo $edit["date"]; ?>">
        <br>
        <label for="task">Task</label>
        <br>
        <textarea id="task" name="task" id="" cols="30" rows="10"><?php echo $edit["task"]; ?></textarea>
        <br>
        <input type="submit" value="SUBMIT" name="edit">
        <?php } ?>
      </form>
    </div>
  </body>
</html>