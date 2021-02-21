
<!--errormessage.php style done-->

<?php
	require('dbconnect.php');
?>

<!doctype html>
<html>
<head>
	
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Saira&display=swap" rel="stylesheet">
	
  	<script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>
	
<meta charset="utf-8">
	
	<style>
		<?php include 'style.css'; ?>
	</style>
	
<title>Error Message</title>

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
	
	
	<!--404 error message for wrong password-->
	<div class="box1">
		
		<!--first 4-->
    	<div class="err">4</div>
		
			<!--spining O? -->
    		<i class="far fa-question-circle fa-spin"></i>
		
		<!--second 4-->
    	<div class="err2">4</div>
		
    	<div class="message">
			
			Maybe your username was incorrect? Maybe your password was incorrect? Maybe your account never existed in the first place? Maybe you already have an account?
			
			<p>
				Let's go 
					<a href="index.php">home</a> 
				and try agin from there.
			</p>
			
		</div>		
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