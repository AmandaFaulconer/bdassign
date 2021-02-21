<?php
	require 'dbconnect.php';


if(isset($_POST['resortname'])){

	//get the file info - do not change tmp_name
	$thefile = $_FILES['mapimage']['tmp_name'];
	$size = filesize($thefile);
	echo("File size:".$size);
	$imagetype = mime_content_type($thefile);  
		//mime - Multipurpose Internet Mail Extension

	//retrieve the file and encode it as base64
	$image = base64_encode(file_get_contents($_FILES['mapimage']['tmp_name']));

	//sql_statement
	$sql = 	"INSERT INTO tbl_maps(resortname, resortstate, mapimage, image_type, image_size) ".
			"VALUES(:resortname,:resortstate,:mapimage,:image_type,:image_size)";

	//prepare
	$sql = $pdo->prepare($sql);

	//sanitize
	$resortname = filter_var($_POST['resortname'], FILTER_SANITIZE_STRING);
	$resortstate = filter_var($_POST['resortstate'], FILTER_SANITIZE_STRING);

	//bind
	$sql->bindparam(":resortname", $resortname);
	$sql->bindparam(":resortstate", $resortstate);
	//specify long blob 
		//PDO: does not change
	$sql->bindparam(":mapimage", $image, PDO::PARAM_LOB);
	$sql->bindparam(":image_size", $size);
	$sql->bindparam(":image_type", $imagetype);

	try{
		//returns a boolean
		$upcheck = $sql->execute();
	}
	catch(PDOException $e){
		echo("Failed: ".$e->getMessage());
	}

	if($upcheck){
		header('Location: image_view.php');
	}
	else{
		echo("<br>************ File failed to upload *******<br>");
	}
}

else{
	echo('
	<html>
	<head>	
	<meta charset="utf-8">
	<title>Ski Resort Maps</title>

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

		<!--header image-->
		<img src="cat_track.jpeg" alt="Cat Track Skiing">

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

		<h1>Ski Resort Maps</h1>

		<div align="center">

			<form method="POST" action="add_image.php" enctype="multipart/form-data">

				<table>
					<tr>
						<td>Resort Name</td>
						<td><input type="text" size="25" name="resortname" value="Whitefish Mountain Resort"></td>
					</tr>

					<tr>
						<td>Resort State</td>
						<td><input type="text" size="25" name="resortstate" value="Montana"></td>
					</tr>

					<tr>
						<td>Picture File</td>
						<td><input type="file" name="mapimage" 
						accept=".jpg,.jpeg,.png, .gif"></td>
						<!-- accept filters what files will be shown -->
					</tr>

					<tr>
						<td></td>
						<td><input type="submit" value="Submit"></td>
					</tr>
				</table>

			</form>

		</div>


		<!--foooter information-->
		<input type="button" value = "Enter" onclick="setBoxColor()">
		&nbsp;

	</body>
	</html>
	');
}

?>
