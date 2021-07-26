<?php

if (isset($_POST["submit"])){
	
	$username = $_POST["user"];
	$email = $_POST["email"];
	$pwd = $_POST["password"];
	$pwdRepeat = $_POST["password-repeat"];
	
	require_once 'dataBaseHandler.inc.php';
	require_once 'functions.inc.php';
	
	if(emptyInputSignup($username, $email, $pwd, $pwdRepeat) !== false)
	{
		header("location: ../registrationForm.php?error=emptyinput"); 
		exit();
	}
	
	if(invalidUid($username) !== false)
	{
		header("location: ../registrationForm.php?error=invaliduid"); 
		exit();
	}
	
	if(invalidEmail($email) !== false)
	{
		header("location: ../registrationForm.php?error=invalidemail"); 
		exit();
	}
	
	if(pwdMatch($pwd, $pwdRepeat) !== false)
	{
		header("location: ../registrationForm.php?error=passwordsdontmatch"); 
		exit();
	}
	
	if(uidExists($conn, $username, $email) !== false)
	{
		header("location: ../registrationForm.php?error=usernametaken"); 
		exit();
	}
	
	
	if(emailNotApproved($email)!==false){
		header("location: ../registrationForm.php?error=emailnotapproved"); 
		exit();
	} 
	
	
	createUser($conn, $username, $email, $pwd); 
}
else {
	header("location: ../loginForm.php"); 
	exit();
}