<?php
$server = 'localhost';
$user = 'u17061238';
$pass = 'qolxks';

$connection = mysqli_connect($server, $user , $pass, $user);
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'u17061238');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>