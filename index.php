<?php
  session_start();
  include_once 'connect.php';
  include_once 'Encryption.php';

  function redirect($DoDie = true) {
    header('Location: mainPage.php');
    if ($DoDie)
        die();
  }

  if(isset($_SESSION['user_id'])) {
    redirect();
  }

  $errors = array (
      0 => "",
      1 => "Either a incorrect username and password",
      2 => "Either a incorrect username and password",
      3 => "Either a incorrect username and password",
      4 => "Either a incorrect username and password",
      5 => "Your account hasn't been confirmed, please wait or contact your adminastrator",
      6 => "SQL ERROR"
  );

  $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;


  // if ($error_id != 0) {
  //     echo $errors[$error_id];
  // }
?>

<!DOCTYPE html>
<html>
<!-- Link to the style sheet -->
<link rel="stylesheet" type="text/css" href="style.css">
<!-- Link to all the javascript scripts -->
<script src="script.js"></script>
<script src="Encryption.js"></script>
<!-- Link to googles Jquery so that I can use it in javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<head>
    <!-- Title for the website in the bar at the top -->
    <title>Sound and Light Scheduling</title>
</head>

<!-- Javascript script box, this can probably in the future be moved over to a external file -->
<script>
  //The array needs to have the amount of people regired to make the person the amount needed
  var Image_slide = new Array("indexPhotos/Image1.jpg", "indexPhotos/Image2.jpg", "indexPhotos/Image3.jpg", "indexPhotos/Image4.jpg", "indexPhotos/Image5.jpg"); // image container
  var Img_Length = Image_slide.length; // container length - 1
  var Img_current = 0;
  var timeInterval = 5; //In seconds
  var errorCode = "<?php echo $error_id; ?>";






  //This checks for the document and if the login button has been pressed and opens the appropriate menu
  $(document).ready(function() {



    if (errorCode == 1) {

    } else if (errorCode == 2) {
      $("#LoginBtn").hide();
      $("#RegisterInput").hide();
      $("#paragrahStyle").show();
      $("#loginBox").show();

    } else if (errorCode == 3) {
      $("#LoginBtn").hide();
      $("#RegisterInput").hide();
      $("#paragrahStyle").hide();
      $("#loginBox").show();
    } else if (errorCode == 4) {
      $("#LoginBtn").hide();
      $("#RegisterInput").hide();
      $("#paragrahStyle").hide();
      $("#loginBox").show();
    } else if (errorCode == 5) {
      $("#LoginBtn").hide();
      $("#RegisterInput").hide();
      $("#paragrahStyle").hide();
      $("#loginBox").show();

    }

    $("#LoginBtn").click(function() {
      console.log("Login button click function");
      $("#LoginBtn").fadeOut();
      $("#RegisterInput").fadeOut();
      $("#paragrahStyle")
        .delay(500)
        .queue(function(next) {
          $("#paragrahStyle").css("padding-top", "15px");
          next();
        });
      $("#loginBox").delay(800).fadeIn();
    });

    //When the register button is pressed the appropriate menu opens
    $("#RegisterInput").click(function() {
      console.log("Register button click function")
      $("#LoginBtn").fadeOut();
      $("#RegisterInput").fadeOut();
      $("#paragrahStyle")
        .delay(500)
        .queue(function(next) {
          $("#paragrahStyle").css("padding-top", "15px");
          next();
        });
      $("#registerBox").delay(800).fadeIn();
    });

    $("#returnButtonLogBox").click(function() {
      console.log("Return button click function");
      $("#paragrahStyle")
      $("#loginBox").fadeOut();
      $("#paragrahStyle")
        .delay(500)
        .queue(function(next) {
          $("#paragrahStyle").css("padding-top", "15px");
          next();
        });
      $("#LoginBtn").delay(800).fadeIn();
      $("#RegisterInput").delay(800).fadeIn();
    });

    $("#returnButtonRegBox").click(function() {
      console.log("Return button click function");
      $("#paragrahStyle")
      $('#registerBox').fadeOut();
      $("#paragrahStyle")
        .delay(500)
        .queue(function(next) {
          $("#paragrahStyle").css("padding-top", "15px");
          next();
        });
      $("#LoginBtn").delay(800).fadeIn();
      $("#RegisterInput").delay(800).fadeIn();
    });

    $("#submitRegisterButton").click(function() {
      console.log("Disable button");
      $(this).prop('disabled', true);
      break;
    });


    //Set interval which changes the parralex background
    setInterval(function() {
      if (Img_current < Img_Length - 1) {
        Img_current++
      } else {
        console.log("Reset the img current to 0")
        Img_current = 0;
      }

      $("#parallax").fadeIn(500).css("background-image", "url(" + Image_slide[Img_current] + ")");

      console.log("Set Interval working");

    }, timeInterval * 1000);

  });
</script>

<body>
  <div class="parallax" id="parallax">
    <br>
    <div class="TitleBox">
      <h1>Sound and Light Crew Scheduler</h1>
    </div>

    <!-- <img src="SoundandLightCrewLogo.png" style="width: 500px; height: 500px;" > -->

    <div class="hot-container">
      <p id="paragrahStyle">
        <a id="LoginBtn" class="btn">Login</a>
        <div hidden class="LoginBox" id="loginBox">
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
            <div class="hot-container">
              <p>
                <a class="btn" id="returnButtonLogBox">Return</a>
              </p>
            </div>
          </form>
        </div>
        <div hidden class="LoginBox" id="registerBox">
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
                <a class="btn" id="returnButtonRegBox">Return</a>
              </p>
            </div>
          </form>
        </div>
      </p>
      <p>
        <a class="btn" id="RegisterInput">Register</a>
      </p>
    </div>
  </div>

  <div class="aboutPage">
    <h3>ABOUT</h3>
    <p style="padding-left: 20%; padding-right: 20%; text-align: center">
      Here at the Sound and Light Crew, we aim to provide Balwyn High School students an insight into the intricacies of the Audio-Visual field. Students who are part of the Sound and Light Crew will leave high school with experience working with stage lighting, sound design, and DSLR cameras. The crew provides a positive working enviroment, and is a great opportunity for Balwyn High students with an interest in the AV field to get some hands-on experience.
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
    <div style="width: 50%; float: left;">
      <p class="TextWebsiteName">Sound and Light Crew Scheduler</p>
    </div>
    <!-- This div floats all the text to the right of the copyright bar -->
    <div style="width: auto; overflow: hidden; float: right;">
      <p class="TextInformation">Michael Hatzipavlis 21.7.2019</p>
    </div>
  </div>

</body>

</html>
