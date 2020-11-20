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
	<title>Add Question (DSAdmin) - C1WS Exam</title>

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

<style>
   #txtarea {
         display:block;
         width:100%;
         height:150px;
         padding:0.5%;
         margin:0;
         border:2px solid #e6e6e6;
         overflow:auto;
         resize: none;
         }
</style>

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

<div class="container bg-light">    
    <div class="row">
      <div class="col-lg-12 text-center bg-light">
        <div class="card bg-light">
          <h4 class="card-header text-center"> Question Panel </h4>
          <br>
          <form action="addprocess.php" method="post">
          <label for="user "> Enter Question: </label>
            <textarea name="question" id="txtarea" maxlength = "1000" required></textarea>
              <br>            
            <div class="form-group">
              <label for="user "> Choice 1: </label>
              <input type="text" name="ch1" id="ch1" class="form-control text-center" required>
            </div>
            <div class="form-group">
              <label for="user "> Choice 2: </label>
              <input type="text" name="ch2" id="ch2" class="form-control text-center" required>
            </div>
            <div class="form-group">
              <label for="user "> Choice 3: </label>
              <input type="text" name="ch3" id="ch3" class="form-control text-center" required>
            </div>
            <div class="form-group">
              <label for="user "> Choice 4: </label>
              <input type="text" name="ch4" id="ch4" class="form-control text-center" required>
            </div>
            <hr>
            <div><?php
            $querymax = "SELECT MAX(a_id) AS maximum FROM answers";
            $query = mysqli_query($con, $querymax);
            $row = mysqli_fetch_array($query);?>
              <select name="corans" id="corans">
                <option value="0">Choose Correct Answer: </option>
                <?php
                $row['maximum']++;
                for($i=1; $i<=4; $i++){?>
                <option value="<?php echo $row['maximum']++; ?>"><?php echo $i; ?></option>
                <?php
            }
            ?>    
                 </select>          

              <select name="cat" id="cat">
                <option value="0">Select Category of Question:</option>
                <option value="1">1 - Networking</option>
                <option value="2">2 - Windows</option>
                <option value="3">3 - Linux</option>
                <option value="4">4 - Cloud</option>
                <option value="5">5 - Virtualization</option>
                <option value="6">6 - DevOps</option>
                <option value="7">7 - Database</option>
                <option value="8">8 - Others</option>
                <option value="9">9 - Essay</option>
                 </select>
            </div>

          <hr>
          <button class="btn btn-success d-block m-auto" style = "width:50%;" type="submit"> Add! </button>
          <br>
          </form>                     
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>

<!-- --------------------------------------------------------- -->


<?php include('footer.php'); ?>

</body>
</html>
