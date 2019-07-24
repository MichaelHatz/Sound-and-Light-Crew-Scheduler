<?php

  include 'connect.php';

  echo "Connected to the table";

  $username = $_GET['username'];

  $result = mysqli_query($con, "SELECT startDate,endTime,startTime,eventDescription,users from events") or die("Failed to query database".mysqli_error());

  $row = "";

  $datas = array();

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $datas[] = $row;
      
    }
  }

  $informationDates = array();

  $informationDates = array_pad($informationDates, 36, "");

  


  for ($i=0; $i < 4; $i++) { 
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
