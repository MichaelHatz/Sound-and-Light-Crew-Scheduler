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
          <input type="text" name="username" id="username" value="" autocomplete="off"></input>
        </div>
        <div class="Email">
          <h2 style="margin-top: 15px">Email:</h2>
          <input type="text" name="email" id="username" value="" autocomplete="off"></input>
        </div>
        <div class="Password">
          <h2 style="margin-top: 15px">Password:</h2>
          <input type="password" name="password" id="passwordRegister" value="" autocomplete="off"></input>
        </div>
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
