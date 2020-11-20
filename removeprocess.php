<?php
session_start();

include('connect.php');
//Declare variables
$opt = $_POST['opt2'];
$strvalue = $_POST['delete'];

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


foreach ($strvalue as $str){
$postquestions = "DELETE FROM questions WHERE cat_id = $opt AND q_id = $str";
$finalquestions = mysqli_query($con, $postquestions);

$postanswers = "DELETE FROM answers WHERE ans_id = $str";
$finalanswers = mysqli_query($con, $postanswers);

}
if(!$finalquestions || !$finalanswers){
  echo("Error description: " . mysqli_error($con));
}
else{
	header('location:removequestion.php');
}
?>