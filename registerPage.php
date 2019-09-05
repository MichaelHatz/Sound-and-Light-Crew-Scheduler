<?php
  //This is the errors that the will appear based on the number
  $errors = array (
      0 => "",
      1 => "Username needs to just have characters and spaces, email need to be the correct format and the password needs to strong with at least 8 characters in length and should include at least one upper case letter, one number, and one special character",
      2 => "Username needs to just have characters and spaces and email need to be the correct format",
      3 => "The email needs to be the correct format and the password needs to strong with at least 8 characters in length and should include at least one upper case letter, one number, and one special character",
      4 => "Username needs to just have characters and spaces and the password needs to strong with at least 8 characters in length and should include at least one upper case letter, one number, and one special character",
      5 => "Username needs to just have characters and spaces",
      6 => "The email needs to be the correct format",
      7 => "The password needs to strong with at least 8 characters in length and should include at least one upper case letter, one number, and one special character"
  );

  //Error id is abtained by using the GET feature in PHP, which is in the URL under 'err' tag
  $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
?>

<!DOCTYPE html>
<html>
<!-- Link to the style sheet -->
<link rel="stylesheet" type="text/css" href="registerPageStyle.css">
<!-- Link to the icon for the tab -->
<link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBWaAjD1MXhCjefWNdgLyBDj0QJ_w3JaNsaqwbbb_a6yMRTZbicg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Link to googles Jquery so that I can use it in javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<head>
  <title>Sound and Light Crew Scheduler</title>
</head>
<body>
  <div class="LoginBox" id="loginBox">
    <div class="LoginBox" id="registerBox">
      <form id="registerForm" method="post" action="processRegister.php">
        <div class="Login">
          <h2 style="margin-top: 15px">Username:</h2>
          <input type="text" name="username" id="txt_input" value="" autocomplete="off"></input>
        </div>
        <div class="Email">
          <h2 style="margin-top: 15px">Email:</h2>
          <input type="text" name="email" id="txt_input" value="" autocomplete="off"></input>
        </div>
        <div class="Password">
          <h2 style="margin-top: 15px">Password:</h2>
          <input type="password" name="password" id="txt_input" value="" autocomplete="off"></input>
        </div>

        <p id="errorBox" class="errorBox"><?php echo $errors[$error_id]; ?></p>

        <div class="hot-container">
          <p>
            <a class="btn" id="submitRegisterButton" onclick="document.getElementById('registerForm').submit();">Submit</a>
          </p>
        </div>
        <div class="hot-container">
          <p>
            <a class="btn" id="returnButtonRegBox" href="index.php">Return</a>
          </p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
