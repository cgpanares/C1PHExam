<?php
session_start();
error_reporting(0);

include('connect.php');

$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pass = array(); //remember to declare $pass as an array
$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
for ($i = 0; $i < 8; $i++) {
$n = rand(0, $alphaLength);
$pass[] = $alphabet[$n];
}
$password = implode($pass); //turn the array into a string


$p = "INSERT INTO passwordtest (password) VALUES ('$password')";
mysqli_query($con, $p);
header('location:genpw.php');

?>