<?php
//dbconnect.php
//db connection file

try{
	$pdo = new PDO('mysql:host=localhost;dbname=wp_snowdb', 		'afaulconer','');

	//PDO errors
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbstatus = "good db connection";
}

catch(PDOException $e){
	$dbstatus = "could not connect";
}



session_start();

?>
