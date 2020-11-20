<?php
session_start();
error_reporting(0);
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:../C1WSExam/index.php');
  exit;
}
include('connect.php');

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="img/PHDSAAS.png"/>
	<title>Admin Page - C1WS Exam</title>

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
  margin: 10;
  text-align: center;
  margin-top:15%;
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
            <h3> Exam Password Generator </h3><br>

            <?php
              $q = "select * from passwordtest ORDER BY p_id DESC LIMIT 1";
                    $query = mysqli_query($con, $q);
                    while($rows = mysqli_fetch_array($query)){
                      $pwd = $rows['password'];
                    }
                    ?>
            <center><input type="text" style = "width:75%;" name="ch1" id="ch1" class="form-control text-center" value ="<?php echo $pwd ; ?>" disabled><br>
            <form action="passwordgen.php" method="post">
            <button class="btn btn-success d-block m-auto" style = "width:50%;" type="submit"> Generate Password for Exam </button>
          </form>
        </center>

        </div>


<!-- --------------------------------------------------------- -->


<?php include('footer.php'); ?>

</body>
</html>
