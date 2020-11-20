<?php
   session_start();
   error_reporting(0);
   if(!isset($_SERVER['HTTP_REFERER'])){
      // redirect them to your desired location
      header('location:../C1WSExam/index.php');
      exit;
  }
   
   if(!isset($_SESSION['username'])){
   	header('location:index.php');
   }
   
include('connect.php');
   
   ?>
<!DOCTYPE html>
<html>
   <head>
    <link rel="shortcut icon" type="image/png" href="img/PHDSAAS.png"/>
      <title>Examination Page - C1WS Exam</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="
         https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
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

         #txtarea {
         display:block;
         width:99%;
         padding:0.5%;
         margin:0;
         border:1px solid #f0f040;
         background-color:#fffff0;
         overflow:auto;
         resize: none;
         }
          body{
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
      .big{
        width:1.2em;
        height:1.2em;
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
                 <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav ml-auto">
                    <h5 style = "color:white;"><a href="#" class="text-uppercase text-warning"> <?php echo $_SESSION['username']; ?></a>,&nbsp;Welcome to the Exam!</h5>
                  </div>
                </div>
        </nav>
      <div>
        <div class="card-header bg-dark text-white text-center" style="font-weight: bold; position: fixed; right:2%; z-index: 1;" id="quiz-time-left"></div>
          <div class="container">
            <br>
            <div class="col-lg-10 d-block m-auto quizsetting ">
               <div class="card">
                  <p class="card-header text-center" > The exam contains 65 questions. Best of Luck!</p>
               </div>
               <form action="checked.php" name = "form" id = "form" method="post">
                 <!-- <div class = "card">
                     <h6 class = "card-header text-justify">Networking</h6>
                     </div> -->
                 <?php
                 for($i=1 ; $i <= 65 ; $i++){

                  if ($i <= 10){
                      $q = "select * from questions where cat_id = 1 AND fin = 0 ORDER BY RAND() LIMIT 1";
                  }
                  else if ($i >10 && $i <=20){
                      $q = "select * from questions where cat_id = 2 AND fin = 0 ORDER BY RAND() LIMIT 1";
                  }
                  else if ($i >20 && $i <=30){
                      $q = "select * from questions where cat_id = 3 AND fin = 0 ORDER BY RAND() LIMIT 1";
                  }
                  else if ($i >30 && $i <=40){
                      $q = "select * from questions where cat_id = 4 AND fin = 0 ORDER BY RAND() LIMIT 1";
                  }
                  else if ($i >40 && $i <=45){
                      $q = "select * from questions where cat_id = 5 AND fin = 0 ORDER BY RAND() LIMIT 1";
                  }
                  else if ($i >45 && $i <=50){
                      $q = "select * from questions where cat_id = 6 AND fin = 0 ORDER BY RAND() LIMIT 1";
                  }
                  else if ($i >50 && $i <=55){
                      $q = "select * from questions where cat_id = 7 AND fin = 0 ORDER BY RAND() LIMIT 1";
                  }
                  else if ($i >55 && $i <=60){
                      $q = "select * from questions where cat_id = 8 AND fin = 0 ORDER BY RAND() LIMIT 1";
                  }
                  else if ($i >60 && $i <=65){
                      $q = "select * from questions where cat_id = 9 AND fin = 0 ORDER BY RAND() LIMIT 1";
                  }
                 $query = mysqli_query($con, $q);

                 if ($rowsq = mysqli_fetch_array($query)){
                  $questionID = $rowsq['q_id'];
                 ?>
                 <br>
                 <div class = "card border border-dark">
                     <h5 class = "card-header text-justify"> <?php echo $i;?>.) <?php echo $rowsq['question'] ?> </h5>
                     </div>
                     <div>

                     <?php
                        $a = "select * from answers where ans_id = $questionID ORDER BY RAND()"; //kung ano i-query nung SQL statement, yun ung gagamitin ng answers pang query ng katumbas na choices
                        $query = mysqli_query($con, $a);

                        if ($i <= 60){
                        while ($rowsa = mysqli_fetch_array($query)){
                     ?>
                     <div class ="card-body bg-dark text-white">
                        <input type = "radio" class = "big" name="quizcheck[<?php echo $rowsq['q_id'] ;?>]" value="<?php echo $rowsa['a_id'] ; ?>"> <?php echo $rowsa['ans'] ; ?> <?php //ung quizcheck nakabased na sa q_id hindi na sa a_id ?>
                         <input type = "hidden" name="quizcheckcat[<?php echo $rowsq['q_id'] ;?>]" value="<?php echo $rowsq['cat_id'] ; ?>"><?php //kunin ung value ng category ?>
                         <input type = "hidden" name="quizcheckid[<?php echo $rowsq['q_id'] ;?>]" value="<?php echo $rowsq['q_id'] ; ?>"><?php //kunin ung value ng question ID ?>
                     </div>
                  <?php
               }
            }
            else if ($i > 60){
                  ?>
                  <div class ="card-body bg-dark text-white">
                        <textarea id = "txtarea" maxlength = "1000" cols="1" rows="5" name="quizcheck[<?php echo $rowsq['q_id'] ;?>]"></textarea>
                        <input type = "hidden" name="quizcheckcat[<?php echo $rowsq['q_id'] ;?>]" value="<?php echo $rowsq['cat_id'] ; ?>"><?php //kunin ung value ng category ?>
                        <input type = "hidden" name="quizcheckid[<?php echo $rowsq['q_id'] ;?>]" value="<?php echo $rowsq['q_id'] ; ?>"><?php //kunin ung value ng question ID ?>
                     </div>
                  <?php
               }
                  $updatequery = "UPDATE questions SET fin = 1 WHERE q_id = $questionID";
                  mysqli_query($con, $updatequery);
         }
               /*if ($i == 10){
               ?><div class = "card">
                     <h6 class = "card-header text-justify">Windows</h6>
                     </div><?php //etong mga shits na to, pang divider kada tapos ng category, oks na to no need to change if same logic pa din gagamitin
            }
            else if ($i == 20){
               ?><div class = "card">
                     <h6 class = "card-header text-justify">Linux</h6>
                     </div><?php
            }
            else if ($i == 30){
               ?><div class = "card">
                     <h6 class = "card-header text-justify">Cloud</h6>
                     </div><?php
            }
            else if ($i == 40){
               ?><div class = "card">
                     <h6 class = "card-header text-justify">Virtualization</h6>
                     </div><?php
            }
            else if ($i == 45){
               ?><div class = "card">
                     <h6 class = "card-header text-justify">DevOps</h6>
                     </div><?php
            }
            else if ($i == 50){
               ?><div class = "card">
                     <h6 class = "card-header text-justify">Database</h6>
                     </div><?php
            }
            else if ($i == 55){
               ?><div class = "card">
                     <h6 class = "card-header text-justify">Others</h6>
                     </div><?php
            }
            else if ($i == 60){
               ?><div class = "card">
                     <h6 class = "card-header text-justify">Essay</h6>
                     </div><?php
            }*/
         }
               ?>

                  </div>

                  <br>
                  <div class = "card">
                  <input type="submit" name="submit" id ="buttonsub" style = "width:100%;" Value="Submit" class="btn btn-success m-auto d-block" />
                  <hr>
               </form>

        </div>
      </div>
   </body>
    <script type="text/javascript">
                var max_time = 60;
                var c_seconds  = 0;
                var total_seconds =60*max_time;
                max_time = parseInt(total_seconds/60);
                c_seconds = parseInt(total_seconds%60);
                document.getElementById("quiz-time-left").innerHTML='Time Left: ' + max_time + ' minutes ' + c_seconds + ' seconds';
                function init(){
                document.getElementById("quiz-time-left").innerHTML='Time Left: ' + max_time + ' minutes ' + c_seconds + ' seconds';
                setTimeout("CheckTime()",999);
                }
                function CheckTime(){
                document.getElementById("quiz-time-left").innerHTML='Time Left: ' + max_time + ' minutes ' + c_seconds + ' seconds' ;
                if(total_seconds <=0){
                setTimeout(document.getElementById("buttonsub").click(),1);
                    
                    } else {
                total_seconds = total_seconds -1;
                max_time = parseInt(total_seconds/60);
                c_seconds = parseInt(total_seconds%60);
                setTimeout("CheckTime()",999);
                  }

                }
                init();


                </script>
</html>