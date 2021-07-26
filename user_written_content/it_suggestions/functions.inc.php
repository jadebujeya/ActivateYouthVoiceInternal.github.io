<?php

function emptySuggestion($text) {
	if($text==="") {
		return true;
	}
	else {
		return false;
	}
}

function postSuggestion($conn, $text, $user) {
	$sql = "INSERT INTO suggestions (suggestionsText, suggestionsUser, suggestionsTime) VALUES (?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../../index.php?error=stmtfailedPostingSuggestion"); 
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "sss", $text, $user, $time);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../../index.php?error=none"); 
	exit();
}