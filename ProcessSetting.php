<?php

  include 'connect.php';

  $username = $_POST['username'];
	$password = $_POST['password'];
	$repeatedPassword = $_POST['repeatedPassword'];
	$userEmail = $_POST['userEmail'];

  $invalidSubmission;

  $datas = array();

  $result = mysqli_query($con, "SELECT * from users") or die("Failed to query database".mysqli_error());

  $row = "";

  if (mysqli_num_rows($result))if (mysqli_num_rows($result) > 0) {
	    while ($row = mysqli_fetch_array($result)) {
	      $datas[] = $row;
	    }
	}

  echo $password . "<br>";
  echo $repeatedPassword . "<br>";

  if ($password === $repeatedPassword) {
    echo "Passwords do match up";
  } else {
    header("Location: ../SoundandLightCrewScheduler/mainpage.php?err=2");
  }

  $sql = "INSERT INTO users (username,Password,Email)
	VALUES ('$username','$password','$userEmail')";




?>
