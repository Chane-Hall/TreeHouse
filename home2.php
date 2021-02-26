<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/style.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
<script>
</script>
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-3"><img id="img" src="A2.png" alt="Logo" height="180"></div>
	<div class="col-6"></div>
	<div class="col-3">
		<div class="row">
			<div class="col-5 lrow"><a href="home.php">Global<a></div>
			<div class="col-5 lrow"><a href="home2.php">Local<a></div>
		</div><br/>
		<div class="row">
			<a href="profile.php" class="aa">View Profile
			</a>
		</div><br/>
		<div class="row">
			<input type="text"/>
			<input type="submit" value="Search"/>
		</div>
	</div>
</div><br/>

<div class="row">
<div class="col-4 urow">
	<div class="row">
		<div class="col-5">Locations</div>    
		<div class="col-7"><a href="location.php" class="aa">Create New Location</a></div>
</div>
</div>
<div class="col-4 urow">Bookings
</div>
<div class="col-4 urow">Reviews
</div>
</div>

<div class="row">

<div class="col-4" id="cloud">
<!--img  src="styling/clouds.jpg" alt="clouds"-->
  <?php
  session_start();
$id = $_SESSION['userid'];
require('db_connect.php');

$db = $connection;
$sql = "SELECT * FROM trees ORDER BY id desc";
$result = mysqli_query($connection,$sql);
$neighbours = "SELECT * FROM relation";
$friends = mysqli_query($db,$neighbours);
$frnds = mysqli_fetch_assoc($friends);
   while($row = mysqli_fetch_assoc($result)){
   $plekhouer =$row["owner"];
   
$user_check_query = "SELECT * FROM users WHERE id_user='$plekhouer' LIMIT 1";
  $result2 = mysqli_query($connection, $user_check_query);
  $user = mysqli_fetch_assoc($result2);
$nameU = $user['username'];

if($row['owner'] == $frnds['user2'] || $row['owner'] == $frnds['user1']){
  echo  "<div class='row hrow'>
<div class='col-md-12'>
	<div class='row'>
	<form method='post' action='view.php' >
	<input type='hidden' id='loca' name='loca' value=". $row["id"] .">
	<input type='submit' value=' "  . $row["name"]. "'/>
	</form></div>
	<div class='row'><img height='120' src='data:image/jpeg;base64,".base64_encode( $row['photo'] )."'/></div>
	<div class='row'>" . $row["type"]. "</div>
	<div class='row'>"  . $row["description"] . "</div>
	<div class='row'>
	<form method='post' action='uprofile.php' >
	<input type='hidden' id='owner' name='owner' value=". $row["owner"] .">
	<input type='submit' value='by "  . $nameU . "'/>
	</form>
	</div>
</div>
</div>";

	}//echo  "<br> Name: ". $row["name"]. " - Address: ". $row["address"]. " - Description " . $row["description"] .  " Type ". $row["type"]. "<br>";
   }
?> 
</div>
<div class="col-4">
  <?php
require('db_connect.php');
$sql = "SELECT * FROM bookings ORDER BY id_book desc";
$result = mysqli_query($connection,$sql);


if ($result->num_rows > 0) {
   while($row = mysqli_fetch_assoc($result)){
 $plekhouer2 =$row["location"];
$user_check_query3 = "SELECT * FROM trees WHERE id='$plekhouer2' LIMIT 1";
  $result3 = mysqli_query($connection, $user_check_query3);
  $user3 = mysqli_fetch_assoc($result3);
$nameU3 = $user3['name'];
if($row['owner'] == $id){
  echo "<div class='row hrow'>
<div class='col-md-12'><div class='row'>"  . $nameU3 . " is booked out from "  . $row['dateIn'] . " to "  . $row['dateOut'] . "</div>
</div>
</div>";
  }}
} else {
    echo "0 results";
}
?> 
</div>
<div class="col-4">
<?php
$connection2 = mysqli_connect('localhost', 'u17061238', 'qolxks', 'u17061238');

$sql2 = "SELECT * FROM reviews ORDER BY id desc";
$result22 = mysqli_query($connection2,$sql2);


if ($result22->num_rows > 0) {
   while($row2 = mysqli_fetch_assoc($result22)){
     $plekhouer =$row2["location"];
$user_check_query = "SELECT * FROM trees WHERE id='$plekhouer' LIMIT 1";
  $result2 = mysqli_query($connection, $user_check_query);
  $user = mysqli_fetch_assoc($result2);
$nameU = $user['name'];

$plekhouer2 =$row2["reviewer"];
$user_check_query = "SELECT * FROM users WHERE id_user='$plekhouer2' LIMIT 1";
  $result2 = mysqli_query($connection, $user_check_query);
  $user = mysqli_fetch_assoc($result2);
$nameR = $user['username'];
   
  if($row2['owner'] == $id){
  echo  "<div class='row hrow'>
<div class='col-md-12'>"  . $row2["text"] . "</div>
<div class='col-md-12'>review by "  . $nameR . " of "  . $nameU . "</div>

</div>
";}

	//echo  "<br> Name: ". $row["name"]. " - Address: ". $row["address"]. " - Description " . $row["description"] .  " Type ". $row["type"]. "<br>";
   }
   //echo "</div>";
} else {
    echo "0 results";
}
mysqli_close($connection2);
?> 
</div>


</div>
</div>
</body>
</html>