<?php
session_start();

include('connect.php');

$xname = $_POST['xname'];
$xdate = $_POST['xdate'];

if (isset($_POST['x1'])){
    $x1 = $_POST['x1'];
}
else{
  $x1 = 0;
}

if (isset($_POST['x2'])){
    $x2 = $_POST['x2'];
}
else{
  $x2 = 0;
}

if (isset($_POST['x3'])){
    $x3 = $_POST['x3'];
}
else{
  $x3 = 0;
}

if (isset($_POST['x4'])){
    $x4 = $_POST['x4'];
}
else{
  $x4 = 0;
}

if (isset($_POST['x5'])){
    $x5 = $_POST['x5'];
}
else{
  $x5 = 0;
}

$xf = $x1 + $x2 + $x3 + $x4 + $x5;

$updatequery = "UPDATE usersession SET ess_sc = $xf, sc1_essay = $x1, sc2_essay = $x2, sc3_essay = $x3, sc4_essay = $x4, sc5_essay = $x5 WHERE name = '$xname'";
mysqli_query($con, $updatequery);


$userquery = "SELECT * FROM usersession WHERE name = '$xname'";
  $queryu = mysqli_query($con, $userquery);
  while ($value = mysqli_fetch_array($queryu)){
  $valt = $value['u_a_id'];
 }

$result = $valt + $xf;

if((($result/80)*100) >= 60){
  $resultquery = "SELECT * FROM percentage WHERE percent_id = 1";
  $queryr = mysqli_query($con, $resultquery);
  while ($value = mysqli_fetch_array($queryr)){
  $valp = $value['passed_val'];
  }
  $finalvalp = $valp + 1;
  $addpass = "UPDATE percentage SET passed_val = $finalvalp WHERE percent_id = 1";
  mysqli_query($con, $addpass);
}
else{
  $resultquery = "SELECT * FROM percentage WHERE percent_id = 1";
  $queryr = mysqli_query($con, $resultquery);
  while ($value = mysqli_fetch_array($queryr)){
  $valf = $value['failed_val'];    
  }
  $finalvalf = $valf + 1;
  $addfail = "UPDATE percentage SET failed_val = $finalvalf WHERE percent_id = 1";
  mysqli_query($con, $addfail);
}

$_SESSION['userx'] = $xname;
$_SESSION['datex'] = $xdate;

header('location:resultspername.php?Messages=Essay Scores saved!' . urlencode($Messages));


?>