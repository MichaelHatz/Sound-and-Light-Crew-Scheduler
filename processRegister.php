<?php

	include 'connect.php';
	include 'Encryption.php';

	$username = $_POST['username'];
	$email = $_POST['email'];
	$passwordNotHashed = $_POST['password'];

	$password = hash_sha1($passwordNotHashed);


	$username = stripcslashes($username);

	//Validation for the name when making an account
	if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
	  echo "Invalid name format, only letters and white space allowed";
	}

	//Validation for the email when making an account
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  echo "Invalid email format";
	}

	// Validate password strength
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
	    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
	}else{
	    echo 'Strong password.';
	}

	$sql = "INSERT INTO users (Username,Email,Password,userClass,validMember)
	VALUES ('$username','$email','$password','Member','0')";

	if (mysqli_query($con, $sql)) {
       echo "New record created successfully";
			 header("Location: ../SoundandLightCrewScheduler/index.php");
    } else {
       header("Location: ../SoundandLightCrewScheduler/index.php?err=6");
    }



?>
