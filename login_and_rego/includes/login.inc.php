<?php

if(isset($_POST["submit"])){
	
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	
	require_once 'dataBaseHandler.inc.php';
	require_once 'functions.inc.php';
	
	if(emptyInputLogin($username, $pwd) !== false)
	{
		header("location: ../loginForm.php?error=emptyinput"); 
		exit();
	}
	
	loginUser($conn, $username, $pwd);
	
}
else{
	header("location: myWebsite.com/login_and_rego/loginForm.php?incorrectarrival"); 
	exit();
}