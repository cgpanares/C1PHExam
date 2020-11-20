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

          <h3><b>Dashboard</b></h3>
          <p> Shows the overall status of the Examination. It includes the following: <br>
          - Passing Rate: Sums up all who passed the exam by percentage. It will be increased once Essay is graded. <br>
          - Failed Rate: same as Passing Rate, it will be increased once Essay is graded. <br>
          - Total Examinees: counts all the examinees recorded. <br>
          - Total Examinees with Graph: it calculates the total examinees per month on a specific year.</p>
          <hr>
          <h3><b>Results</b></h3>
          <p> Shows the results per examinee. It also includes a specific view per each examinee to analyze the scores using bar graph. Just click the name of the examinee.</p>
          <hr>
          <h3><b>View Q & A</b></h3>
          <p> Shows the question and answer used in the exam. Please make sure that when you view this, you are view it privately. And also, you must have already taken the exam.</p>
          <hr>
          <h3><b>Check Essays</b></h3>
          <p> For Administrators of the Exam, this gives you the access to check the answers of the examinees in their Essay. The grading for essay is manual.</p>
          <hr>
          <h3><b>Add Questions</b></h3>
          <p> This is the page where you can add questions with answers to increase the pool of questions for the exam.</p>
          <hr>
          <h3><b>Generate Exam Password</b></h3>
          <p> Generates the password for the exam for the examinee to be able to take it.</p>


<!-- --------------------------------------------------------- -->

<br>
<br>
<?php include('footer.php'); ?>

</body>
</html>
