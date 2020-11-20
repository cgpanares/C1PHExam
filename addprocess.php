<?php
session_start();

include('connect.php');
//Declare variables
$question = mysqli_real_escape_string($con, nl2br($_POST['question'])); 
$ch1 = mysqli_real_escape_string($con, nl2br($_POST['ch1'])); 
$ch2 = mysqli_real_escape_string($con, nl2br($_POST['ch2'])); 
$ch3 = mysqli_real_escape_string($con, nl2br($_POST['ch3'])); 
$ch4 = mysqli_real_escape_string($con, nl2br($_POST['ch4'])); 
$corans = $_POST['corans'];
$cat = $_POST['cat'];

//Reset autoincrement for questions table
$querymax = "SELECT MAX(q_id) AS maximum FROM questions";
$query = mysqli_query($con, $querymax);
$row = mysqli_fetch_array($query);
$maxvalue = $row['maximum'];
$maxvalue++;
$alterquery ="ALTER TABLE questions AUTO_INCREMENT = $maxvalue";
mysqli_query($con, $alterquery);


//Reset autoincrement for answers table
$querymax2 = "SELECT MAX(a_id) AS maximum FROM answers";
$query2 = mysqli_query($con, $querymax2);
$row2 = mysqli_fetch_array($query2);
$maxvalue2 = $row2['maximum'];
$maxvalue2++;
$alterquery2 ="ALTER TABLE answers AUTO_INCREMENT = $maxvalue2";
mysqli_query($con, $alterquery2);



//Insert data from page to database
$postquestion = "INSERT INTO questions (q_id, question, ans, cat_id) VALUES (NULL, '$question', '$corans', '$cat')";
$postanswer1 = "INSERT INTO answers (a_id, ans, ans_id) VALUES (NULL, '$ch1', '$maxvalue')";
$postanswer2 = "INSERT INTO answers (a_id, ans, ans_id) VALUES (NULL, '$ch2', '$maxvalue')";
$postanswer3 = "INSERT INTO answers (a_id, ans, ans_id) VALUES (NULL, '$ch3', '$maxvalue')";
$postanswer4 = "INSERT INTO answers (a_id, ans, ans_id) VALUES (NULL, '$ch4', '$maxvalue')";
mysqli_query($con, $postquestion);
mysqli_query($con, $postanswer1);
mysqli_query($con, $postanswer2);
mysqli_query($con, $postanswer3);
mysqli_query($con, $postanswer4);
header('location:addquestion.php?Message=You have added the question successfully!' . urlencode($Message));
?>