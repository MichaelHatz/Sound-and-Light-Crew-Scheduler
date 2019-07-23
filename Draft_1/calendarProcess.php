<?php

  include 'connect.php';

  echo "Connected to the table";

  $Day1 = "";
  $Day2 = "";
  $username = $_GET['username'];

  $result = mysqli_query($con, "SELECT startDate,endTime,eventDescription,users from events") or die("Failed to query database".mysqli_error());

  $row = "";

  $datas = array();

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $datas[] = $row;
      
    }
  }


  print_r($datas);
  // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  //   //Do something here  with $row array , for example print_r
  //   $datas[] = $row;
  //   print_r($datas);
  // }


  $Day1 = $username;

  for ($i=0; $i < 10; $i++) { 
    # code...
  }

  foreach ($datas as $events) {
    echo $events['startDate'];
  }

  if ($row['startDate'] == "2019-07-17" && $row['users'] == $username) {
    echo "<br> Successful Login";
  }

 //  if ($row['startDate'] <= '#2019-07-19#') {
	// 	echo "<br> Successful entry";
 //    $Day1 = $row['eventDescription'];
	// } else {
	// 	echo "<br> Unsuccessful entry";
	// }

 //  if ($row['startDate'] == '2019-07-12') {
 //    echo "<br> Successful entry";
 //    $Day2 = $row['eventDescription'];
 //  } else {
 //    echo "<br> Unsuccessful entry";
 //  }

    // $last_id = mysqli_query($con, "SELECT 'id' FROM 'events' WHERE 'users' = '$username'") or die("Can't pull the id".mysqli_error());
    // $q = mysql_fetch_assoc($last_id);
    // echo $q;
?>
