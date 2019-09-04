<?php
	//start the session to access some variables
	session_start();
	//Connect to the database
	include 'connect.php';
	//Allow the password to be encrypted
	include 'Encryption.php';
	//Collect the Post variables, username and password
	$username = $_POST['username'];
	$passwordNotHashed = $_POST['password'];
	//Hash the password
	$password = hash_sha1($passwordNotHashed);
	//Strip the slashes from the username
	$username = stripcslashes($username);
	//Collect the some results from the database where the username and password are equal what is inputed
	$result = mysqli_query($con, "SELECT * from users where Username = '$username' and Password = '$password'") or die("Failed to query database".mysqli_error());
	//Throw the results from the query above and put it into an array
	$row = mysqli_fetch_array($result);
	//Check for HoneyPot Trap
	echo $password;

	if ("admin" == $username && "40bd001563085fc35165329ea1ff5c5ecbdbbeef" == $password) {
		//Initiate Rick Roll
		echo "Rick Roll";
		header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
	}

	//This if statemnet checks if the username, password as well as checking that the member is valid
	if ($row['Username'] == $username && $row['Password'] == $password && $row['validMember'] == "1") {
		$_SESSION['user_id'] = $username;
		$_SESSION['user_class'] = $row['userClass'];
		$_SESSION['user_email'] = $row['Email'];
		header("Location: mainPage.php"); //Redirect to the main page if it is valid
	} else {
		if ($row['Username'] != $username && $row['Password'] != $password && $row['validMember'] == "0") { //Equal if username, password, and valid member isn't true
			header("Location: index.php?err=1");
		} else if ($row['Username'] != $username && $row['Password'] != $password) { //Equal if username and password isn't true
			// header("Location: index.php?err=2");
		} else if ($row['Username'] != $username) { //Equal if the username isn't true
			header("Location: index.php?err=3");
		} else if ($row['Password'] != $password) { //Equal if the password isn't true
			header("Location: index.php?err=4");
		} else if ($row['validMember'] == "0") {
			header("Location: index.php?err=5");
		}

	}

?>
