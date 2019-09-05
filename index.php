<?php
  //Start the session so that I can access the session variables
  session_start();

  //Include the connect.php, which connect the index file the database
  include_once 'connect.php';
  //Include the encryption.php script which allows both the register button and login button to call the encrypting function
  include_once 'Encryption.php';

  //Redirect function, if this cannot be done it kills the script
  function redirect($DoDie = true) {
    header('Location: mainPage.php');
    if ($DoDie)
        die();
  }

  //If you are already signed in then redirect to the main screen, isset checks wither the user is null
  if(isset($_SESSION['user_id'])) {
    redirect();
  }

?>

<!DOCTYPE html>
<html>
<!-- Link to the style sheet -->
<link rel="stylesheet" type="text/css" href="style.css">
<!-- Link to the icon for the tab -->
<link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBWaAjD1MXhCjefWNdgLyBDj0QJ_w3JaNsaqwbbb_a6yMRTZbicg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Link to googles Jquery so that I can use it in javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<head>
    <!-- Title for the website in the bar at the top -->
    <title>Sound and Light Scheduling</title>
</head>
<body>
  <!-- The parallax effect where the title box is -->
  <div class="parallax" id="parallax">
    <br>

    <!-- <img src="SoundandLightCrewLogo.png" style="width: 500px; height: 500px;" > -->

    <div class="hot-container-Title">
      <div class="TitleBox">
        <h1>Sound and Light Crew Scheduler</h1>
      </div>
      <p id="paragrahStyle">
        <a id="LoginBtn" class="btn" href="loginPage.php">Login</a>
        <a class="btn" id="RegisterInput" href='registerPage.php'>Register</a>
      </p>
      <div class="arrow bounce">
        <a class="fa fa-arrow-down fa-2x"></a>
      </div>
    </div>
  </div>

  <div class="aboutPage">
    <h3>ABOUT</h3>
    <p style="padding-left: 20%; padding-right: 20%; text-align: center; font-size: 2.2vw; text-align: justify;">
      Here at the Sound and Light Crew, we aim to provide Balwyn High School students an insight into the intricacies of the Audio-Visual field. Students who are part of the Sound and Light Crew will leave high school with experience working with stage lighting, sound design and DSLR cameras. The crew provides a positive working environment and is a great opportunity for Balwyn High students with an interest in the AV field to get some hands-on experience.
    </p>
    <div class="aboutPageImages">
      <!-- Setting the defualt images for the background parralex effects -->
      <img src="indexPhotos/image2.jpg" id="aboutImage1"></img>
      <img src="indexPhotos/image3.jpg" id="aboutImage2"></img>
    </div>
  </div>

  <!-- Parallax image affect between the copyright bar and the about page -->
  <div class="parallax" id="parallax2"></div>

  <!-- Copyright bar which features at the bottom of the web page -->
  <div class="copyrightBar" style="width: auto; overflow: hidden; display: block; height: 75px;">
    <!-- This div floats the text to the left side of the copyright bar -->
    <div style="width: 50%; float: left;  font-size: 2vw;">
      <p class="TextWebsiteName">Sound and Light Crew Scheduler</p>
    </div>
    <!-- This div floats all the text to the right of the copyright bar -->
    <div style="width: auto; overflow: hidden; float: right; font-size: 2.2vw;">
      <p class="TextInformation">Michael Hatzipavlis 21.7.2019</p>
    </div>
  </div>

</body>

</html>
