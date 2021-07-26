<!DOCTYPE html>
<html lang="en-AU">
<head>
<title>Registration Form</title>
<link rel="stylesheet" href="../AYVstyle.css">
<meta http-equiv="refresh" content="300">
<meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1.0,maximum-scale=1.0">
<!-- look up <base> you're going to need it, specifies base url for page-->
</head>
<body>
<h1 id = "TOP"; style="font-size: min(9vw,60px);">Internal Information Page </h1>
<br>
	<center>
		<h3>Register Here</h3>
		
		<form action="includes/signup.inc.php" method="post">
		<table>
		<tr>
			<td>Username:</td>
			<td>
				<input type="text" name="user" placeholder="Enter your full name">
			</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>
				<input type="email" name="email" placeholder="Enter your email">
			</td>
		</tr>
		<tr>
			<td>Password:</td>
			<td>
				<input type="password" name="password" placeholder="Enter your password">
			</td>
		</tr>
		<tr>
			<td>Confirm Password:</td>
			<td>
				<input type="password" name="password-repeat" placeholder="Re-enter your password">
			</td>
		</tr>
		<tr>
			<td>
				<button type="submit" name="submit">Register</button>
			</td>
			<td>
			Already registerd? <a href="loginForm.php" alt="loginForm.php">Login</a>.
			<td>
		</tr>
		</form>
		
		<?php
		if(isset($_GET["error"])){
			if($_GET["error"]=="emptyinput"){
				echo "<p>You left an input field empty!</p>";	
			}
			
			else if($_GET["error"]=="stmtfailedWhileCreatingUser"){
					echo"<p>Error: connection statement failed while creating user. If this error persists, please contact IT support.</p>";
			}
			
			else if($_GET["error"]=="stmtfailedAtUidExists"){
					echo"<p>Error: connection failed while checking username avaliability. If this error persists, please contact IT support.</p>";	
			}
			
			else if($_GET["error"]=="invaliduid"){
					echo"<p>Invalid Username. Sorry, but your username may only contain lower and uppercase letters, numbers, and spaces.</p>";	
			}
			
			else if($_GET["error"]=="invalidemail"){
					echo"<p>Invalid Email. Please enter a valid email address.</p>";	
			}
			
			else if($_GET["error"]=="passwordsdontmatch"){
					echo"<p>Password Mismatch! Make sure your passwords are the same.</p>";	
			}
			
			else if($_GET["error"]=="usernametaken"){
					echo"<p>Sorry, that username is taken, please choose another. :( </p>";	
			}
			
			else if($_GET["error"]=="emailnotapproved"){
					echo"<p>Sorry, but your email address has not been approved by IT. :( Please use your Activate Youth Voice email address to create your account, or contact IT support if you think you already did this.</p>";	
			}
			
			else if($_GET["error"]=="none"){
					echo"<p>Congradulations! Your account has been created! <br>You can now <a href=\"loginForm.php\" alt=\"loginForm.php\">Login</a></p>";	
			}
		}
		
		?>
		
		
	<center>
</body>

</html>