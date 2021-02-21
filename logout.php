<?php
	session_start();
	unset($_SESSION['loginstatus']);
	header("Location: index.php");
?>
