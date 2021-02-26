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

function takeHome(){
	window.location.href = "home.php";
}
</script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-12">
	<div class="row"><img src="A2.png" alt="Logo" height="150" onclick='takeHome()' class="homego"></div>
	<div class="row">
  <?php
  $loca = $_POST['loca'];
  
$connection = mysqli_connect('localhost', 'u17061238', 'qolxks','u17061238');

$sql = "SELECT * FROM trees WHERE id=$loca";
$result = mysqli_query($connection,$sql);


if ($result->num_rows > 0) {
   while($row = mysqli_fetch_assoc($result)){
   $plekhouer =$row["owner"];
$user_check_query = "SELECT * FROM users WHERE id_user='$plekhouer' LIMIT 1";
  $result2 = mysqli_query($connection, $user_check_query);
  $user = mysqli_fetch_assoc($result2);
$nameU = $user['username'];
  echo  "<div class='row hrow'>
<div class='col-md-12'>
	<div class='row '><h2>" . $row["name"]. "</h2></div>
	<div class='row '><img height='120' src='data:image/jpeg;base64,".base64_encode( $row['photo'] )."'/></div>
	<div class='row '>at ". $row["address"].  "</div>
	<div class='row '>" . $row["type"]. "</div>
	<div class='row '>"  . $row["description"] . "</div><br/>
	<div class='row '><div class='col-md-4'>
	<form method='post' action='uprofile.php' >
	<input type='hidden' id='owner' name='owner' value=". $row["owner"] .">
	<input type='submit' value='by "  . $nameU . "'/>
	</form></div><div class='col-md-4'>
	<form method='post' action='booking.php' >
	<input type='hidden' id='locaId' name='locaId' value=". $row["id"] .">
	<input type='submit' value='Make a booking'/>
	</form></div>
	<div class='col-md-4'>
	<form method='post' action='review.php' >
	<input type='hidden' id='locaId' name='locaId' value=". $row["id"] .">
	<input type='hidden' id='owner' name='owner' value=". $row["owner"] .">
	<input type='text' name='review'/>
	<input type='submit' name='Submit'/><br/>
	</form></div>
	</div>";
	echo '<h2>Reviews</h2>';
		$user_check_query5 = "SELECT * FROM reviews WHERE location='$loca'";
		$result5 = mysqli_query($connection, $user_check_query5);
		while($row = mysqli_fetch_assoc($result5)){
		echo '<div class="row">';
			$plek = $row['owner'];
			$user_check_query = "SELECT * FROM users WHERE id_user='$plek' LIMIT 1";
			$res = mysqli_query($connection, $user_check_query);
			$userv = mysqli_fetch_assoc($res);
			$nameV = $userv['username'];
			$plek2 = $row['location'];
			$user_check_query = "SELECT * FROM trees WHERE id='$plek2' LIMIT 1";
			$res2 = mysqli_query($connection, $user_check_query);
			$userv2 = mysqli_fetch_assoc($res2);
			$nameV2 = $userv2['name'];
			echo '<div class="col-4 urow">'. $nameV .' reviewing <br/> '. $nameV2 .'</div>';
			echo '<div class="col-8 urow">'. $row['text'] .'</div>';
			echo '</div>';
		}
echo  "</div>
";

	//echo  "<br> Name: ". $row["name"]. " - Address: ". $row["address"]. " - Description " . $row["description"] .  " Type ". $row["type"]. "<br>";
   }
   //echo "</div>";
} else {
    echo "0 results";
}
//Reviews?????????????????????
?> 

</div>

</div>
</div>
</div>
</body>
</html>