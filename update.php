<?php
session_start();
$id = $_SESSION['userid'];
$db = mysqli_connect('localhost', 'u17061238', 'qolxks', 'u17061238');

if($_POST["name"]!=""){
 $sql = "UPDATE users ". "SET username = '". $_POST["name"] ."' ". 
               "WHERE id_user = $id" ;
	       $delBool = mysqli_query($db, $sql);
	        echo json_encode($sql);
  echo json_encode($delBool);
}
if($_POST["bday"]!=''){
 $sql = "UPDATE users ". "SET birthday = '". $_POST["bday"] ."' ". 
               "WHERE id_user = $id" ;
	       $delBool = mysqli_query($db, $sql);
	        echo json_encode($sql);
  echo json_encode($delBool);
}
if($_POST["contact"]!=""){
 $sql = "UPDATE users ". "SET contact = '". $_POST["contact"] ."' ". 
               "WHERE id_user = $id" ;
	       $delBool = mysqli_query($db, $sql);
	        echo json_encode($sql);
  echo json_encode($delBool);
}
if($_POST["image"]!=""){
        $image = $_FILES['image']['$_POST["image"]'];
        $imgContent = file_get_contents($image);
 $sql = "UPDATE users ". "SET profpic = '". $imgContent ."' ". 
               "WHERE id_user = $id" ;
	       $delBool = mysqli_query($db, $sql);
	        echo json_encode($sql);
  echo json_encode($delBool);
}
 header('location: home.php');
?>