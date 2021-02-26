<?php
session_start();
$id = $_SESSION['userid'];
$loca = $_POST["loca"];
$dIn = $_POST["date1"];
$dOut = $_POST["date2"];


$db = mysqli_connect('localhost', 'u17061238', 'qolxks', 'u17061238');

$user_check_query = "SELECT * FROM trees WHERE id='$loca' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

$sqllll = "INSERT INTO bookings (location, dateIn, dateOut, visitor, owner)
			VALUES ('". $_POST["loca"] ."','". $_POST["date1"] ."','". $_POST["date2"] ."','". $id ."','".$user["owner"]."')";
  $delBool = mysqli_query($db, $sqllll);
  echo json_encode($sqllll);
  echo json_encode($delBool);
  header('location: home.php');
?>