<?php

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  include 'connect.php';

  //Declare variables
  $username = $_SESSION["user_id"];
  $userclass = $_SESSION['user_class'];
  $datas = array();
  $informationDates = array();

  //Catch the ajax variables if sent

  if (isset($_POST['increaseMonth'])) {
    $monthChange = $_POST['increaseMonth'];
    $yearChange = $_POST['increaseYear'];
  } else {
    // $monthChange = date('M');
    $monthChange = "08";
    $yearChange = "2019";
  }


  //Collect the results from the database through a query
  $result = mysqli_query($con, "SELECT startDate,endTime,startTime,eventDescription,users from events") or die("Failed to query database".mysqli_error());
  $resultUsers = mysqli_query($con, "SELECT Username,userClass,validMember from users") or die("Failed to query database".mysqli_error());

  //Declare some empty variables
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

  //First for loop will loop for the length of the array
  for ($i=0; $i < $datasLength; $i++) {
    //The next for loop repeats for the length of a month
    for ($x=1; $x < 35; $x++) {
      //Checking if the the data is equal to the correct user
      if ($datas[$i]['users'] == $username) {
        //If the date is less then 10 make sure to check with a 0 infront, and for 10 or equal to search with no digit in the if statement
        if ($x < 10) {
          if ($datas[$i]['startDate'] == "$yearChange"."-".$monthChange."-0".$x) {
            $informationDates[$x] = $datas[$i]['eventDescription']."<br>".$datas[$i]['startTime']." to ".$datas[$i]['endTime'];
          }
        } elseif ($x >= 10) {
          if ($datas[$i]['startDate'] == "$yearChange"."-".$monthChange."-".$x) {
            $informationDates[$x] = $datas[$i]['eventDescription']."<br>".$datas[$i]['startTime']." to ".$datas[$i]['endTime'];
          }
        }
      }
    }
  }

  //The whole next section of the code is checking and adding settings to control members of the Sound and Light Crew
  $MemberList = "";
  $datasUserLength = count($datasUsers, 0);
  $userAction = "\"UserAction\"";

  //First for loop will loop for the length of the array
  for ($i=0; $i < $datasUserLength; $i++) {
    $userClassGroup = $datasUsers[$i]['userClass'];
    $usernames = $datasUsers[$i]['Username'];

    //Change the colour of the username if they are valid or not
    //Yellow means that the member is not valid, black means that the member is valid
    if ($datasUsers[$i]['validMember'] == 1) {
      $MemberList .= "<span style='display:inline;'>$usernames</span>";
    } else if ($datasUsers[$i]['validMember'] == 0) {
      $MemberList .= "<span style='display:inline; color:#ffea92;'>$usernames</span>";
    }
    //Add the remove button for members as well as toggle the class status of the user
    $MemberList .= "<button style='float:right; margin-left:5px;' value='$usernames' name='removeUser' onclick='document.getElementById($userAction).submit();'>Remove</button>";
    $MemberList .= "<button style='float:right; width:80px; margin-left:5px;' value='$usernames' name='toggleClass' onclick='document.getElementById($userAction).submit();'>$userClassGroup</button>";
    //If the member is not valid make a button appear allowing the admin to accept the member
    if ($datasUsers[$i]['validMember'] == 0) {
      $MemberList .= "<button style='float:right; width:150px; margin-left:5px;' value='$usernames' name='acceptMember' onclick='document.getElementById($userAction).submit();'>AcceptMember</button>";
    }
    $MemberList .= "<br />";
    $MemberList .= "<p>";
  }

  //This is to print the increasedMonth, what this allows it
  if (isset($_POST['increaseMonth'])) {
    print json_encode($informationDates);
  }
?>
