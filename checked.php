<?php
session_start();
error_reporting(0);
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:../C1WSExam/index.php');
  exit;
}
include('connect.php');

$querymax = "SELECT MAX(q_id) AS maximum FROM questions";
$query = mysqli_query($con, $querymax);
$row = mysqli_fetch_array($query);
$maxvalue = $row['maximum'];
for($i=1 ; $i <= $maxvalue ; $i++){
$updatequery = "UPDATE questions SET fin = 0 WHERE q_id = $i";
mysqli_query($con, $updatequery);
}


   ?>
<!DOCTYPE html>
<html>
   <head>
    <link rel="shortcut icon" type="image/png" href="img/PHDSAAS.png"/>
      <title>Thank You - C1WS Exam</title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style type="text/css">
	.animateuse{
			animation: leelaanimate 0.5s infinite;
		}

@keyframes leelaanimate{
			0% { color: red },
			10% { color: yellow },
			20%{ color: blue }
			40% {color: green },
			50% { color: pink }
			60% { color: orange },
			80% {  color: black },
			100% {  color: brown }
		}
    body{
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
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
   <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php" >
                        <img src="img/ds-logo.png" height="32" width="32" class="d-inline-block align-top" alt="">
                        | PH Cloud One Enablement Exam
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
        </nav>
     <div class="container text-center" >
        <br>
      <table class="table text-center table-bordered table-hover">
      	<tr>
      		<th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
      		
      	</tr>
      	<tr>
		      	<td>
		      		Questions Attempted
		      	</td>

	       <?php
         $counter = 0;
         $Resultans = 0;
            if(isset($_POST['submit'])){
              if(!empty($_POST['quizcheck'])) {

                $count = count($_POST['quizcheck']);
                ?>
              <td>
                <?php
                echo "Out of 65, you have provided ".$count. " answers";
                ?>
              </td>
                <?php
                $netarray=array();
                $winarray =array();
                $linarray =array();
                $cloudarray =array();
                $virarray =array();
                $devarray =array();
                $dbarray =array();
                $otarray =array();
                $essayid=array();
                $essayqq=array();
                $essayans=array();
                $result = 0;
                $netscore = 0;
                $winscore = 0;
                $linscore = 0;
                $cloudscore = 0;
                $virscore = 0;
                $devscore = 0;
                $dbscore = 0;
                $otscore = 0;

                $qmax = "SELECT MAX(q_id) AS mq FROM questions";
                $q = mysqli_query($con, $qmax);
                $re = mysqli_fetch_array($q);
                $mxq = $re['mq'];

                $selected = $_POST['quizcheck'];
                $selectedcat = $_POST['quizcheckcat'];
                $selectedqid = $_POST['quizcheckid'];
                for($i=1; $i <= $mxq ; $i++){
                $q = "select * from questions";
                $query = mysqli_query($con, $q);

                while ($rows = mysqli_fetch_array($query)){

                  $checked = $rows['ans'] == $selected[$i];
                  if($checked){
                    $result++;

                      if($selectedcat[$i] == "1"){

                        $netscore++;
                      }
                      else if ($selectedcat[$i] == "2"){
                        
                        $winscore++;
                      }
                      else if ($selectedcat[$i] == "3"){
                        
                        $linscore++;
                      }
                      else if ($selectedcat[$i] == "4"){
                        
                        $cloudscore++;
                      }
                      else if ($selectedcat[$i] == "5"){
                        
                        $virscore++;
                      }
                      else if ($selectedcat[$i] == "6"){
                        
                        $devscore++;
                      }
                      else if ($selectedcat[$i] == "7"){
                        
                        $dbscore++;
                      }
                      else if ($selectedcat[$i] == "8"){
                        
                        $otscore++;
                      }
                  }
              }
              if($selectedcat[$i] == "1"){
                        $intn = "select * from questions WHERE cat_id = $selectedcat[$i] AND q_id = $selectedqid[$i]";
                        $queryintn = mysqli_query($con, $intn);

                        if($rowsintn = mysqli_fetch_array($queryintn)){
                        $q_and_an=array();
                        array_push($q_and_an, $selectedqid[$i], $selected[$i], $rowsintn['ans']);
                        array_push($netarray, $q_and_an);
                        }
                      }
              else if ($selectedcat[$i] == "2"){
                        $intw = "select * from questions WHERE cat_id = $selectedcat[$i] AND q_id = $selectedqid[$i]";
                        $queryintw = mysqli_query($con, $intw);

                        if($rowsintw = mysqli_fetch_array($queryintw)){
                        $q_and_aw=array();
                        array_push($q_and_aw, $selectedqid[$i], $selected[$i], $rowsintw['ans']);
                        array_push($winarray, $q_and_aw);
                        }
                      }
              else if ($selectedcat[$i] == "3"){
                        $intl = "select * from questions WHERE cat_id = $selectedcat[$i] AND q_id = $selectedqid[$i]";
                        $queryintl = mysqli_query($con, $intl);

                        if($rowsintl = mysqli_fetch_array($queryintl)){
                        $q_and_al=array();
                        array_push($q_and_al, $selectedqid[$i], $selected[$i], $rowsintl['ans']);
                        array_push($linarray, $q_and_al);
                        }
                      }
              else if ($selectedcat[$i] == "4"){
                        $intc = "select * from questions WHERE cat_id = $selectedcat[$i] AND q_id = $selectedqid[$i]";
                        $queryintc = mysqli_query($con, $intc);

                        if($rowsintc = mysqli_fetch_array($queryintc)){
                        $q_and_ac=array();
                        array_push($q_and_ac, $selectedqid[$i], $selected[$i], $rowsintc['ans']);
                        array_push($cloudarray, $q_and_ac);
                        }
                      }
              else if ($selectedcat[$i] == "5"){
                        $intv = "select * from questions WHERE cat_id = $selectedcat[$i] AND q_id = $selectedqid[$i]";
                        $queryintv = mysqli_query($con, $intv);

                        if($rowsintv = mysqli_fetch_array($queryintv)){
                        $q_and_av=array();
                        array_push($q_and_av, $selectedqid[$i], $selected[$i], $rowsintv['ans']);
                        array_push($virarray, $q_and_av);
                        }
                      }
              else if ($selectedcat[$i] == "6"){
                        $intd = "select * from questions WHERE cat_id = $selectedcat[$i] AND q_id = $selectedqid[$i]";
                        $queryintd = mysqli_query($con, $intd);

                        if($rowsintd = mysqli_fetch_array($queryintd)){
                        $q_and_ad=array();
                        array_push($q_and_ad, $selectedqid[$i], $selected[$i], $rowsintd['ans']);
                        array_push($devarray, $q_and_ad);
                        }
                      }
              else if ($selectedcat[$i] == "7"){
                        $intdb = "select * from questions WHERE cat_id = $selectedcat[$i] AND q_id = $selectedqid[$i]";
                        $queryintdb = mysqli_query($con, $intdb);

                        if($rowsintdb = mysqli_fetch_array($queryintdb)){
                        $q_and_adb=array();
                        array_push($q_and_adb, $selectedqid[$i], $selected[$i], $rowsintdb['ans']);
                        array_push($dbarray, $q_and_adb);
                        }
                      }
              else if ($selectedcat[$i] == "8"){
                        $into = "select * from questions WHERE cat_id = $selectedcat[$i] AND q_id = $selectedqid[$i]";
                        $queryinto = mysqli_query($con, $into);

                        if($rowsinto = mysqli_fetch_array($queryinto)){
                        $q_and_ao=array();
                        array_push($q_and_ao, $selectedqid[$i], $selected[$i], $rowsinto['ans']);
                        array_push($otarray, $q_and_ao);
                        }
                      }

              else if ($selectedcat[$i] == "9"){
                    $finalans = mysqli_real_escape_string($con, nl2br($selected[$i]));
                    $finalqid = $selectedqid[$i];
                    array_push($essayans, $finalans);
                    array_push($essayid, $finalqid);
                  }
               //printf($selected[$i]);
            }
                ?>
                <?php
            }
          }
          ?>
            <?php


#serialize arrays
$serial_netarray = serialize($netarray);
$serial_winarray = serialize($winarray);
$serial_linarray = serialize($linarray);
$serial_cloudarray = serialize($cloudarray);
$serial_virarray = serialize($virarray);
$serial_devarray = serialize($devarray);
$serial_dbarray = serialize($dbarray);
$serial_otarray = serialize($otarray);



date_default_timezone_set('Singapore');
$date = date('m/d/Y h:i:s a', time());
$month = date('F');
$year = date('Y');


$querymax = "SELECT MAX(u_id) AS maximum FROM usersession";
$query = mysqli_query($con, $querymax);
$row = mysqli_fetch_array($query);
$maxvalue = $row['maximum'];
$maxvalue++;
$alterquery ="ALTER TABLE usersession AUTO_INCREMENT = $maxvalue";
mysqli_query($con, $alterquery);
            
$name = $_SESSION['username'];
$passw = $_SESSION['password'];
$finalresult = "INSERT INTO usersession(u_id,name,u_q_id, u_a_id, net_sc, win_sc, lin_sc, clo_sc, vir_sc, dev_sc, db_sc, ot_sc, ess_sc , date, month, year, essay_sc1, essay_sc2, essay_sc3, essay_sc4, essay_sc5, q_essay_id1, q_essay_id2, q_essay_id3, q_essay_id4, q_essay_id5, sc1_essay, sc2_essay, sc3_essay, sc4_essay, sc5_essay, net_sc_array, win_sc_array, lin_sc_array, clo_sc_array, vir_sc_array, dev_sc_array, db_sc_array, ot_sc_array) values ('$maxvalue','$name','60','$result','$netscore','$winscore','$linscore','$cloudscore','$virscore','$devscore','$dbscore','$otscore', 0, '$date', '$month', '$year', '$essayans[0]', '$essayans[1]', '$essayans[2]', '$essayans[3]', '$essayans[4]', '$essayid[0]', '$essayid[1]', '$essayid[2]', '$essayid[3]', '$essayid[4]', 0, 0, 0, 0, 0, '$serial_netarray', '$serial_winarray', '$serial_linarray', '$serial_cloudarray', '$serial_virarray', '$serial_devarray', '$serial_dbarray', '$serial_otarray')";
//$deletepw = "DELETE FROM passwordtest WHERE password = '$passw'" ;
$queryresult= mysqli_query($con,$finalresult);
//$dpw= mysqli_query($con,$deletepw);


if(!$queryresult){
  echo("Error description: " . mysqli_error($con));
}
?>


      </table>

      	<a href="logout.php" class="btn btn-success"> FINISH </a>
      </div>
              <style>
            #footer {
              position: absolute;
              bottom: 0;
              width: 100%;
              height: 3.0rem;            /* Footer height */
            }
            </style>
                  <!-- End of Main Content -->

                    <!-- Footer -->
      <footer class="sticky-footer" id="footer">
        <div class="container my-auto" id>
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Clarky 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
   </body>
</html>