<?php
session_start();
error_reporting(0);
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:../C1WSExam/index.php');
  exit;
}
include('connect.php');

if(isset($_POST['role'])){
  $usernameA = $_POST['user'];
  $PasswordA = $_POST['pass'];
  $roleA = $_POST['role'];

  $cryptpw = crypt($PasswordA);


//Reset autoincrement for questions table
$querymax = "SELECT MAX(user_ID) AS maximum FROM admin";
$query = mysqli_query($con, $querymax);
$row = mysqli_fetch_array($query);
$maxvalue = $row['maximum'];
$maxvalue++;
$alterquery ="ALTER TABLE admin AUTO_INCREMENT = $maxvalue";
mysqli_query($con, $alterquery);

$addaccount = "INSERT INTO admin (user_ID, username, password, permission) VALUES (NULL, '$usernameA', '$cryptpw', '$roleA')";
$adding = mysqli_query($con, $addaccount);

if(!$adding){
  echo("Error description: " . mysqli_error($con));
}
else{
  echo "<script>alert('Account was added successfully!')</script>";
}

}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="img/PHDSAAS.png"/>
	<title>Add Account - C1WS Exam</title>

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
            <h3> Add an Account </h3><br>
            <form action="" method="post">
               <div class="form-group">
                     <label>Username</label>
                     <input type="text" name = "user" id = "user" class="form-control" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name = "pass" id = "pass" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" id="role" name = "role">
                      <option value="Administrator">Administrator</option>
                      <option value="Auditor">Auditor</option>
                      <option value="Maintainer">Maintainer</option>
                    </select>
                  </div>
            <button class="btn btn-success d-block m-auto" style = "width:50%;" type="submit"> Add Account </button>
          </form>
        </div>


<!-- --------------------------------------------------------- -->


<?php include('footer.php'); ?>

</body>
</html>
