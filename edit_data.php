<?php
	require('dbconnect.php');
	include('nav.php');

/*
if(!isset($_SESSION['loginstatus'])){
	header("Location: index.php");
	exit();
}
else{
	if($_SESSION['loginstatus'] == false){
		header("Location: index.php");
		exit();
	}
		
}
*/

if(!empty($_POST['brand'])){
	//write the sql statement
	$sql_update = "UPDATE tbl_snow ". 
					"SET brand = :brand, ".
						"type = :type, ".
						"length = :length, ".
						"shape = :shape ".
					"WHERE snow_pk = :snow_pk";
	
	//prepare the sql statement
	$sql_update = $pdo->prepare($sql_update);
	
	//sanitize the data
	$brand = filter_var($_POST['brand'], FILTER_SANITIZE_STRING);
	$type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
	$length = filter_var($_POST['length'], FILTER_SANITIZE_NUMBER_INT);
	$shape = filter_var($_POST['shape'], FILTER_SANITIZE_STRING);
	$snow_pk = filter_var($_POST['snow_pk'], FILTER_SANITIZE_NUMBER_INT);
	
	//bind our paramters
	$sql_update->bindparam(":brand", $brand);
	$sql_update->bindparam(":type", $type);
	$sql_update->bindparam(":length", $length);
	$sql_update->bindparam(":shape", $shape);
	$sql_update->bindparam(":snow_pk", $snow_pk);
	
	//execute query
	$sql_update->execute();
	
	//go to the display edit
	header("Location: display_edit.php");
}

//board info
$sql_select = "SELECT * FROM tbl_snow WHERE snow_pk = " . $_SESSION['snow_pk'];
$ds_select =$pdo->query($sql_select);

//shape information for drop down
$sql_shape = "SELECT shape FROM tbl_shape ORDER BY shape";
$ds_shape = $pdo->query($sql_shape);
?>

<html>
<head>
<meta charset="utf-8">
<title>Edit Data Option</title>
	
</head>
<body>
	<h1>Edit / Delete Data</h1>

	
	<form method="POST" action="edit_data.php">
	<table border="1" cellpadding="6">
		

		
		<?php
			//fetch will grab one row at a time - get a row of data, it will go until it fails
		
			//while loop to iterate through the data
			while($row = $ds_select->fetch()){
				echo(
					'<tr>
						<td>Brand</td>
						<td><input type="text" value="'.$row['brand'].'" name="brand">
						</td>
					</tr>'.
					
					'<tr>
						<td>Type</td>
						<td><input type="text" value="'.$row['type'].'" name="type">
						</td>
					</tr>'.
					
					'<tr>
						<td>Length</td>
						<td><input type="text" value="'.$row['length'].'" name="length">
						</td>
					</tr>'.
					
					'<tr>
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
					</tr>'
					
					
					
					
					
					
					.'<tr>
						<td></td>
						<td>
						<input type="hidden" value="'.$row['snow_pk'].'" name="snow_pk">
						<input type="submit" value="Enter" name="Enter">
						
						</td>
					</tr>'
					

				);
			}
		?>
		</form>
	</table>
				

</body>
</html>