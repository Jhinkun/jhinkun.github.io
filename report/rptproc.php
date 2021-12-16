<?php
session_start();
include ("../dbConn.php");
include ("../functionA.php");
$admin_data = check_login($conn);
$rptID = "";

if (isset($_GET['del'])){
  delRpt();
}

if (isset($_GET['upd'])){ 
  $rptID = $_GET['upd'];
  $sql2 = "SELECT * FROM report WHERE reportID = '$rptID'";
  $result = mysqli_query($conn, $sql2);
  $edits = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

if (isset($_POST['submit'])){
  subRpt();
}

if (isset($_POST['delsel'])){
  if(!empty($_POST['reportID'])){
    $ids = $_POST['reportID'];
    foreach ($ids as $id){
      // echo $id;
      $sql = "DELETE FROM report WHERE reportID = '$id'";
      $result = mysqli_query($conn, $sql);
    
      if ($result) {
        header("Location:rpt.php?dele");
      } else {
        echo 'QUERY ERROR:' . mysqli_error($conn);
      }
    }
  }
}

if (isset($_POST['search'])){
  $search = $_POST['srch'];
  
  $sql = "SELECT * FROM report WHERE CONCAT(reportID, icNumber, name, date, task) LIKE '%$search%' ORDER BY date asc";

  if (mysqli_query($conn, $sql)){
    $result = mysqli_query($conn, $sql);
    $rpts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    echo 'Query Error: ' . mysqli_error($conn);
  }
} else {
  $sql = "SELECT * FROM report ORDER BY date asc";
  $result = mysqli_query($conn, $sql);
  $rpts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//function to delete selected report
function delRpt() {
  global  $conn;
  $rptID = $_GET['del'];
  $rptName = $_GET['nm'];

  $sql = "DELETE FROM report WHERE reportID = '$rptID'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location:rpt.php?dele");
  } else {
    echo 'QUERY ERROR:' . mysqli_error($conn);
  }
}

?>