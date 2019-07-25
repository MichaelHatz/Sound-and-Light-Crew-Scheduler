<?php

  include 'connect.php';

  //Declare variables
  $username = $_SESSION["user_id"];
  $datas = array();
  $informationDates = array();

  $result = mysqli_query($con, "SELECT startDate,endTime,startTime,eventDescription,users from events") or die("Failed to query database".mysqli_error());

  $row = "";

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $datas[] = $row;
    }
  }

  //Pad the array informationDates with enough days for the entire month
  $informationDates = array_pad($informationDates, 36, "");

  //Find the length of the array for the next for loop
  $datasLength = count($datas, 0);

  for ($i=0; $i < $datasLength; $i++) {
    for ($x=1; $x < 35; $x++) {
      if ($datas[$i]['users'] == $username) {

        if ($x < 10) {
          if ($datas[$i]['startDate'] == "2019-07-0".$x) {
            $informationDates[$x] = $datas[$i]['eventDescription']."<br>".$datas[$i]['startTime']." to ".$datas[$i]['endTime'];
          }
        } elseif ($x >= 10) {
          if ($datas[$i]['startDate'] == "2019-07-".$x) {
            $informationDates[$x] = $datas[$i]['eventDescription']."<br>".$datas[$i]['startTime']." to ".$datas[$i]['endTime'];
          }
        }
      }
    }
  }

?>
