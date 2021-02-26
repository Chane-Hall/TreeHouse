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

<div class="col-4"></div>
<div class="col-4">
<img id="img" src="A2.png" alt="Logo" height="200" onclick='takeHome()' class="homego">
    <form class="login-form" method="post" action="tree.php" >
    <h3>Add a tree hugging habitat</h3>
         <label for="name">Name</label><br />
         <input type="text" name="name" id="name"></input> <br />
	<label for="address">Address</label><br />
         <input type="text" name="address" id="address"></input> <br />
	<label for="description">Description</label><br />
         <input type="text" name="description" id="description"></input> <br />
	<label for="type">Type</label><br />
         <select name="type">
		<option value="Garden">Garden</option>
		<option value="Glamping">Glamping</option>
		<option value="Cloud heavan">Cloud heavan</option>
		<option value="Mountain view">Mountain view</option>
	</select><br />
	<label for="picture">Picture</label><br />
         <input type="file" name="picture" id="picture"></input> <br /><br />
	<input type="submit" value="Submit" />
         <input type="reset" value="Reset"/><br /><br />
		<a href="home.php">Go Back Home</a>
    </form>
</div>

</div>
</div>
</body>
</html>