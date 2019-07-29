<?php
    session_start();
    include_once 'connect.php';

    function redirect($DoDie = true) {
      header('Location: mainPage.php');
      if ($DoDie)
          die();
    }

    if(isset($_SESSION['user_id'])) {
      redirect();
    }

    $errors = array (
        1 => "Hello, world",
        2 => "My house is on fire!"
    );

    $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

    if ($error_id != 0) {
        echo $errors[$error_id];
    }
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="script.js"></script>
<script src="Encryption.js"></script>
<!-- <script src="slideshow.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<head>
    <title>Sound and Light Scheduling</title>
</head>

<script>
    //The array needs to have the amount of people regired to make the person the amount needed
    var Image_slide = new Array("Image1.jpg", "Image2.jpg", "Image3.jpg", "Image4.jpg", "Image5.jpg"); // image container
    var Img_Length = Image_slide.length; // container length - 1
    var Img_current = 0
    var timeInterval = 5; //In seconds

    //This checks for the document and if the login button has been pressed and opens the appropriate menu
    $(document).ready(function() {
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
                    $("#paragrahStyle").css("padding-top", "200px");
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
                    $("#paragrahStyle").css("padding-top", "200px");
                    next();
                });
            $("#LoginBtn").delay(800).fadeIn();
            $("#RegisterInput").delay(800).fadeIn();
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

    <!-- <div class="TitleBox">
			<h1>Crew Scheduler Login</h1>
		</div>
		<hr> -->
    <div class="BelowBreak">

        <div class="parallax" id="parallax">
            <br>
            <div class="TitleBox">
                <h1>Sound and Light Crew Scheduler</h1>
            </div>

            <div class="hot-container">
                <p style="padding-top: 200px" id="paragrahStyle">
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

                            <div class="hot-container">
                                <p>
                                    <a class="btn" onclick="EncyrptionFun('login'); document.getElementById('loginForm').submit();">Submit</a>
                                </p>
                            </div>
                            <div class="hot-container">
                                <p>
                                    <a class="btn" id="returnButtonLogBox">Return</a>
                                </p>
                            </div>

                            <!-- <input type="submit" id="btn" value="login"/> -->
                        </form>
                    </div>

                    <div hidden class="LoginBox" id="registerBox">
                        <form id="registerForm" method = "post" action = "processRegister.php">
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
                                    <a class="btn" onclick="EncyrptionFun('register'); document.getElementById('registerForm').submit();">Submit</a>
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

            <!-- <div class="SubmitButton">
                <button class="button "type="button" onclick="CheckPassword();">Submit</button>
            </div> -->

        </div>
    </div>

    <div class="aboutPage">
        <h3>ABOUT</h3>
        <p style="padding-left: 20%; padding-right: 20%; text-align: center">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
					 dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<div class="aboutPageImages">
					<img src="image2.jpg"  id="aboutImage1"></img>
					<img src="image3.jpg" id="aboutImage2"></img>
				</div>

    </div>

		<div class="parallax" id="parallax2"></div>

		<div class="copyrightBar" style="width: auto; overflow: hidden; display: block; height: 75px;">
            <div style="width: 50%; float: left;">
                <p class="TextWebsiteName">Sound and Light Crew Scheduler</p>
            </div>
			<div style="width: auto; overflow: hidden; float: right;">
                <p class="TextInformation">Michael Hatzipavlis 21.7.2019</p>
            </div>
			
		</div>

</body>

</html>
