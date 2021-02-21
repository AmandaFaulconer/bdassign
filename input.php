  <!--input.php-->

<?php
	require('dbconnect.php');


//shape information for drop down
$sql_shape = "SELECT shape FROM tbl_shape ORDER BY shape";
$ds_shape = $pdo->query($sql_shape);

if(!isset($_POST['brand'])){	

echo('

<!doctype html>
<html>

<head>	
<meta charset="utf-8">
<title>Home</title>
	
	<!--font family for website-->
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Saira&display=swap" rel="stylesheet">
	
	<style>');
?>


		<?php include 'style.css'; 
echo('
		table{
			border-spacing: 10px;
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
	
	<h1>Snowboard Information</h1>
	
	<div align="center">
		<form action="input.php" method="post">
		
			<table>	

				<tr>
					<td>Brand</td>
					<td><input type="text" name="brand" value="Input board brand" size="25" required></td>
				</tr>

				<tr>
					<td>Type</td>
					<td><input type="text" name="type" value="Input board type" size="25"></td>
				</tr>

				<tr>
					<td>Length (cm)</td>
					<td><input type="text" name="length" value="Input board length" size="25"></td>
				</tr>

				<tr>
					<td>Shape</td>
					<td>
						<select name="shape" width="8" size="1">');
	
						while($rowshape = $ds_shape->fetch()){

							if($rowshape['shape']===$row['shape']){
								echo('<option value="'.$rowshape['shape'].'"selected>'.$rowshape['shape'].'</option>');
							}
							else{
								echo('<option value="'.$rowshape['shape'].'">'.$rowshape['shape'].'</option>');
							}												
						}

						echo('</select>
					</td>
						</tr>
							<td></td>
							<td>
								<input type="submit" name="Enter" value="Enter" size="25">
							</td>
						</tr>
			</table>	
		</form>
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

');
}

else{
	
	echo('
		<html>
		<head>
		<title></title>
		<!--font family for website-->
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css?family=Saira&display=swap" rel="stylesheet">

		<style>');

		include 'style.css'; 
	
echo('
		body{
			color: blue;
		}
		.disdiv{
			text-align: left;
			display: block;
  			margin-left: auto;
  			margin-right: auto;
  			width: 60%
		}


	</style>
		</head>
		<body>
		
			<!--header image-->
			<img src="cat_track.jpeg" alt="Cat Track Skiing">
			
			<h1>Your Current Inputs</h1>
			
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
	
	');
	
	//step 1 - create an sql statement	
	$sql_insert = "INSERT INTO tbl_snow(brand,type,length,shape) ".
					"VALUES(:brand,:type,:length,:shape)";
	
	//step 2 - prepare our sql statement 	
	$sql_insert = $pdo->prepare($sql_insert);
	
	//step 3 - sanatize the information coming from the form
	$brand = filter_var($_POST['brand'], FILTER_SANITIZE_STRING);
	$type = filter_var($_POST['type'],   FILTER_SANITIZE_STRING);
	$length = filter_var($_POST['length'], FILTER_SANITIZE_STRING);
	$shape = filter_var($_POST['shape'], FILTER_SANITIZE_STRING);
	
	//step 4 - bind the palceholder to the data
	$sql_insert->bindparam(":brand", $brand);
	$sql_insert->bindparam(":type", $type);
	$sql_insert->bindparam(":length", $length);
	$sql_insert->bindparam(":shape", $shape);
	
	//step 5 - execute the query
	$sql_insert->execute();
		

	//display the data
	$sql_select = "SELECT * ".
					"FROM tbl_snow ";
					"WHERE snow_pk = (SELECT MAX(snow_pk) FROM tbl_snow)";
	$dataset = $pdo->query($sql_select);
	
	
	
	//loop through the dataset
	 foreach($dataset as $row){
		echo("<div class='display_data'>".$row['brand']. " ".$row['type']. ", ".$row['length']." ".$row['shape']. "</div>");
	}
	
	
	//clear
	unset($_POST['brand']);
	
	echo('

		<div align="center">
			<br>
				<a href = "input.php">
					<button class = "button3 type = "button">Add Another</button>
				</a>
			<a href = "display_edit.php">
					<button class = "button3 type = "button">Edit Data</button>
				</a>
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
	');		
}





