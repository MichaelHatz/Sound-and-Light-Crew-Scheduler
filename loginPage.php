<?php
  //This is the errors that the will appear based on the number
  $errors = array (
      0 => "",
      1 => "Either a incorrect username and password",
      2 => "Either a incorrect username and password",
      3 => "Either a incorrect username and password",
      4 => "Either a incorrect username and password",
      5 => "Your account hasn't been confirmed, please wait or contact your adminastrator",
      6 => "SQL ERROR"
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

<script>
  // $(document).ready(function() {
  //   // hide/show password
  // 	$(".icon-wrapper").click(function() {
  // 		$(".toggle-password").toggleClass(".ion-eye ion-more");
  // 		var input = $($(".toggle-password").attr("toggle"));
  // 		if (input.attr("type") == "password") {
  // 			input.attr("type", "text");
  // 		} else {
  // 			input.attr("type", "password");
  // 		}
  // 	});
  // });
</script>

<head>
  <title>Sound and Light Crew Scheduler</title>
</head>
<body>
  <div class="LoginBox" id="loginBox">
    <form id="loginForm" method="post" action="processLogin.php">
      <div class="Login">
        <h2 style="margin-top: 15px">Username:</h2>
        <input type="text" name="username" id="usernameLogin" value="" autocomplete="off"></input>
      </div>

      <div class="Password">
        <h2 style="margin-top: 15px">Password:</h2>
        <input type="password" name="password" id="passwordLogin" value="" autocomplete="off"></input>
      </div>

      <p id="errorBox" class="errorBox"><?php echo $errors[$error_id]; ?></p>

      <div class="hot-container">
        <p>
          <a class="btn" onclick="document.getElementById('loginForm').submit();">Submit</a>
        </p>
      </div>
      <div class="hot-container" style="padding-bottom: 15px;">
        <p>
          <a class="btn" id="returnButtonLogBox" onclick="location.href = 'index.php'">Return</a>
        </p>
      </div>
    </form>
  </div>
</body>
</html>
