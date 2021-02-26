<?php
session_start();
$id = $_SESSION['userid'];
$db = mysqli_connect('localhost', 'u17061238', 'qolxks', 'u17061238');

$name = $_POST['name'];
$addr = $_POST['address'];
$descr = $_POST['description'];
$type = $_POST['type'];
$pict = $_POST['picture'];

  	$query = "INSERT INTO trees (name,photo, address,description,type,owner) VALUES('".$_POST['name']."','".$_POST['picture']."', '".$_POST['address']."', '".$_POST['description']."', '".$_POST['type']."', '".$id."')";
  	$delBool = mysqli_query($db, $query);
	echo json_encode($query);
	echo json_encode($delBool);
  	header('location: home.php');

?>