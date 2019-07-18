<?php

  include 'connect.php';

  echo "Connected to the table";

  $Day1 = "";
  $Day2 = "";
  $username = $_GET['username'];

  $result = mysqli_query($con, "SELECT startDate,endTime,eventDescription from events") or die("Failed to query database".mysqli_error());

  $row = "";

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    //Do something here  with $row array , for example print_r
    print_r($row);
  }

  print_r($row);

  if ($row['startDate'] <= '#2019-07-19#') {
		echo "<br> Successful entry";
    $Day1 = $row['eventDescription'];
	} else {
		echo "<br> Unsuccessful entry";
	}

  if ($row['startDate'] == '2019-07-12') {
    echo "<br> Successful entry";
    $Day2 = $row['eventDescription'];
  } else {
    echo "<br> Unsuccessful entry";
  }

    // $last_id = mysqli_query($con, "SELECT 'id' FROM 'events' WHERE 'users' = '$username'") or die("Can't pull the id".mysqli_error());
    // $q = mysql_fetch_assoc($last_id);
    // echo $q;
?>
