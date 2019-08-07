<?php
	session_start();
	include 'connect.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	// $username = mysql_real_escape_string($username, $con);
	// $password = mysql_real_escape_string($password, $con);

	// $sql = "SELECT * FROM users;";
	// $result = mysqli_query($con, $sql);

	$result = mysqli_query($con, "SELECT * from users where Username = '$username' and Password = '$password'") or die("Failed to query database".mysqli_error());

	// $resultCheck = mysqli_num_rows($result);

	$row = mysqli_fetch_array($result);

	if ($row['Username'] == $username && $row['Password'] == $password && $row['validMember'] == "1") {
		$_SESSION['user_id'] = $username;
		$_SESSION['user_class'] = $row['userClass'];
		$_SESSION['user_email'] = $row['Email'];
		echo "<br> Successful Login";
		header("Location: ../SoundandLightCrewScheduler/mainPage.php"); //Redirect to the main page if it is valid
	} else {
		if ($row['Username'] != $username && $row['Password'] != $password && $row['validMember'] == "0") { //Equal if username, password, and valid member isn't true
			header("Location: ../SoundandLightCrewScheduler/index.php?err=1");
		} else if ($row['Username'] != $username && $row['Password'] != $password) { //Equal if username and password isn't true
			header("Location: ../SoundandLightCrewScheduler/index.php?err=2");
		} else if ($row['Username'] != $username) { //Equal if the username isn't true
			header("Location: ../SoundandLightCrewScheduler/index.php?err=3");
		} else if ($row['Password'] != $password) { //Equal if the password isn't true
			header("Location: ../SoundandLightCrewScheduler/index.php?err=4");
		} else if ($row['validMember'] == "0") {
			header("Location: ../SoundandLightCrewScheduler/index.php?err=5");
		}

	}

?>
