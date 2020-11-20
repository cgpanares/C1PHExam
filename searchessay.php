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
	<title>Search Essay - C1WS Exam</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

 <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<script>
  $(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       });
       $('#myTable').DataTable();
})
  </script>
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

         <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-success text-center">Click the name to see the essay</h6>
    </div>
    <div class="card-body text-center">
      <div class="table-responsive">
        <form id = "thisForm" method = "post" action="essay.php">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <td>Name</td>
                      <td>Date</td>
                  </tr>
                   </thead>
                  <tbody>
              <?php
                $resultquery = "SELECT * FROM usersession WHERE ess_sc = '0'";
                $queryr = mysqli_query($con, $resultquery);
                while ($value = mysqli_fetch_array($queryr)){
              ?>
                          <tr>
                              <td width = 50%>
                                <a href="javascript:{}" onclick="$('#userDate').val('<?php echo $value['date']; ?>'); $('#userName').val('<?php echo $value['name']; ?>'); document.getElementById('thisForm').submit();"><b><?php echo $value['name']; ?></b></a>
                              </td>
                               <td><?php echo $value['date']; ?></td>
                          </tr>
                  <?php
          }
              ?>
            </tbody>
          </table>
          <input type="text" name="userDate" id="userDate" class="form-control text-center" hidden>
          <input type="text" name="userName" id="userName" class="form-control text-center" hidden>
          <form>
        </div>
      </div>
    </div>
<br>

<!-- --------------------------------------------------------- -->


<?php include('footer.php'); ?>

</body>
</html>
<?php 
unset($_SESSION['userx']); 
unset($_SESSION['datex']); 
?>
