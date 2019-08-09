<?php

  include 'connect.php';

  print_r($_POST);

  $result = mysqli_query($con, "SELECT * from users") or die("Failed to query database".mysqli_error());
  // $row = "";

  // if (mysqli_num_rows($result) > 0) {
	//     while ($row = mysqli_fetch_array($result)) {
	//       $datas[] = $row;
	//     }
	// }

  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $datas[] = $row;
      }
  }


  if (isset($_POST['toggleClass'])) {
    $username = $_POST['toggleClass'];
    $usernameClass = ToggleUser($datas);
    print_r($datas);
    echo "<br>";
    echo $usernameClass."<br>";
    echo $datas[$usernameClass]['userClass']."<br>";
    if ($datas[$usernameClass - 1]['userClass'] == "Member") {
      mysqli_query($con, "UPDATE users SET userClass='Admin' WHERE id=$usernameClass");
      echo "Set user to be admin";
    } else if ($datas[$usernameClass - 1]['userClass'] == "Admin") {
      mysqli_query($con, "UPDATE users SET userClass='Member' WHERE id=$usernameClass");
      echo "Set use to member";
    }
    header("Location: ../SoundandLightCrewScheduler/mainPage.php");
  }

  if (isset($_POST['removeUser'])) {
    $username = $_POST['removeUser'];
    $usernameRemovalID = RemoveUser($datas);
    echo $usernameRemovalID;
    mysqli_query($con, "DELETE FROM users WHERE id='".$usernameRemovalID."' AND Username = '".$username."'");

  }

  if (isset($_POST['acceptMember'])) {
    echo "accepting Member";
    $username = $_POST['acceptMember'];
    $usernameValidMember = AcceptUser($datas);
    echo "<br>";
    echo $usernameValidMember."<br>";

    mysqli_query($con, "UPDATE users SET validMember=1 Where id=$usernameValidMember");
    header("Location: ../SoundandLightCrewScheduler/mainPage.php?pg=2");
  }



  function RemoveUser(&$array) {
    global $username;
    global $row;

    echo $username . "\n";

    echo "RemoveUser";

    $datasUserLength = count($array, 0);

    echo $datasUserLength;

    for ($i=0; $i < $datasUserLength; $i++) {

      if ($array[$i]['Username'] == $username) {
        echo "HELLO WORLD USERNAME";
        echo $array[$i]['id'];
        echo $i;
        if ($array[$i]['id'] == $i + 1) {
          echo "HELLO WORLD ID";
          return $i + 1;
        }
      }
    }

  }

  function ToggleUser(&$array) {
    global $username;

    echo "Toggle User Class";

    $datasUserLength = count($array, 0);

    echo $datasUserLength;

    for ($i=0; $i < $datasUserLength; $i++) {

      if ($array[$i]['Username'] == $username) {
        echo "HELLO WORLD USERNAME";
        if ($array[$i]['id'] == $i + 1) {
          echo "HELLO WORLD ID";
          return $i + 1;
        }
      }
    }



  }

  function AcceptUser(&$array) {
    global $username;

    echo "Toggle User Class";

    $datasUserLength = count($array, 0);

    echo $datasUserLength;

    for ($i=0; $i < $datasUserLength; $i++) {

      if ($array[$i]['Username'] == $username) {
        echo "HELLO WORLD USERNAME";
        if ($array[$i]['id'] == $i + 1) {
          echo "HELLO WORLD ID";
          return $i + 1;
        }
      }
    }
  }
?>
