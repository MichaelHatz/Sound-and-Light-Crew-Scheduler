<?php
	include 'connect.php';

	echo "TEST";

	$startDate = $_POST['startDate'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
	$eventDescription = $_POST['eventDescription'];
	$users = $_POST['users'];

	$datas = array();

	echo $startTime;

	$result = mysqli_query($con, "SELECT * from events") or die("Failed to query database".mysqli_error());

	$row = "";

	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_array($result)) {
	      $datas[] = $row;
	    }
	}

	print_r($datas);



	
	
	
	
?>