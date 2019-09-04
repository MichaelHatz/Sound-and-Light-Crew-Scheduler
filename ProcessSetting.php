<?php
  //Connects the php document to the database
  include 'connect.php';
  //Colelcts the posted username, password, repeatedPassword and userEmail.
  $username = $_POST['username'];
	$password = $_POST['password'];
	$repeatedPassword = $_POST['repeatedPassword'];
	$userEmail = $_POST['userEmail'];
  //Query the database for all the data of the users
  $result = mysqli_query($con, "SELECT * from users") or die("Failed to query database".mysqli_error());
  //Take query results and plug them into an array
  if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_array($result)) {
	      $datas[] = $row;
	    }
	}
  //Bit of validation, if the passwords match up then accept the change
  if ($password === $repeatedPassword) {
    echo "Passwords do match up";
    header("Location: mainPage.php?pg=2");
  } else {
    header("Location: mainpage.php?err=2");
  }
  //Then insert the updated values into the database
  $sql = "INSERT INTO users (username,Password,Email)
	VALUES ('$username','$password','$userEmail')";
?>
