
<?php
	require 'dbconnect.php';	
	//sql statement
	$sql = "SELECT  * FROM  tbl_maps";
	//recordset
	$rs = $pdo->query($sql);
?>

<html>
<head>	
<meta charset="utf-8">
<title>View Images</title>
	
	<!--font family for website-->
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Saira&display=swap" rel="stylesheet">
	
	<style>
		<?php include 'style.css'; ?>
		.mapimg{
			width: 300px;
			text-align: left;
			display: block;
  			margin-left: auto;
  			margin-right: auto;
		}
		body{
			text-align: center;
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
	
	<h1>Ski Resort Maps</h1>

<?php
	while(($row = $rs->fetch()) != null)
	{
		echo('<br>Resort Name: '.$row['resortname'].'<br>');
		echo('State Location: '.$row['resortstate'].'<br><br>');

		try{
			//retrieve them
			//build the data url  example 'data:image/jpeg;base64,mypix.jpg'

			echo('
				<div class="mapimg">
					<img src="data:'.$row['image_type'].
				 ';base64,'.$row['mapimage'].'">
				 </div>
				');
		}
		catch(Exception $e){
			echo('Error: '.$e->getMessage()).'<br><br>';
		}
	}

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
