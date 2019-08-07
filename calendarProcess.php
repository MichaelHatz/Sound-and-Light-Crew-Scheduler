<?php

  include 'connect.php';

  //Declare variables
  $username = $_SESSION["user_id"];
  $userclass = $_SESSION['user_class'];
  $datas = array();
  $informationDates = array();

  $result = mysqli_query($con, "SELECT startDate,endTime,startTime,eventDescription,users from events") or die("Failed to query database".mysqli_error());
  $resultUsers = mysqli_query($con, "SELECT Username,userClass from users") or die("Failed to query database".mysqli_error());

  $row = "";
  $rowUsers = "";

  //Enter the query into a array $datas[]
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $datas[] = $row;
    }
  }

  //Enter the query into a array $datasUsers[]
  if (mysqli_num_rows($resultUsers) > 0) {
    while ($rowUsers = mysqli_fetch_array($resultUsers)) {
      $datasUsers[] = $rowUsers;
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

  $MemberList = "";
  $datasUserLength = count($datasUsers, 0);



  for ($i=0; $i < $datasUserLength; $i++) {
    $userClassGroup = $datasUsers[$i]['userClass'];
    $usernames = $datasUsers[$i]['Username'];
    $MemberList .= "<span style='display: inline;'>$usernames</span>";
    $MemberList .= "<input style='float:right; margin-left:5px;' type='button' value='Remove' onclick='document.getElementById('UserAction').submit();'>";
    $MemberList .= "<input style='float:right; width:80px;' type='button' value='$userClassGroup'>";
    $MemberList .= "<br />";
    $MemberList .= "<p>";
  }



  ?>
