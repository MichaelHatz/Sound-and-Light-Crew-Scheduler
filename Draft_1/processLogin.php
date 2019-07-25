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

	if ($row['Username'] == $username && $row['Password'] == $password) {
		$_SESSION['user_id'] = $username;
		echo "<br> Successful Login";
		header("Location: ../Draft_1/mainPage.php");
	} else {
		echo "<br> Unsuccessful Login";
	}

?>
