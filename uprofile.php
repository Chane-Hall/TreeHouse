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
function navbar(idof){
	document.getElementById("loca").classList.remove("acti");
	document.getElementById("locadiv").classList.add("notdis");
	document.getElementById("rev").classList.remove("acti");
	document.getElementById("mess").classList.remove("acti");
	document.getElementById("messdiv").classList.add("notdis");
	document.getElementById("revdiv").classList.add("notdis");
	document.getElementById(idof).classList.add("acti");
	var xx = document.getElementById('yayy');
	switch(idof){
		case "loca":
			document.getElementById("locadiv").classList.remove("notdis");
			break;
		case "rev":
			document.getElementById("revdiv").classList.remove("notdis");
			break;
		case "mess":
			document.getElementById("messdiv").classList.remove("notdis");
			break;
	}
}
function takeHome(){
	window.location.href = "home.php";
}
</script>

</head>
<body>
<?php
session_start();
$cur = $_SESSION['userid'];
$id = $_POST['owner'];
$stranger = 'Strangers';
$conTF = 'Connect';

$db = mysqli_connect('localhost', 'u17061238', 'qolxks', 'u17061238');

 $user_check_query = "SELECT * FROM users WHERE id_user='$id' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
$nameU = $user['username'];
$cont = $user['contact'];
$bDay = $user['birthday'];
$profp = $user['profpic'];

$user_check_query2 = "SELECT * FROM trees WHERE owner='$id'";
  $result2 = mysqli_query($db, $user_check_query2);
  
$user_check_query5 = "SELECT * FROM reviews WHERE owner='$id'";
  $result5 = mysqli_query($db, $user_check_query5);
  
  $user_check_query6 = "SELECT * FROM relation WHERE (user1='$id' AND user2='$cur') OR (user2='$id' AND user1='$cur')";
  $result6 = mysqli_query($db, $user_check_query6);
 $count = mysqli_num_rows($result6);
 if($count > 0){
	$stranger = 'Neighbour';
	$conTF = 'Disconnect';
 }


function ConDIs(){
	if ($conTF == 'Disconnect'){
		$sqlDel = "DELETE * FROM relation WHERE (user1='$id' AND user2='$cur') AND (user2='$id' AND user1='$cur')";
		mysqli_query($db, $sqlDel);
		$stranger = 'Strangers';
		$conTF = 'Connect';
		echo 'Deleted';
	}
}
?>
<div class="container" class="prof">
	<div class="row urow">
		<div class="col-4">
		<?php
			
			$user_check_query = "SELECT * FROM users WHERE id_user='$id' LIMIT 1";
			$sth = mysqli_query($db, $user_check_query);
			$result=mysqli_fetch_array($sth);
			echo '<img alt="profile image" height="120" src="data:image/jpeg;base64,'.base64_encode( $result['profpic'] ).'"/>';
		?>
		</div>
		<div class="col-3">
			<?php
			echo '<h4 id="uname">' . $nameU .  '</h4>';
			echo '<h6 id="ubday">Birthday : '. $bDay .'</h6>';
			echo '<h6 id="ucont">Connection : '. $stranger .'</h6>';
			echo '<form method="post" action="connection.php" >';
			echo "<input type='hidden' name='user' value=". $id .">";
			echo "<input type='hidden' name='conn' value=". $conTF .">";
			echo '<input type="submit" value="'. $conTF .'"/></form>';
		?>
		</div>
		<div class="col-1"></div>
		<div class="col-4">
			<img src="A2.png" alt="Logo" height="120" onclick='takeHome()' class="homego">
		</div>
	</div>
	<div class="row urow">
		<div class="col-2 hovv" id="loca"><h5 onclick="navbar('loca')">Locations</h5></div>
		<div class="col-2 hovv" id="rev"><h5 onclick="navbar('rev')">Reviews</h5></div>
		<div class="col-2 hovv" id="mess"><h5 onclick="navbar('mess')">Message</h5></div>
	</div>
	<div class="row urow">
		<?php
		echo '<div class="col-12">';
		echo '<div id="locadiv" class="notdis" class="row">';
		while($row = mysqli_fetch_assoc($result2)){
		echo '<div class="row">';
			echo '<div class="col-2 urow">'. $row['id'] .'</div>';
			echo '<div class="col-4 urow">'. $row['name'] .'</div>';
			echo '<div class="col-4 urow">'. $row['address'] .'</div>';
			echo '<div class="col-2 urow">'. $row['type'] .'</div>';
			echo '</div>';
		}
		echo '</div>';
		echo '<div id="revdiv" class="notdis" class="row">';
		while($row = mysqli_fetch_assoc($result5)){
		echo '<div class="row">';
			$plek = $row['owner'];
			$user_check_query = "SELECT * FROM users WHERE id_user='$plek' LIMIT 1";
			$res = mysqli_query($db, $user_check_query);
			$userv = mysqli_fetch_assoc($res);
			$nameV = $userv['username'];
			$plek2 = $row['location'];
			$user_check_query = "SELECT * FROM trees WHERE id='$plek2' LIMIT 1";
			$res2 = mysqli_query($db, $user_check_query);
			$userv2 = mysqli_fetch_assoc($res2);
			$nameV2 = $userv2['name'];
			echo '<div class="col-4 urow">'. $nameV .' reviewing <br/> '. $nameV2 .'</div>';
			echo '<div class="col-8 urow">'. $row['text'] .'</div>';
			echo '</div>';
		}
		echo '</div>';
		echo '<div id="messdiv" class="notdis" class="row">';
		echo '<form method="post" action="message.php" >
		<input type="text" name="msg"/>
		<input type="hidden" name="from" value='. $id .'>
		<input type="submit" name="send" value="Send"/>
		</form>';
		
		echo '</div>';
		echo '</div>';
	?>
	</div>
</div>
</body>
</html>