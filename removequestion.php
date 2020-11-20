<?php
session_start();
error_reporting(0);

include('connect.php');

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="img/PHDSAAS.png"/>
	<title>Remove Question (DSAdmin) - C1WS Exam</title>

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
<br><br>
<div class="container bg-light">    
     <div class="container" id="div1">
            <div class="row">
                <div class="col">
                    <form action="" method = "post" id = "remove">
                      <h3 class = "text-center">Choose a Topic:</h3>
                      <select class="form-control" id="opt" name = "opt" onchange = "document.getElementById('remove').submit();">
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
                        <br>
                  </form>
                  <form action="removeprocess.php" method = "post" id = "remove2">
                  <div class="form-group card">
                    <div class="container" id = "tableopt" style="height: 300px;overflow-y: scroll;">
                          <?php
                              if(isset($_POST['opt'])){ //check if form was submitted
                                  $topic = $_POST['opt'];
                                  
                                  if ($topic == 0){
                                      echo "<script>document.getElementById('opt').value = '". $topic ."'</script>";
                                      echo "<script>$('#tableopt').html('');</script>";
                                  }
                                  else {
                                      echo "<script>document.getElementById('opt').value = '". $topic ."'</script>";
                                      $i = 0;
                                      $qopt1 = "select q_id, question AS quest from questions WHERE cat_id = $topic";
                                      $queryopt1 = mysqli_query($con, $qopt1);
                                      while($roopt1 = mysqli_fetch_array($queryopt1)){
                                        echo "<input type='checkbox' name='delete[". $i ."]' value='". $roopt1['q_id'] ."' /> ". $roopt1['quest'] ."<br>";
                                        $i++;
                                      }
                                  }
                                } 
                          ?>
                          </div>
                        </div>
                    </div>
                   </div>
            </div>

            <div class="container" id="div2">
              <input type="text" name="opt2" id="opt2" class="form-control text-center" value = "<?php echo $topic; ?>" hidden>
              <input type = "submit" class="btn btn-danger btn-lg btn-block" id = "submit" value = "Remove">
            </div>
          </form>
  </div>
  <br>
  <br>

<!-- --------------------------------------------------------- -->


<?php include('footer.php'); ?>

</body>
</html>
