<!DOCTYPE html >
<html>
<head>
<title>Tree huggers habitats</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="style/style.css">
  <link rel="apple-touch-icon" sizes="57x57" href="ac.ico/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="ac.ico/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="ac.ico/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="ac.ico/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="ac.ico/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="ac.ico/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="ac.ico/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="ac.ico/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="ac.ico/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="ac.ico/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="ac.ico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="ac.ico/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="ac.ico/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body id="body_bg">
<div class="container">
<div class="row">
<div class="col-8">
	<img id="img" src="A2.png" alt="Logo" height="150"><br /><br />
	<p class="login-form" id="ppp">We are here to fulfill your childhood dream of living in a treehouse. 
	Our website is filled with Treehouse accomadation from all over the world.
	If you are living the dream and have your own tree house you can also add your tree huggers habitat to our collection for vacation seekers to enjoy.
	</p>
</div>
<div class="col-4">
<div id="forms" align="center">


    <form class="login-form" method="post" action="authen_login.php" >
    <h3>LOGIN</h3>
         <label for="user_id">User Name</label><br />
         <input type="text" name="user_id" id="user_id"><br />
	<label for="user_pass">Password</label><br />
         <input type="password" name="user_pass" id="user_pass"></input><br /><br />
	<input type="submit" value="Submit" />
         <input type="reset" value="Reset"/>
	<p id="error"></p>
    </form>


    <form class="login-form" method="post" action="register.php" >
    <h3>REGISTER</h3>
         <label for="user_reg">User Name</label><br />
         <input type="text" name="user_reg" id="user_reg"><br />
	<label for="reg_pass">Password</label><br />
         <input type="password" name="reg_pass" id="reg_pass"></input><br />
	<label for="reg_pass2">Confirm Password</label><br />
         <input type="password" name="reg_pass2" id="reg_pass2"></input><br />
	<label for="contact">Email</label><br />
         <input type="email" name="contact" id="contact"><br /> 
	<label for="bday">Birthday</label><br />
         <input type="date" name="bday" id="bday"><br /><br />
	<input type="submit" value="Submit" />
         <input type="reset" value="Reset"/>
	<p id="error">
	<?php
	session_start();
	if ($_SESSION['errr'] != 'undefined'){
	$error = $_SESSION['errr'];
	echo $error;
	}
	?>
	</p>
    </form>
</div>	
</div>	
</div>	
</div>
</body>
</html>