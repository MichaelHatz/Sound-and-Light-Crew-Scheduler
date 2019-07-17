<?php

  include 'connect.php';

  echo "Connected to the table";

  $username = $_GET['username'];

  $result = mysqli_query($con, "SELECT * from events where users = '$username'") or die("Failed to query database".mysqli_error());

  $row = mysqli_fetch_array($result);

  if ($row['users'] == $username) {
		echo "<br> Successful entry";
	} else {
		echo "<br> Unsuccessful entry";
	}


?>
