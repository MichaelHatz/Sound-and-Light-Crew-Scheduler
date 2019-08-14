<?php
	//Username for the sql database
	$user = 'root';
	//Password for the sql database
	$password = 'root';
	//Database name
	$db = 'testmysql';
	//Database host
	$host = 'localhost';
	//Databse port
	$port = 3306;

	//With all the information from above, connect to the database
	$con = mysqli_connect($host,$user,$password,$db);

	//Throw up error if it is not possible to connect to the databse
	if(!$con) {
		echo "Database Connection Error...".mysdqli_connect_error();
	}
?>
