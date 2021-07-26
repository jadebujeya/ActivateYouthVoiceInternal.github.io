<?php

if(isset($_POST["submit"])){
	
	$text = $_POST["postSuggestions"];
	session_start();
	$user = $_SESSION["useruid"];
	$time = date("d-m-Y");
	
	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';
	
	if(emptySuggestion($text) !== false)
	{
		header("location: ../../index.php?error=emptysuggestion"); 
		exit();
	}
	
	postSuggestion($conn, $text, $user);
	
}
else{
	header("location: ../../login_and_rego/loginForm.php"); 
	exit();
}