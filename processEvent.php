<?php
	include 'connect.php';

	echo "TEST";

	$startDate = $_POST['startDate'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
	$eventDescription = $_POST['eventDescription'];
	$users = $_POST['users'];


	//Calling the database and moving the data into arrays so that I can access it later on in the script

	$result = mysqli_query($con, "SELECT * from events") or die("Failed to query database".mysqli_error());
	$resultUsers = mysqli_query($con, "SELECT * from users") or die("Failed to query database".mysqli_error());

	$row = "";
	$rowUsers = "";

	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_array($result)) {
	      $datas[] = $row;
	    }
	}

	if (mysqli_num_rows($resultUsers) > 0) {
	    while ($rowUsers = mysqli_fetch_array($resultUsers)) {
	      $datasUsers[] = $rowUsers;
	    }
	}
	//
	//Validation
	//

	//Getting the lengths of the arrays
	$datasUserLength = count($dataUsers, 0);
	$datasLength = count($datas, 0);

	//Checking if the text box that features users features in the database
	for ($i=0; $i < $datasUserLength; $i++) {
		if ($users = $datasUsers[$i]['Username']) {
			header("Location: ../SoundandLightCrewScheduler/index.php?err=4");
		}
	}
	


	$sql = "INSERT INTO events (startDate,startTime,endTime,eventDescription,users)
	VALUES ('$startDate','$startTime','$endTime','$eventDescription','$users')";

	if (mysqli_query($con, $sql)) {
       echo "New record created successfully";
    } else {
       echo "Error: " . $sql . "" . mysqli_error($con);
    }

?>
