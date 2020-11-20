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
	<title>Results - C1WS Exam</title>

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
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-success text-center">Scores</h6>
    </div>
    <div class="card-body text-center">
      <div class="table-responsive">
        <form id = "thisForm" method = "post" action="resultspername.php">
              <input type="text" name="userDate" id="userDate" class="form-control text-center" hidden>
              <input type="text" name="userName" id="userName" class="form-control text-center" hidden>
          </form>
        <form id = "thisForm2" method = "post" action="answers.php">
              <input type="text" name="userDate2" id="userDate2" class="form-control text-center" hidden>
              <input type="text" name="userName2" id="userName2" class="form-control text-center" hidden>
              <input type="text" name="topicNum" id="topicNum" class="form-control text-center" hidden>
          </form>
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
            <thead>
                  <tr>
                      <td>Date of Submission</td>
                      <td>Name</td>
                      <td>Networking</td>
                      <td>Windows</td>
                      <td>Linux</td>
                      <td>Cloud</td>
                      <td>Virtualization</td>
                      <td>DevOps</td>
                      <td>Database</td>
                      <td>Other</td>
                      <td>Essay</td>
                      <td>Total</td>
                  </tr>
            </thead>
            <tbody>
              <?php
                    $resultquery = "SELECT * FROM usersession";
                    $queryr = mysqli_query($con, $resultquery);
                    $i = 0;
                    while ($value = mysqli_fetch_array($queryr)){
                  ?>
                   <tr>
                    <td><b><?php echo $value['date']; ?></b>
                    </td>
                    <td>
                    <a href="javascript:{}" onclick="$('#userDate').val('<?php echo $value['date']; ?>'); $('#userName').val('<?php echo $value['name']; ?>'); document.getElementById('thisForm').submit();"><b><?php echo $value['name']; ?></b></a>
                   </td>
                    <td>
                    <a href="javascript:{}" onclick="$('#userDate2').val('<?php echo $value['date']; ?>'); $('#userName2').val('<?php echo $value['name']; ?>'); $('#topicNum').val('1'); document.getElementById('thisForm2').submit();"><b><?php echo $value['net_sc']; ?></b>/10</a>
                    </td>
                    <td>
                    <a href="javascript:{}" onclick="$('#userDate2').val('<?php echo $value['date']; ?>'); $('#userName2').val('<?php echo $value['name']; ?>'); $('#topicNum').val('2'); document.getElementById('thisForm2').submit();"><b><?php echo $value['win_sc']; ?></b>/10</a>   
                    </td>
                    <td>
                    <a href="javascript:{}" onclick="$('#userDate2').val('<?php echo $value['date']; ?>'); $('#userName2').val('<?php echo $value['name']; ?>'); $('#topicNum').val('3'); document.getElementById('thisForm2').submit();"><b><?php echo $value['lin_sc']; ?></b>/10</a>   
                    </td>
                    <td>
                    <a href="javascript:{}" onclick="$('#userDate2').val('<?php echo $value['date']; ?>'); $('#userName2').val('<?php echo $value['name']; ?>'); $('#topicNum').val('4'); document.getElementById('thisForm2').submit();"><b><?php echo $value['clo_sc']; ?></b>/10</a>
                    </td>
                    <td>
                    <a href="javascript:{}" onclick="$('#userDate2').val('<?php echo $value['date']; ?>'); $('#userName2').val('<?php echo $value['name']; ?>'); $('#topicNum').val('5'); document.getElementById('thisForm2').submit();"><b><?php echo $value['vir_sc']; ?></b>/5</a>
                    </td>
                    <td>
                    <a href="javascript:{}" onclick="$('#userDate2').val('<?php echo $value['date']; ?>'); $('#userName2').val('<?php echo $value['name']; ?>'); $('#topicNum').val('6'); document.getElementById('thisForm2').submit();"><b><?php echo $value['dev_sc']; ?></b>/5</a>
                    </td>
                    <td>
                    <a href="javascript:{}" onclick="$('#userDate2').val('<?php echo $value['date']; ?>'); $('#userName2').val('<?php echo $value['name']; ?>'); $('#topicNum').val('7'); document.getElementById('thisForm2').submit();"><b><?php echo $value['db_sc']; ?></b>/5</a>
                    </td>
                    <td>
                    <a href="javascript:{}" onclick="$('#userDate2').val('<?php echo $value['date']; ?>'); $('#userName2').val('<?php echo $value['name']; ?>'); $('#topicNum').val('8'); document.getElementById('thisForm2').submit();"><b><?php echo $value['ot_sc']; ?></b>/5</a>
                    </td>
                    <td>
                    <a href="javascript:{}" onclick="$('#userDate2').val('<?php echo $value['date']; ?>'); $('#userName2').val('<?php echo $value['name']; ?>'); $('#topicNum').val('9'); document.getElementById('thisForm2').submit();"><b><?php echo $value['ess_sc']; ?></b>/20</a>
                    </td>
                    <td><b><?php $total = $value['u_a_id'] + $value['ess_sc'];  echo $total; ?> out of 80 items </b></td>
                  </tr>
                    <?php
              }
                  ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
    <br>

<!-- --------------------------------------------------------- -->


<?php include('footer.php'); ?>

</body>
</html>
