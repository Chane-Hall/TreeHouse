<?php
session_start();
$id = $_SESSION['userid'];

$db = mysqli_connect('localhost', 'u17061238', 'qolxks', 'u17061238');
$sqllll = "INSERT INTO reviews (location, owner, text, reviewer)
			VALUES ('".$_POST["locaId"]."','". $_POST["owner"] ."','". $_POST["review"] ."','". $id ."')";
  $delBool = mysqli_query($db, $sqllll);
  echo json_encode($sqllll);
  echo json_encode($delBool);
  header('location: home.php');
?>