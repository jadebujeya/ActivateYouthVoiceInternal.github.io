<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en-AU">
<head>
<title>Activate Youth Voice Internal</title>
<link rel="stylesheet" href="AYVstyle.css">
<meta http-equiv="refresh" content="300">
<meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1.0,maximum-scale=1.0">
<!-- look up <base> you're going to need it, specifies base url for page-->
</head>
<body>
<!--<img src="AYVLogo.jpg" alt="AYV Logo">
<br>-->

<h1 id = "TOP"; style="font-size: min(9vw,60px);">Internal Information Page </h1>

<?php
if(!isset($_SESSION["useruid"])){
	header("location: login_and_rego/loginForm.php?error=notloggedin"); 
	exit();
}
?>

<div class="menu">
	<ul>
	  <li><a href="index.php">Home</a></li>
	  <li><a href="projects.php">Current Projects</a></li>
	  <li><a href="internalWork.php">House Keeping</a></li>
	  <li><a href="contactInfo.php">Contact Info</a></li>
	  <li><a href="ourFuture.php">Our Future</a></li>
	  <li><a href="educationAndTraining.php">Education and Training</a></li>
	  <li><a href="login_and_rego/includes/logout.inc.php">Logout</a></li>
	</ul>
</div>
