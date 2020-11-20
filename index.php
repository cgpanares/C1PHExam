<?php 
include('connect.php');

?>

<html>
<head>
<link rel="shortcut icon" type="image/png" href="img/PHDSAAS.png"/>
<title>Welcome to PH C1WS Enablement Exam!</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:300|Roboto+Slab:400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!------ Include the above in your HEAD tag ---------->
<script src="js/three.r95.min.js"></script>
<script src="js/vanta.net.min.js"></script>
<script>
   $(document).ready(function()
      { 
             $(document).bind("contextmenu",function(e){
                    return false;
             });
      });
</script>
<style>

body {
    font-family: "Lato", sans-serif;
    background-color: #000;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

input{
  text-align:center;
}

::-webkit-input-placeholder {
   text-align: center;
}

:-moz-placeholder { /* Firefox 18- */
   text-align: center;  
}

::-moz-placeholder {  /* Firefox 19+ */
   text-align: center;  
}

:-ms-input-placeholder {  
   text-align: center; 
}

label {
   color:white;
}

.main {
    overflow-x: hidden;
    overflow-y: hidden;
}

.login-main-text{
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}

.fullscreen {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  overflow: auto;
  overflow-x: hidden;
  overflow-y: hidden; /* Just to visualize the extent */
  background-color: black;
  
}

p {
  color:#fff;
}

div.boxx{
   box-shadow: 10px 10px 5px black;
   background-color: #454545;
   border-radius: 15px;
   padding: 20px;
}

</style>
</head>
<body>

<div class = "fullscreen w3-animate-bottom" id = "background-main">
        <center>
          <div class="login-main-text">
          <br><br>
            <img src="img/ds-logo.png" height="250" width="250"><br>
            <h2>PH C1WS Enablement Exam</h2>
         </div></center>
         <center><div class="col-md-4 col-sm-12">
            <div class="login-form w3-container boxx">
                        <center><h2 class = "text-white" style = "font-weight: 300;">Please Login</h2></center>
               <form action="login.php" method="post" id = "loginSubmit">
                  <div class="form-group">
                     <label style = "text-align:left;float: left;">Full Name</label>
                     <input type="text" name = "user" id = "user" class="form-control" placeholder="Full Name" required>
                  </div>
                  <div class="form-group">
                     <label style = "text-align:left;float: left;">Password</label>
                     <input type="password" name = "pass" id = "pass" class="form-control" placeholder="Password" required>
                  </div>
               </form>
               <center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#examReminder" style="width:25%;">Login</button></center>
            </div>
            <br>
            <p>To login, please ask the proctor for the password.<br>&copy 2019 PostManoy</p>
         </div></center>
      </div>

      <script>
            VANTA.NET({
              el: "#background-main",
              mouseControls: true,
              touchControls: true,
              minHeight: 500.00,
              minWidth: 500.00,
              scale: 1.00,
              scaleMobile: 1.00,
              color: 0x810707,
              backgroundColor: 0x2e0201,
              points: 9.00,
              maxDistance: 24.00
            })
</script>

<!-- Modal -->
<div id="examReminder" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Reminders before the exam:</h5>
          <button type="button" class="close" data-dismiss="modal" id = "closeBtnClr">&times;</button>
        </div>
        <div class="modal-body">
          <!--<input class="form-control" id ="inputKey" list="inputKeyl" value = "Choose an option..." autocomplete="off">
                <datalist id="inputKeyl">-->
                  <center>
                    <ul>
                      <li>The exam is good for 60 minutes. You can finish it early depending on you.</li>
                      <li>Please do not refresh the exam page once you are logged in. It will invalidate your attempt.</li>
                      <li>Do not leave any unanswered questions. In case you do not know, try answering it with an intelligent guess.</li>
                      <li>We will require you to share your zoom screen not just the window for the exam for us to be able to monitor you.</li>
                      <li>A member of the team will be proctoring you so please refrain from opening pages to help you out the exam. This would only help us measure your current knowledge with the technologies that the team is currently handling. It does not have any bearing if you will be accepted or not.</li>
                    </ul>
                  </center>           
            <!--</datalist>-->
        </div>
        <div class="modal-footer">
          <button type = "button" class="btn btn-success" onclick = "document.getElementById('loginSubmit').submit();">Start the Exam</button>
        </div>
    </div>
  </div>
</div>

</body>
</html>