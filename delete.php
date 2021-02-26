<?php
session_start();
$id = $_SESSION['userid'];

$db = mysqli_connect('localhost', 'u17061238', 'qolxks', 'u17061238');
$sqlDel = "DELETE FROM users WHERE id_user='$id'";
  $delBool = mysqli_query($db, $sqlDel);
$sqlDel = "DELETE FROM bookings WHERE owner='$id'";
  $delBool = mysqli_query($db, $sqlDel);
$sqlDel = "DELETE FROM trees WHERE owner='$id'";
  $delBool = mysqli_query($db, $sqlDel);

  echo json_encode($sqlDel);
  echo json_encode($delBool);
  header('location: index.php');
?>