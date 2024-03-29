<?php
  //Connect the php document to the database
  include 'connect.php';
  //Query the database
  $result = mysqli_query($con, "SELECT * from users") or die("Failed to query database".mysqli_error());
  //Take query results and plug them into an array
  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $datas[] = $row;
      }
  }

  //This old version didn't work on the server for whatever reason, below is the fix
  // if (isset($_POST['toggleClass'])) {
  //   $username = $_POST['toggleClass'];
  //   $usernameClass = ToggleUser($datas);
  //   echo $usernameClass;
  //   if ($datas[$usernameClass]['userClass'] == 'Member') {
  //     mysqli_query($con, "UPDATE users SET userClass='Admin' where id = (select id from (select id from users order by id limit $usernameClass,1) as tbl)");
  //     echo "Call Admin";
  //   } else if ($datas[$usernameClass]['userClass'] == 'Admin') {
  //     mysqli_query($con, "UPDATE users SET userClass='Member' where id = (select id from (select id from users order by id limit $usernameClass,1) as tbl)");
  //     echo "Call member";
  //   }
  //   header("Location: mainPage.php?pg=1");
  // }

  //This is called when a toggle class button is pressed
  if (isset($_POST['toggleClass'])) {
    $username = $_POST['toggleClass'];
    $usernameClass = ToggleUser($datas);
    $idValue = $datas[$usernameClass]['id'];
    if ($datas[$usernameClass]['userClass'] == 'Member') {
      mysqli_query($con, "UPDATE users SET userClass='Admin' where id = $idValue");
    } else if ($datas[$usernameClass]['userClass'] == 'Admin') {
      mysqli_query($con, "UPDATE users SET userClass='Member' where id = $idValue");
    }
    header("Location: mainPage.php?pg=1");
  }

  //This is called when a remove button for users gets clicked
  if (isset($_POST['removeUser'])) {
    $username = $_POST['removeUser'];
    $usernameRemovalID = RemoveUser($datas);
    $idValue = $datas[$usernameRemovalID]['id'];
    //mysqli_query($con, "DELETE FROM users WHERE id='".$usernameRemovalID."' AND Username = '".$username."'");
    mysqli_query($con, "DELETE from users where id = $idValue");
    header("Location: mainPage.php?pg=1");
  }

  //This is called when the accept member button gets pressed
  if (isset($_POST['acceptMember'])) {
    $username = $_POST['acceptMember'];
    $usernameValidMember = AcceptUser($datas);
    $idValue = $datas[$usernameValidMember]['id'];

    // mysqli_query($con, "UPDATE users SET validMember=1 Where id=$usernameValidMember");
    mysqli_query($con, "UPDATE users SET validMember=1 where id = $idValue");
    header("Location: mainPage.php?pg=1");
  }


  //This function can be called from inside the remove users post, this chcecks and returns the correct index for the user so it can be removed
  function RemoveUser(&$array) {
    global $username;
    global $row;

    $datasUserLength = count($array, 0);

    for ($i=0; $i < $datasUserLength; $i++) {

      if ($array[$i]['Username'] == $username) {
        return $i;
      }
    }

  }

  //This function can be called from inside the toggle users post, this chcecks and returns the correct index for the user so it can be toggled
  function ToggleUser(&$array) {
    global $username;
    //The amount of
    $datasUserLength = count($array, 0);

    for ($i=0; $i < $datasUserLength; $i++) {

      if ($array[$i]['Username'] == $username) {
        return $i;
      }
    }
  }

  //This function can be called from inside the accept users post, this chcecks and returns the correct index for the user so it can accepted
  function AcceptUser(&$array) {
    global $username;

    $datasUserLength = count($array, 0);

    for ($i=0; $i < $datasUserLength; $i++) {

      if ($array[$i]['Username'] == $username) {
        return $i;
      }
    }
  }
?>
