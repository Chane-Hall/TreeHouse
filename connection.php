<?php
session_start();
$id = $_SESSION['userid'];
$user = $_POST["user"];
$con = $_POST["conn"];

$db = mysqli_connect('localhost', 'u17061238', 'qolxks', 'u17061238');

if($con == 'Connect'){
	$sqllll = "INSERT INTO relation (user1, user2)
			VALUES ('".$id."','". $_POST["user"] ."')";
  $delBool = mysqli_query($db, $sqllll);
  echo json_encode($sqllll);
  echo json_encode($delBool);
}
else if($con == 'Disconnect'){
$sqlDel = "DELETE FROM relation WHERE (user1='$id' AND user2='$user') OR (user2='$id' AND user1='$user')";
  $delBool = mysqli_query($db, $sqlDel);

  echo json_encode($sqlDel);
  echo json_encode($delBool);
}
  header('location: home.php');
?>