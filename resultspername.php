<?php
session_start();
error_reporting(0);
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:../C1WSExam/index.php');
  exit;
}
include('connect.php');

if(isset($_SESSION['userx'])){
    $user = $_SESSION['userx'];
    $date = $_SESSION['datex'];
   }
   else{
    $user = $_POST['userName'];
    $date = $_POST['userDate'];
   }


$dates = "";

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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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


// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    <?php
                      $resultquery = "SELECT * FROM usersession WHERE name = '$user' and date = '$date'";
                      $queryr = mysqli_query($con, $resultquery);
                      if ($value = mysqli_fetch_array($queryr)){
                      $dates = $value['date'];
    ?>
  ['Task', 'Score'],
  ['Networking', <?php echo $value['net_sc']; ?>],
  ['Windows', <?php echo $value['win_sc']; ?> ],
  ['Linux', <?php echo $value['lin_sc']; ?> ],
  ['Cloud', <?php echo $value['clo_sc']; ?> ]

  
                          <?php
                      }
                          ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = { chart: {'title':'Grades','titlePosition':'none'}, colors: ['green'], hAxis: { viewWindowMode:'explicit', format: '0',
            viewWindow: {
              max:10,
              min:0
            }}};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.BarChart(document.getElementById('barchart'));
  chart.draw(data, options);
}

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart2);

function drawChart2() {
  var data2 = google.visualization.arrayToDataTable([
    <?php
                      $resultquery2 = "SELECT * FROM usersession WHERE name = '$user' and date = '$date'";
                      $queryr2 = mysqli_query($con, $resultquery2);
                      if ($value2 = mysqli_fetch_array($queryr2)){

    ?>
  ['Task', 'Score'],
  ['Virtualization', <?php echo $value2['vir_sc']; ?>],
  ['DevOps', <?php echo $value2['dev_sc']; ?>],
  ['Database', <?php echo $value2['db_sc']; ?>],
  ['Other', <?php echo $value2['ot_sc']; ?>]

  
                          <?php
                      }
                          ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options2 = { chart: {'title':'Grades','titlePosition':'none'}, colors: ['orange'], hAxis: { viewWindowMode:'explicit', format: '0',
            viewWindow: {
              max:5,
              min:0
            }}};

  // Display the chart inside the <div> element with id="piechart"
  var chart2 = new google.visualization.BarChart(document.getElementById('barchart2'));
  chart2.draw(data2, options2);
}

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart3);

function drawChart3() {
  var data3 = google.visualization.arrayToDataTable([
    <?php
                      $resultquery3 = "SELECT * FROM usersession WHERE name = '$user' and date = '$date'";
                      $queryr3 = mysqli_query($con, $resultquery3);
                      if ($value3 = mysqli_fetch_array($queryr3)){
    ?>
  ['Task', 'Score'],
  ['Essay', <?php echo $value3['ess_sc']; ?>]

  
                          <?php
                      }
                          ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options3 = { chart: {'title':'Grades','titlePosition':'none'}, colors: ['violet'], hAxis: { viewWindowMode:'explicit', format: '0',
            viewWindow: {
              max:20,
              min:0
            }}};

  // Display the chart inside the <div> element with id="piechart"
  var chart3 = new google.visualization.BarChart(document.getElementById('barchart3'));
  chart3.draw(data3, options3);
}

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart4);

function drawChart4() {
  var data4 = google.visualization.arrayToDataTable([
    <?php
                      $resultquery4 = "SELECT * FROM usersession WHERE name = '$user' and date = '$date'";
                      $queryr4 = mysqli_query($con, $resultquery4);
                      if ($value4 = mysqli_fetch_array($queryr4)){
                        $totalscore = $value4['u_a_id'] + $value4['ess_sc'];
    ?>
  ['Task', '%'],
  ['Total: <?php echo $totalscore; ?>/80', <?php echo $totalscore  ?> / 80]

  
                          <?php
                      }
                          ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options4 = { chart: {'title':'Grades','titlePosition':'none'},  hAxis: { viewWindowMode:'explicit', format: '#%',
            viewWindow: {
              max:1,
              min:0.00
            }}};

  // Display the chart inside the <div> element with id="piechart"
  var chart4 = new google.visualization.BarChart(document.getElementById('barchart4'));
  chart4.draw(data4, options4);
}

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
  <div class="card text-center">
    <h3>Name: <?php echo $user; ?><br>Date and Time Taken: <?php echo $dates; ?></h3>
  </div>
  <div class="card bg-light">
    <div id="barchart"></div>
  </div>
  <div class="card bg-light">
    <div id="barchart2"></div>
  </div>
   <div class="card bg-light">
    <div id="barchart3"></div>
  </div>
  <div class="card bg-light">
    <div id="barchart4"></div>
  </div>
</div>
<br>
<br>
<!-- --------------------------------------------------------- -->


<?php include('footer.php'); ?>

</body>
</html>