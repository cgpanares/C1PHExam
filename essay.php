<?php
session_start();
error_reporting(0);
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:../C1WSExam/index.php');
  exit;
}

include('connect.php');
$user = $_POST['userName'];
$date = $_POST['userDate'];

if (isset($_GET['Message'])) {
     print '<script type="text/javascript">alert("' . $_GET['Messages'] . '");</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="img/PHDSAAS.png"/>
	<title>View Essays (DSAdmin) - C1WS Exam</title>

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

         <div class="container">
<table class="table text-center table-bordered">
  <form action="essaygrading.php" method="post">
    <input type = "hidden" name="xname" value="<?php echo $user; ?>">
    <input type = "hidden" name="xdate" value="<?php echo $date; ?>">
  <tr>
    <th colspan = "2" class="bg-dark"> <h1 class="text-white"> Essay Answers </h1></th>
  </tr>
  <tr>
    <th width = "20%">Date and Name</th>
    <th>Input</th>
  </tr>
    <?php
      $resultquery = "SELECT * FROM usersession where name = '$user' AND date = '$date'";
      $queryr = mysqli_query($con, $resultquery);
      while ($value = mysqli_fetch_array($queryr)){
    ?>
     <tr>
      <td><b><?php echo $value['date']; ?><br><?php echo $value['name']; ?></b></td>
      <td>
          <table class="table text-center table-bordered table-hover fixed">
            <th>Question</th>
          <th>Answer</th>
          <th>Input Score</th>
            <tr>
            <?php if($value['essay_sc1'] != ""){ 
              $qid1 = $value['q_essay_id1'];
              $qidq1 = "SELECT * FROM questions where q_id = $qid1";
              $qidquery1 = mysqli_query($con, $qidq1);
              while($qq1 = mysqli_fetch_array($qidquery1)){
              echo "<td>". $qq1['question']. "</td>";
            }
              echo "<td>". $value['essay_sc1']. "</td>";
            ?>
            <td>  <select name="x1" id="x1">
                <option value="0">Choose Answer</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                 </select> </td>
          <?php } ?>
          </tr>
            <tr>
            <?php if($value['essay_sc2'] != ""){ 
              $qid2 = $value['q_essay_id2'];
              $qidq2 = "SELECT * FROM questions where q_id = $qid2";
              $qidquery2 = mysqli_query($con, $qidq2);
              while($qq2 = mysqli_fetch_array($qidquery2)){
              echo "<td>". $qq2['question']. "</td>";
            }
              echo "<td>". $value['essay_sc2']. "</td>";
            ?>
            <td>  <select name="x2" id="x2">
                <option value="0">Choose Answer</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                 </select> </td>
          <?php } ?>
        </tr>
          <tr>
            <?php if($value['essay_sc3'] != ""){ 
              $qid3 = $value['q_essay_id3'];
              $qidq3 = "SELECT * FROM questions where q_id = $qid3";
              $qidquery3 = mysqli_query($con, $qidq3);
              while($qq3 = mysqli_fetch_array($qidquery3)){
              echo "<td>". $qq3['question']. "</td>";
            }
              echo "<td>". $value['essay_sc3']. "</td>";
            ?>
            <td>  <select name="x3" id="x3">
                <option value="0">Choose Answer</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                 </select> </td>
          <?php } ?>
        </tr>
          <tr>
            <?php if($value['essay_sc4'] != ""){ 
              $qid4 = $value['q_essay_id4'];
              $qidq4 = "SELECT * FROM questions where q_id = $qid4";
              $qidquery4 = mysqli_query($con, $qidq4);
              while($qq4 = mysqli_fetch_array($qidquery4)){
              echo "<td>". $qq4['question']. "</td>";
            }
              echo "<td>". $value['essay_sc4']. "</td>";
            ?>
            <td>  <select name="x4" id="x4">
                <option value="0">Choose Answer</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                 </select> </td>
          <?php } ?>
        </tr>
          <tr>
            <?php if($value['essay_sc5'] != ""){ 
              $qid5 = $value['q_essay_id5'];
              $qidq5 = "SELECT * FROM questions where q_id = $qid5";
              $qidquery5 = mysqli_query($con, $qidq5);
              while($qq5 = mysqli_fetch_array($qidquery5)){
              echo "<td>". $qq5['question']. "</td>";
            }
              echo "<td>". $value['essay_sc5']. "</td>";
            ?>
            <td>  <select name="x5" id="x5">
                <option value="0">Choose Answer</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                 </select> </td>
          <?php } ?>
        </tr>
      </table>
    </tr>
    <tr>
      <td colspan = "2">
<button class="btn btn-success d-block m-auto" style = "width:50%;" type="submit"> Submit Scores </button>
</form>
</td>
</tr>
      <?php
    }
    ?>
</table>
<br>
<table class="table text-center table-bordered">
  <tr>
    <th colspan = "2" class="bg-dark"> <h1 class="text-white"> Criteria </h1></th>
  </tr>
  <tr>
    <th>Score</th>
  </tr>
    <?php

    $resultquery2 = "SELECT * FROM usersession where name = '$user'";
    $queryr2 = mysqli_query($con, $resultquery2);
    while ($value2 = mysqli_fetch_array($queryr2)){
    ?>
     <tr>
      <td colspan = "2">
          <table class="table text-center table-bordered table-hover fixed">
            <th><?php echo $value2['date']; ?><br>Questions</th>
            <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <tr>
          </tr>
            <tr>
            <?php if($value2['essay_sc1'] != ""){
              $id1 = $value2['q_essay_id1'];
              $idq1 = "SELECT * FROM answers where ans_id = $id1";
              $idquery1 = mysqli_query($con, $idq1);
              echo "<td>First Question</td>";
              while($idvalue1 = mysqli_fetch_array($idquery1)){
              echo "<td>".$idvalue1['ans']. "</td>";
            }
          } ?>
          </tr>
            <tr>
            <?php if($value2['essay_sc2'] != ""){
              $id2 = $value2['q_essay_id2'];
              $idq2 = "SELECT * FROM answers where ans_id = $id2";
              $idquery2 = mysqli_query($con, $idq2);
              echo "<td>Second Question</td>";
              while($idvalue2 = mysqli_fetch_array($idquery2)){
              echo "<td>".$idvalue2['ans']. "</td>";
            }
          } ?>
          </tr>
          <tr>
            <?php if($value2['essay_sc3'] != ""){
              $id3 = $value2['q_essay_id3'];
              $idq3 = "SELECT * FROM answers where ans_id = $id3";
              $idquery3 = mysqli_query($con, $idq3);
              echo "<td>Third Question</td>";
              while($idvalue3 = mysqli_fetch_array($idquery3)){
              echo "<td>".$idvalue3['ans']. "</td>";
            }
          } ?>
          </tr>
          <tr>
            <?php if($value2['essay_sc4'] != ""){
              $id4 = $value2['q_essay_id4'];
              $idq4 = "SELECT * FROM answers where ans_id = $id4";
              $idquery4 = mysqli_query($con, $idq4);
              echo "<td>Fourth Question</td>";
              while($idvalue4 = mysqli_fetch_array($idquery4)){
              echo "<td>".$idvalue4['ans']. "</td>";
            }
          } ?>
          </tr>
          <tr>
            <?php if($value2['essay_sc5'] != ""){
              $id5 = $value2['q_essay_id5'];
              $idq5 = "SELECT * FROM answers where ans_id = $id5";
              $idquery5 = mysqli_query($con, $idq5);
              echo "<td>Fifth Question</td>";
              while($idvalue5 = mysqli_fetch_array($idquery5)){
              echo "<td>".$idvalue5['ans']. "</td>";
            }
          } ?>
          </tr>
            
      </table>
    </tr>
      <?php
    }
    ?>
</table>
</div>
<br>


<!-- --------------------------------------------------------- -->


<?php include('footer.php'); ?>

</body>
</html>
