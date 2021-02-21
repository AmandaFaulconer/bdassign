<?php
	require('dbconnect.php');

if(isset($_POST)){
	if(!empty($_POST['action'])){
		//delete the record
		if($_POST['action']==='Delete'){
			
			$snow_pk = filter_var($_POST['snow_pk'], FILTER_SANITIZE_NUMBER_INT);
			//where must be added or you will delete them all
			$sql_delete = "DELETE FROM tbl_snow WHERE snow_pk = ".$snow_pk;
			
			$pdo->exec($sql_delete);			
		}
		
		//edit data
		if($_POST['action']==='Edit'){
			
			$_SESSION['snow_pk'] = filter_var($_POST['snow_pk'], FILTER_SANITIZE_NUMBER_INT);
			header('Location:edit_data.php');
			
		}
	}
}

//test to see if the buttons are working
//print_r($_POST);
//echo('<br><hr><br>');


	
	//set up a query to retrieve data
	$sql_select = "SELECT * FROM tbl_snow ORDER BY brand";
	
	//run the query
	//ds = dataset
	//
	$ds_select =$pdo->query($sql_select);


?>

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
		
		table, tr, td, th{
			border: 1px solid black;
			border-collapse: collapse;
			padding-left: 5px;
			padding-right: 5px;
		}

		th{
			text-align: left;
		}
		table{
			border-spacing: 5px;
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
	
	<h1>Edit or Delete Data</h1>
	
	<div>
	
	<table class="dis-tbl" style="width: 100%">
		
		<tr>
			<th>Brand</th>
			<th>Type</th>
			<th>Length</th>
			<th>Shape</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		
		<?php
			//fetch will grab one row at a time - get a row of data, it will go until it fails
		
			//while loop to iterate through the data
			while($row = $ds_select->fetch()){
				echo(
					'<tr>'
						.'<td>'.$row['brand'].'</td>'
						.'<td>'.$row['type'].'</td>'
						.'<td>'.$row['length'].'</td>'
						.'<td>'.$row['shape'].'</td>'
					
						.'<td>
					
							<form method="POST" 
							action="display_edit.php" 
							onsubmit="return confirm('."'".'Are you sure y/n'."'".')">
							
							<input style="margin-top:10px" type="submit" value ="Edit" name="action">
						
							</td>
							
							<td>
							
							<input type="submit" value ="Delete" name="action">
							
							<!--this will be hidden from the user-->
							<input type="hidden" name="snow_pk" value="'.$row['snow_pk'].'">
							
							</form>
					
						</td>
					</tr>'
				
				);
			}
		?>	
	
	</table>
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
