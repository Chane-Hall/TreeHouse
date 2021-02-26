<?php
session_start();
$id = $_SESSION['userid'];
if($_POST["send"]){
//
}
$db = mysqli_connect('localhost', 'u17061238', 'qolxks', 'u17061238');
$sqllll = "INSERT INTO messages (text, userTo, userFrom)
			VALUES ('".$_POST["msg"]."','". $_POST["from"] ."','". $id ."')";
  $delBool = mysqli_query($db, $sqllll);
  echo json_encode($sqllll);
  echo json_encode($delBool);
  header('location: home.php');
?>