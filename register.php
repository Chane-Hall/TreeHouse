<?php
session_start();

$db = mysqli_connect('localhost', 'u17061238', 'qolxks', 'u17061238');

if (isset($_POST['user_reg']) and isset($_POST['reg_pass'])){
	
// Assigning POST values to variables.
$username = $_POST['user_reg'];
$password_1 = $_POST['reg_pass'];
$password_2 = $_POST['reg_pass2'];
$contact = $_POST['contact'];
$bday = $_POST['bday'];
$errors = array();

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($contact)) { array_push($errors, "Email is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
}

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
	$sqllll = "INSERT INTO users (username, password, contact, birthday) VALUES ('".$_POST["user_reg"]."','".$_POST["reg_pass"]."','".$_POST["contact"]."','".$_POST["bday"]."')";
	$varhelp2 = mysqli_query($db, $sqllll);
	$user_check_query2 = "SELECT * FROM users WHERE username='$username' LIMIT 1";
	$result2 = mysqli_query($db, $user_check_query2);
	$user2 = mysqli_fetch_assoc($result2);
  	$_SESSION['userid'] = $user2['id_user'];
  	$_SESSION['success'] = "You are now logged in";
	//echo json_encode($sqllll);
	//echo json_encode($varhelp);
	//echo json_encode($varhelp2);
  	header('location: home.php');
  }
  else{
 $_SESSION['errr'] = json_encode($errors); 
 header('location: index.php'); 
 
  }
}



?>