<?php
	require('dbconnect.php');	
?>



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
		
		<?php include ('style.css'); ?>
		
		.display_data{
			text-align: left;
			display: block;
  			margin-left: auto;
  			margin-right: auto;
  			width: 60%;
			color: darkblue;
		}
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
	
	<h1>Display Data</h1>
	<?php

//display the data
	//run a query to show the last entered
	$sql_select = "SELECT * ".
					"FROM tbl_snow ";
					"WHERE snow_pk = (SELECT MAX(snow_pk) FROM tbl_snow)";
	$dataset = $pdo->query($sql_select);
	
	echo('<div class="display_data" align="center">');
	//loop through the dataset
		foreach($dataset as $row){
			echo($row['brand']. " - ".$row['type']. " - ".$row['length']. " - ".$row['shape']. "<br>");
		}
	echo('</div>');
	

?>
	
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




