<?php
	//Connect the php document to the database
	include 'connect.php';

	//Obtain the variables from post
	$startDate = $_POST['startDate'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
	$eventDescription = $_POST['eventDescription'];
	$users = $_POST['users'];

	//Validation variables
	$existenceCheck = false;
	$usersCheck = false;
	$usersArray = explode(',', $users);

	//Calling the database and moving the data into arrays so that I can access it later on in the script
	$result = mysqli_query($con, "SELECT * from events") or die("Failed to query database".mysqli_error());
	$resultUsers = mysqli_query($con, "SELECT * from users") or die("Failed to query database".mysqli_error());

	//Insert the data from the query into an array
	if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_array($result)) {
	      $datas[] = $row;
	    }
	}

	//Insert the data from the query into an array
	if (mysqli_num_rows($resultUsers) > 0) {
	    while ($rowUsers = mysqli_fetch_array($resultUsers)) {
	      $datasUsers[] = $rowUsers;
	    }
	}

	//
	//Validation
	//

	//Getting the lengths of the arrays
	$datasUserLength = count($datasUsers, 0);
	$datasLength = count($datas, 0);
	$usersArrayLength = count($usersArray, 0);
	//Checking if the text box that features users features in the database
	for ($d=0; $d < $usersArrayLength; $d++) {
		for ($i=0; $i < $datasUserLength; $i++) {
			if ($usersArray[$d] == $datasUsers[$i]['Username']) {
				$usersAmount += 1;
			}
		}
	}

	echo $usersArrayLength;
	echo $usersAmount;

	if ($usersAmount == $usersArrayLength) {

	} else {
		// header("Location: mainPage.php?pg=1");
		$usersCheck = true;
	}


	//Existence check
	if (isset($startDate) && isset($startTime) && isset($endTime) && isset($eventDescription) && isset($users)) {

	} else {
		$existenceCheck = true;
	}

	echo $existenceCheck;
	echo $usersCheck;

	if ($existenceCheck == true && $usersCheck == true) {
		header("Location: mainPage.php?pg=1");
	} else if ($existenceCheck == true) {
		header("Location: mainPage.php?pg=1");
	} else if ($usersCheck == true) {
		header("Location: mainPage.php?pg=1");
	} else {
		for ($i=0; $i < $usersArrayLength; $i++) {
			//Create a new row in the database and insert the startDate, startTime, endTime, eventDescription, users
			$userFromArray = $usersArray[$i];
			$sql = "INSERT INTO events (startDate,startTime,endTime,eventDescription,users)
			VALUES ('$startDate','$startTime','$endTime','$eventDescription','$userFromArray')";

			//If the
			if (mysqli_query($con, $sql)) {
					 echo "New record created successfully";

			} else {
				 echo "Error: " . $sql . "" . mysqli_error($con);
			}
		}
	}
?>
