<!DOCTYPE html>
<html lang="en-AU">
<head>
<title>Login Form</title>
<link rel="stylesheet" href="../AYVstyle.css">
<meta http-equiv="refresh" content="300">
<meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1.0,maximum-scale=1.0">
<!-- look up <base> you're going to need it, specifies base url for page-->
</head>
<body>
<h1 id = "TOP"; style="font-size: min(9vw,60px);">Internal Information Page </h1>
<br>
	<center>
		<h3>Login</h3>
		
		<form action="includes/login.inc.php" method="post">
		<table>
		<tr>
			<td>
				<input type="text" name="uid" placeholder="Username/Email">
			</td>
		</tr>

		<tr>
			<td>
				<input type="Password" name="pwd" placeholder="Password">
			</td>
		</tr>
		
		<tr>
			<td>
				<button type="submit" name="submit">Login</button>
			</td>
		</tr>
			<td>
			Or register <a href="registrationForm.php" alt="registrationForm.php">here</a>.
			<td>
		</tr>
		</form>
		
		<?php
		if(isset($_GET["error"])){
			if($_GET["error"]=="emptyinput"){
				echo "<p>You left an input field empty!</p>";	
			}
			
			else if($_GET["error"]=="wrongusernameoremail"){
					echo"<p>Sorry, that Username/Email does not have an account.</p>";
			}
			
			else if($_GET["error"]=="wrongpassword"){
					echo"<p>Password inncorect.</p>";	
			}
		}
		
		?>
	<center>
</body>

</html>