<?php
session_start();
error_reporting(0);
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:../C1WSExam/index.php');
  exit;
}
include('connect.php');

if(isset($_POST['passNew'])){
  $username = $_POST['user'];
  $PasswordOld = $_POST['passOld'];
  $PasswordNew = $_POST['passNew'];

  $cryptpw = crypt($PasswordNew);


//Reset autoincrement for questions table
$querymax = "SELECT MAX(user_ID) AS maximum FROM admin";
$query = mysqli_query($con, $querymax);
$row = mysqli_fetch_array($query);
$maxvalue = $row['maximum'];
$maxvalue++;
$alterquery ="ALTER TABLE admin AUTO_INCREMENT = $maxvalue";
mysqli_query($con, $alterquery);

$q = " select * from admin where username = '$username' ";
$result = mysqli_query($con,$q);
if($rows = mysqli_fetch_array($result)){
  $hashed_pw = $rows['password'];
  }

if (hash_equals($hashed_pw, crypt($PasswordOld, $hashed_pw))) {
  $changepw = "UPDATE admin SET password = '$cryptpw' WHERE username = '$username'";
  $changepass = mysqli_query($con, $changepw);
  echo "<script>alert('Password was changed successfully!')</script>";
}
else{
  echo "<script>alert('Wrong Username/Password!')</script>";
}


}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="img/PHDSAAS.png"/>
	<title>Change Password - C1WS Exam</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">

	  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

<script>
  $(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       }); 
})
  </script>
  <style>
    #divcard {
  width: 50%;
  padding: 50px;
  border: 3px solid gray;
  border-radius: 25px;
  margin: 0 auto;
  text-align: center;
  margin-top:10%;
  position:relative;
}
  </style>
</head>
<body id="page-top">
 <?php include('landing-bar.php');?>
	 
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

	 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-3">
          </div>

<!-- --------------------------------------------------------- -->
          
          <!-- Content Row -->
          <div class="container box" id = "divcard">
            <h3> Change Password </h3><br>
            <form action="" method="post">
               <div class="form-group">
                     <label>Username</label>
                     <input type="text" name = "user" id = "user" class="form-control" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                     <label>Old Password</label>
                     <input type="password" name = "passOld" id = "passOld" class="form-control" placeholder="Old Password" required>
                  </div>
                  <div class="form-group">
                     <label>New Password</label>
                     <input type="password" name = "passNew" id = "passNew" class="form-control" placeholder="New Password" required>
                  </div>
            <button class="btn btn-success d-block m-auto" style = "width:50%;" type="submit"> Change Now </button>
          </form>
        </div>


<!-- --------------------------------------------------------- -->


<?php include('footer.php'); ?>

</body>
</html>
