
<!--newuser.php-->

<?php
	require('dbconnect.php');


	if(isset($_POST['username'])){
		//get password from post
		$pwd = $_POST['password'];
	
		//sql_adduser
		$sql_adduser = "INSERT INTO tbl_user"
				."(firstname, lastname, username, password) "
				."VALUES(:firstname,:lastname,:username,:password)";

		//prepare
		$sql_adduser=$pdo->prepare($sql_adduser);

		//sanitize data
		$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);


		//PASSWORD - do not deviate from this pattern!
		$password = password_hash($pwd, PASSWORD_DEFAULT);

		//BIND
		$sql_adduser->bindparam(":firstname",$firstname);
		$sql_adduser->bindparam(":lastname",$lastname);
		$sql_adduser->bindparam(":username",$username);
		$sql_adduser->bindparam(":password",$password);

		try{
			//EXECUTE
			$sql_adduser->execute();
		}
		catch(PDOException $e){
			if($e->getCode()==23000){
				$_SESSION['ErrorMessage']= "That username is already in use";
			}
			else{
				$_SESSION['ErrorMessage']= "There was an error";
			}
			header("Location: errormessage.php");
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
	
	<h1>New User Registration</h1>
	
	<div align="center">
		
		<form method="POST" action="newuser.php">
			
			<table>	
				<tr>
					<td>First Name</td>
					<td>
						<input type="text" name="firstname" size="25" value="Amanda">
					</td>
				</tr>
		
				<tr>
					<td>Last Name</td>
					<td>
						<input type="text" name="lastname" size="25" value="Faulconer">
					</td>
				</tr>
		
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
	
<!--foooter information-->
	<div class="footer">
		<footer>
			<a href = "index.php">Home</a>&nbsp;&nbsp;
			<a href = "login.php">Login</a>&nbsp;&nbsp;
			<a href = "logout.php">Logout</a>&nbsp;&nbsp;
	<br><br>
			
			<small>
				Copyright &copy; <script>document.write(new Date().getFullYear());</script> Amanda Faulconer 
			</small>
		</footer>
	</div>
	
</body>
</html>

