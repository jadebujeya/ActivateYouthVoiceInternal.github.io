<?php


function emailNotApproved($email) {
	if($email !=="jade.d.bujeya@gmail.com" 
	&& $email !=="billiejas@gmail.com"
	&& $email !=="ajbrown@mycollarts.edu.au"
	&& $email !=="mckenziejemille@gmail.com"
	&& $email !=="dimpea@icloud.com"
	&& $email !=="jacquie.anderson29@gmail.com"){
		return true;
	}
	else{
		return false;
	}
}


function createUser($conn, $email, $username, $pwd) {
	$sql = "INSERT INTO users (usersEmail, usersUid, usersPwd) VALUES (?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../registrationForm.php?error=stmtfailedWhileCreatingUser"); 
		exit();
	}
	
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../registrationForm.php?error=none"); 
	exit();
}

function uidExists($conn, $username, $email) {
	$sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../registrationForm.php?error=stmtfailedAtUidExists"); 
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}
	else{
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function pwdMatch($pwd, $pwdRepeat) {
	$result;
	if($pwd !== $pwdRepeat){
		$result=true;	
	}
	else{
		$result=false;
	}
	return $result;
}

function invalidEmail($email) {
	$result;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$result=true;	
	}
	else{
		$result=false;
	}
	return $result;
}

function invalidUid($username) {
	$result;
	if(!preg_match("/^[a-zA-Z0-9 ]*$/",$username)){
		$result=true;	
	}
	else{
		$result=false;
	}
	return $result;	
}

function emptyInputSignup($username, $email, $pwd, $pwdRepeat) {
	$result;
	if(empty($username)|| empty($email)||empty($pwd)||empty($pwdRepeat)){
		$result=true;	
	}
	else{
		$result=false;
	}
	return $result;
}

function emptyInputLogin($username, $pwd) {
	$result;
	if(empty($username)||empty($pwd)){
		$result=true;	
	}
	else{
		$result=false;
	}
	return $result;
}

function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username, $username);
	
	if($uidExists === false)
	{
		header("location: ../loginForm.php?error=wrongusernameoremail"); 
		exit();	
	}
	
	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);
	if($checkPwd === false){
		header("location: ../loginForm.php?error=wrongpassword"); 
		exit();
	}
	else if($checkPwd === true){
		session_start();
		$_SESSION["userid"]=$uidExists["usersId"];
		$_SESSION["useruid"]=$uidExists["usersUid"];
		header("location: ../../index.php"); 
		exit();
	}
}