
<!--index.php style done-->

<!doctype html>
<html>
<head>	
<meta charset="utf-8">
<title>Home</title>
	
	<!--font family for website-->
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Saira&display=swap" rel="stylesheet">
	
	<style>
		<?php include 'style.css'; ?>
	</style>
</head>
	
<body>
	
	<!--customizable snowflake styling-->
	<div class="snowflakes" aria-hidden="true">
  		<div class="snowflake">❅</div>
 		<div class="snowflake">❆</div>
  		<div class="snowflake">❅</div>
  		<div class="snowflake">❆</div>
  		<div class="snowflake">❅</div>
  		<div class="snowflake">❆</div>
  		<div class="snowflake">❅</div>
  		<div class="snowflake">❆</div>
  		<div class="snowflake">❅</div>
  		<div class="snowflake">❆</div>
  		<div class="snowflake">❅</div>
  		<div class="snowflake">❆</div>
	</div>

	<!--header image-->
	<img src="cat_track.jpeg" alt="Cat Track Skiing">
	
	<h1>Snowboard Database</h1>
	
	<div class="align">
		
		<button class="button1" type="submit">
			<a href="login.php">Login</a>
		</button>			

		<button class="button2" type="submit">
			<a href = "newuser.php">New User</a>
		</button>
			
	</div>	
	
	<!--foooter information-->
	<div class="footer">
		<footer>
			<a href = "index.php">Home</a>&nbsp;&nbsp;
			<a href = "input.php">Input</a>&nbsp;&nbsp;
			<a href = "displaydata.php">Display</a>&nbsp;&nbsp;
			<a href = "display_edit.php">Edit/Delete</a>&nbsp;&nbsp;
			<a href = "add_image.php">Add Image</a>&nbsp;&nbsp;
			<a href = "image_view.php">View Images</a>&nbsp;&nbsp;
			<a href = "logout.php">Logout</a>&nbsp;&nbsp;
	<br><br>
			
			<small>
				Copyright &copy; <script>document.write(new Date().getFullYear());</script> Amanda Faulconer 
			</small>
		</footer>
	</div>
	
</body>
</html>


