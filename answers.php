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
	<title>Answers - C1WS Exam</title>

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
         

      <div class="container bg-light">
         <?php
          $userName = $_POST['userName2'];
          $userDate = $_POST['userDate2'];
          $topicNum = $_POST['topicNum'];

          $resultquery = "SELECT * FROM usersession WHERE name = '$userName' and date = '$userDate'";
          $queryr = mysqli_query($con, $resultquery);
         ?>
         <div class="card text-center">
            <h3>Name: <?php echo $userName; ?><br>Date and Time Taken: <?php echo $userDate; ?></h3>
        </div>
          <div class="card bg-light">
              <?php
                  if($rows1 = mysqli_fetch_array($queryr)){
                      if($topicNum == '1'){
                      $array = $rows1['net_sc_array'];
                      ?>
                      <h3 align = "center"><b>Networking</b></h3>
                      <?php
                    }
                    else if($topicNum == '2'){
                      $array = $rows1['win_sc_array'];
                      ?>
                      <h3 align = "center"><b>Windows</b></h3>
                      <?php
                    }
                    else if($topicNum == '3'){
                      $array = $rows1['lin_sc_array'];
                      ?>
                      <h3 align = "center"><b>Linux</b></h3>
                      <?php
                    }
                    else if($topicNum == '4'){
                      $array = $rows1['clo_sc_array'];
                      ?>
                      <h3 align = "center"><b>Cloud</b></h3>
                      <?php
                    }
                    else if($topicNum == '5'){
                      $array = $rows1['vir_sc_array'];
                      ?>
                      <h3 align = "center"><b>Virtualization</b></h3>
                      <?php
                    }
                    else if($topicNum == '6'){
                      $array = $rows1['dev_sc_array'];
                      ?>
                      <h3 align = "center"><b>DevOps</b></h3>
                      <?php
                    }
                    else if($topicNum == '7'){
                      $array = $rows1['db_sc_array'];
                      ?>
                      <h3 align = "center"><b>Database</b></h3>
                      <?php
                    }
                    else if($topicNum == '8'){
                      $array = $rows1['ot_sc_array'];
                      ?>
                      <h3 align = "center"><b>Others</b></h3>
                      <?php
                    }
                    else if ($topicNum == '9'){
                      $q1 = $rows1['q_essay_id1'];
                      $q2 = $rows1['q_essay_id2'];
                      $q3 = $rows1['q_essay_id3'];
                      $q4 = $rows1['q_essay_id4'];
                      $q5 = $rows1['q_essay_id5'];
                      $a1 = $rows1['essay_sc1'];
                      $a2 = $rows1['essay_sc2'];
                      $a3 = $rows1['essay_sc3'];
                      $a4 = $rows1['essay_sc4'];
                      $a5 = $rows1['essay_sc5'];
                      $s1 = $rows1['sc1_essay'];
                      $s2 = $rows1['sc2_essay'];
                      $s3 = $rows1['sc3_essay'];
                      $s4 = $rows1['sc4_essay'];
                      $s5 = $rows1['sc5_essay'];

                      $eq1 = "SELECT * FROM questions WHERE q_id = $q1";
                          $eqq1 = mysqli_query($con, $eq1);

                          if($f_eqq1 = mysqli_fetch_array($eqq1)){
                              $f_eq1 = $f_eqq1['question'];
                          }
                      $eq2 = "SELECT * FROM questions WHERE q_id = $q2";
                          $eqq2 = mysqli_query($con, $eq2);

                          if($f_eqq2 = mysqli_fetch_array($eqq2)){
                              $f_eq2 = $f_eqq2['question'];
                          }
                      $eq3 = "SELECT * FROM questions WHERE q_id = $q3";
                          $eqq3 = mysqli_query($con, $eq3);

                          if($f_eqq3 = mysqli_fetch_array($eqq3)){
                              $f_eq3 = $f_eqq3['question'];
                          }
                      $eq4 = "SELECT * FROM questions WHERE q_id = $q4";
                          $eqq4 = mysqli_query($con, $eq4);

                          if($f_eqq4 = mysqli_fetch_array($eqq4)){
                              $f_eq4 = $f_eqq4['question'];
                          }
                      $eq5 = "SELECT * FROM questions WHERE q_id = $q5";
                          $eqq5 = mysqli_query($con, $eq5);

                          if($f_eqq5 = mysqli_fetch_array($eqq5)){
                              $f_eq5 = $f_eqq5['question'];
                          }
                      ?>
                      <h3 align = "center"><b>Essay</b></h3>
                      <?php
                    }
                  }
                      if($topicNum != '9'){
                      ?>
                       <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <td><b>#</b></td>
                              <td><b>Question</b></td>
                              <td><b>Chosen Answer</b></td>
                              <td><b>Correct Answer</b></td>
                              <td><b>Correct?</b></td>
                            </tr>
                          </thead>
                      <?php
                      $unserial_array = unserialize($array);
                      $x=1;
                      foreach($unserial_array as $arr_set){
                          $questionq = "SELECT * FROM questions WHERE q_id = $arr_set[0]";
                          $queryqq = mysqli_query($con, $questionq);

                          if($qq = mysqli_fetch_array($queryqq)){
                              $final_qq = $qq['question'];
                          }

                          $chosenanswer = "SELECT * FROM answers WHERE a_id = $arr_set[1]";
                          $chosen_aquery = mysqli_query($con, $chosenanswer);

                          if($ch_a = mysqli_fetch_array($chosen_aquery)){
                              $final_ans = $ch_a['ans'];
                          }

                          $correctanswer = "SELECT * FROM answers WHERE a_id = $arr_set[2]";
                          $correct_aquery = mysqli_query($con, $correctanswer);

                          if($co_a = mysqli_fetch_array($correct_aquery)){
                              $final_c_ans = $co_a['ans'];
                          }
                          $correct = $final_ans == $final_c_ans;
                          if($correct){
                            $correct_value = "Yes";
                          }
                          else{
                            $correct_value = "No";
                          }
                          ?>
                        <tbody>
                          <td><?php echo strval($x); ?></td>
                          <td><?php echo $final_qq; ?></td>
                          <td><?php echo $final_ans; ?></td>
                          <td><?php echo $final_c_ans; ?></td>
                          <td><?php echo $correct_value; ?></td>
                        </tbody>
                          <?php
                          $x++;
                      }
                    ?>
                    </table>
                    <?php
                    }else{
                      ?>
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <td><b>#</b></td>
                          <td><b>Question</b></td>
                          <td><b>Answer</b></td>
                          <td><b>Score</b></td>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                          <td><?php echo "1"; ?></td>
                          <td><?php echo $f_eq1; ?></td>
                          <td><?php echo $a1; ?></td>
                          <td><?php echo $s1; ?></td>
                          </tr>
                          <tr>
                          <td><?php echo "2"; ?></td>
                          <td><?php echo $f_eq2; ?></td>
                          <td><?php echo $a2; ?></td>
                          <td><?php echo $s2; ?></td>
                          </tr>
                          <tr>
                          <td><?php echo "3"; ?></td>
                          <td><?php echo $f_eq3; ?></td>
                          <td><?php echo $a3; ?></td>
                          <td><?php echo $s3; ?></td>
                          </tr>
                          <tr>
                          <td><?php echo "4"; ?></td>
                          <td><?php echo $f_eq4; ?></td>
                          <td><?php echo $a4; ?></td>
                          <td><?php echo $s4; ?></td>
                          </tr>
                          <tr>
                          <td><?php echo "5"; ?></td>
                          <td><?php echo $f_eq5; ?></td>
                          <td><?php echo $a5; ?></td>
                          <td><?php echo $s5; ?></td>
                          </tr>
                        </tbody>
                      </table>
                      <?php
                    }
              ?>
        </div>
        <br>
        <br>
    </div>

          

<!-- --------------------------------------------------------- -->


<?php include('footer.php'); ?>
</body>
</html>
