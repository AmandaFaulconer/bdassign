
<!--login.php-->

<?php

	require('dbconnect.php');
	error_reporting(0);

if(isset($_POST['username'])){
	
	//sql
	$sql_login = "SELECT username, password FROM tbl_user WHERE username LIKE :username";
	
	//prepare
	$sqll = $pdo->prepare($sql_login);
	
	//sanitize
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	
	//bind
	$sqll->bindparam(":username", $username);
	
	//execute
	$sqll->execute();
	
	$row = $sqll->fetch();
	
	$hash = $row['password'];
	
	//comparing what the user entered to the password in the database - return a true or false
	
	if(password_verify($_POST['password'], $hash)){
		$_SESSION['loginstatus'] = true;
		header("Location: input.php");
		exit();
	}
	else{
		$_SESSION['LoginErrorMessage']= "Incorrect username or password";
		header("Location: errormessage.php");
		exit();
	}

}
?>

<!doctype html>
<html>
<head>
	<!--font family for website-->
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Saira&display=swap" rel="stylesheet">
	<meta charset="utf-8">
<title>Home</title>
	
	<!--style for login.php-->
	<style>
		<?php include 'style.css'; ?>
		
		table{
			border-spacing: 10px;
		}
	</style>
	
</head>
<body>

	<!--header image-->
	<img src="cat_track.jpeg" alt="Cat Track Skiing">
	
	<h1>Login</h1>
	
	<div align="center">

		<form method="POST" action="login.php">
		
			<table>
				<tr>
					<td>User Name</td>
					<td>
						<input type="text" name="username" size="25" value="afaulconer" required>
					</td>
				</tr>
		
				<tr>
					<td>Password</td>
					<td>
						<input type="password" name="password" size="25" value="noodle" required>
					</td>
				</tr>
		
				<tr>
					<td></td>
					<td>
						<input type="submit" value="Enter">

					</td>
				</tr>			
			</table>
		
		</form>
		
	</div>
	
	<?php
		unset($_SESSION['LoginErrorMessage']);
	?>
	
<!--foooter information-->
	<div class="footer">
		<footer>
			<a href = "index.php">Home</a>&nbsp;&nbsp;
			<a href = "newuser.php">New User</a>&nbsp;&nbsp;
			<a href = "logout.php">Logout</a>&nbsp;&nbsp;
	<br><br>
			
			<small>
				Copyright &copy; <script>document.write(new Date().getFullYear());</script> Amanda Faulconer 
			</small>
		</footer>
	</div>
	
</body>
</html>






