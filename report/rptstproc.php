<?php
session_start();
include ("../dbConn.php");
include ("../functionS.php");
$staff_data = check_login($conn);
$user = $_SESSION['icNumber'];
$userName = $staff_data['name'];
$rptID = "";

if (isset($_POST['search'])){
  $search = $_POST['srch'];
  
  $sql = "SELECT * FROM report WHERE CONCAT(date) LIKE '%$search%' ORDER BY date asc";

  if (mysqli_query($conn, $sql)){
    $result = mysqli_query($conn, $sql);
    $rpts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    echo 'Query Error: ' . mysqli_error($conn);
  }
} else {
  $sql = "SELECT * FROM report WHERE icNumber = '$user' AND name = '$userName'";
  $result = mysqli_query($conn, $sql);
  $rpts = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

if (isset($_POST['edit'])){
  editRpt();
}

//function to submit the report
function subRpt() {
  $name = $date = $task = '';
  global $conn, $user;

  if (empty($_POST['name']) || empty($_POST['date']) || empty($_POST['task'])){
    echo "<script>alert('Please fill in all field!!!');</script>";
    echo "<script>window.location.href='rptstnew.php';</script>";
  } else {
    $name = mysqli_escape_string($conn, $_POST['name']);
    $date = mysqli_escape_string($conn, $_POST['date']);
    $task = mysqli_escape_string($conn, $_POST['task']);

    $sql = "INSERT INTO report(icNumber, name, date, task) VALUES ('$user', '$name', '$date', '$task')";
    if (mysqli_query($conn, $sql)){
      header('Location: rptst.php?sub');    
    } else {
      echo 'Query Error: ' . mysqli_error($conn);
    }
  }
}

//function to edit the selected report
function editRpt() {
  global $conn, $rptID;
  echo $rptID;
  $rptID = $_GET['upd'];
  if (!empty($_POST['name'])){
    $name = htmlspecialchars($_POST['name']);
  } if (!empty($_POST['date'])){
    $date = htmlspecialchars($_POST['date']);
  } if (!empty($_POST['task'])){
    $task = htmlspecialchars($_POST['task']);
  }

  $name = mysqli_escape_string($conn, $_POST['name']);
  $date = mysqli_escape_string($conn, $_POST['date']);
  $task = mysqli_escape_string($conn, $_POST['task']);

  $sql = "UPDATE report SET name = '$name', date = '$date', task = '$task' WHERE reportID = '$rptID'";

  if (mysqli_query($conn, $sql)){
    header('Location: rptst.php?edit');    
  } else {
    echo 'Query Error: ' . mysqli_error($conn);
  }
}

?>