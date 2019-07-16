<?php 
	$user = 'root';
	$password = '';
	$db = 'testmysql';
	$host = 'localhost';
	$port = 3306;

	$con = mysqli_connect($host,$user,$password,$db);
	if(!$con) {
		echo "Database Connection Error...".mysdqli_connect_error();
	}
?>