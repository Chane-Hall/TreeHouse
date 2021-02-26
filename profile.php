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
<?php
session_start();
$id = $_SESSION['userid'];

function add(){
echo "You're in";
}

?>
<script>
function navbar(idof){
	document.getElementById("loca").classList.remove("acti");
	document.getElementById("notif").classList.add("notdis");
	document.getElementById("locadiv").classList.add("notdis");
	document.getElementById("req").classList.remove("acti");
	document.getElementById("book").classList.remove("acti");
	document.getElementById("bookdiv").classList.add("notdis");
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
		case "req":
			xx.innerHTML += "reqqq";
			break;
		case "book":
			document.getElementById("bookdiv").classList.remove("notdis");
			break;
		case "rev":
			document.getElementById("revdiv").classList.remove("notdis");
			break;
		case "mess":
			document.getElementById("messdiv").classList.remove("notdis");
			$.ajax({
				url:'notify.php',
				complete: function (response) {
				console.log('succes');
				},
				error: function () {
				console.log('error');
				}
			});
			break;
	}
}
function editPro(){
	var x = document.getElementById("unamei");
	var xy = document.getElementById("ubdayi");
	var xyy = document.getElementById("uconti");
	var xyyy = document.getElementById("profimgi");
	var xyyyy = document.getElementById("buted");
	var x1 = document.getElementById("save");
	var x2 = document.getElementById("buted");
	if (x.style.display === "none") {
		x.style.display = "block";
		xy.style.display = "block";
		xyy.style.display = "block";
		xyyy.style.display = "block";
		x1.style.display = "block";
		x2.style.display = "none";
	} else {
		x.style.display = "none";
		xy.style.display = "none";
		xyy.style.display = "none";
		xyyy.style.display = "none";
		x1.style.display = "none";
		x2.style.display = "block";
	}
	
}
function takeHome(){
	window.location.href = "home.php";
}
</script>

</head>
<body>
<?php



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
 // $locations = mysqli_fetch_assoc($result2);


$user_check_query3 = "SELECT * FROM bookings WHERE owner='$id'";
  $result3 = mysqli_query($db, $user_check_query3);

$user_check_query4 = "SELECT * FROM messages WHERE userTo='$id'";
  $result4 = mysqli_query($db, $user_check_query4);
  
$user_check_query5 = "SELECT * FROM reviews WHERE owner='$id'";
  $result5 = mysqli_query($db, $user_check_query5);


?>
<div class="container" class="prof">
	<div class="row urow">
		<div class="col-4">
			<?php
			
			 $user_check_query = "SELECT * FROM users WHERE id_user='$id' LIMIT 1";
			$sth = mysqli_query($db, $user_check_query);
			 $prof=mysqli_fetch_array($sth);
			echo '<img alt="profile image" height="120" src="data:image/jpeg;base64,'.base64_encode( $prof['profpic'] ).'"/>';
		?>
		</div>
		<div class="col-3">
		<?php
			echo '<form method="post" action="update.php" >';
			echo '<h4 id="uname">' . $nameU .  '</h4>';
			echo '<input type="text" id="unamei" name="name" class="notdis"/>';
			echo '<h6 id="ubday">Birthday : '. $bDay .'</h6>';
			echo '<input type="date" id="ubdayi" name="bday" class="notdis"/>';
			echo '<h6 id="ucont">Contact info :'. $cont .'</h6>';
			echo '<input type="text" id="uconti" name="contact" class="notdis"/>';
			echo '<input type="file" id="profimgi" name="image" class="notdis"/>';
			
		?>
		</div>
		<div class="col-2">
			<?php
			echo '<input type="submit" id="save" class="notdis" value="Save"/>';
			echo '</form>';
			?>
			<button id="buted" onclick="editPro()" class="aa">Edit</button>
			<form method="post" action="delete.php" >
			<input type="submit" id="delete" name="delButt" value="Delete my profile"/>
			</form>
		</div>
		<div class="col-3">
			<img src="A2.png" alt="Logo" height="120" onclick='takeHome()' class="homego">
		</div>
	</div>
	<div class="row urow">
		<div class="col-2 hovv" id="loca"><h5 onclick="navbar('loca')">Locations</h5></div>
		<div class="col-2 hovv" id="req"><h5 onclick="navbar('req')">Requests</h5></div>
		<div class="col-2 hovv" id="book"><h5 onclick="navbar('book')">Bookings</h5></div>
		<div class="col-2 hovv" id="rev"><h5 onclick="navbar('rev')">Reviews</h5></div>
		<div class="col-2 hovv" id="mess"><h5 onclick="navbar('mess')">Messages</h5></div>
	</div>
	<div class="row urow" id="yayy">
	<?php
		echo '<div class="col-12">';
		echo '<div id="locadiv" class="notdis" class="row">
			<div class="row"><a href="location.php">Create New Location</a></div>';
		while($row = mysqli_fetch_assoc($result2)){
		echo '<div class="row">';
			echo '<div class="col-2 urow">'. $row['id'] .'</div>';
			echo '<div class="col-4 urow">'. $row['name'] .'</div>';
			echo '<div class="col-4 urow">'. $row['address'] .'</div>';
			echo '<div class="col-2 urow">'. $row['type'] .'</div>';
			echo '</div>';
		}
		echo '</div>';
		//echo '<div id="locadiv">'. $locations .'</div>';
		echo '<div id="bookdiv" class="notdis" class="row">';
		while($row = mysqli_fetch_assoc($result3)){
		echo '<div class="row">';
			$plek = $row['visitor'];
			$user_check_query = "SELECT * FROM users WHERE id_user='$plek' LIMIT 1";
			$res = mysqli_query($db, $user_check_query);
			$userv = mysqli_fetch_assoc($res);
			$nameV = $userv['username'];
			$plek2 = $row['location'];
			$user_check_query = "SELECT * FROM trees WHERE id='$plek2' LIMIT 1";
			$res2 = mysqli_query($db, $user_check_query);
			$userv2 = mysqli_fetch_assoc($res2);
			$nameV2 = $userv2['name'];
			echo '<div class="col-2 urow">'. $row['id_book'] .'</div>';
			echo '<div class="col-4 urow">'. $nameV2 .'</div>';
			echo '<div class="col-2 urow">'. $row['dateIn'] .'</div>';
			echo '<div class="col-2 urow">'. $row['dateOut'] .'</div>';
			echo '<div class="col-2 urow">'. $nameV .'</div>';
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
		$notify = '1';
		while($row = mysqli_fetch_assoc($result4)){
		if($row['seen'] == '0'){
			$notify='0';
		}
			echo '<div class="row">';
			$plek =$row['userFrom'];
			$user_check_query = "SELECT * FROM users WHERE id_user='$plek' LIMIT 1";
			$res = mysqli_query($db, $user_check_query);
			$userv = mysqli_fetch_assoc($res);
			$nameV = $userv['username'];
			echo '<div class="col-2 urow">'. $nameV .'</div>';
			echo '<div class="col-4 urow">'. $row['text'] .'</div>';
			echo '</div>';
		}
		echo '</div>';
		echo "<p id='notif'>";
		if($notify=='0'){
			echo "You have unread messages! Go to the Messages tab to read them.";
		}
		echo '</p></div>';
		
	?>
	</div>
</div>
</body>
</html>