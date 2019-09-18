<?php
	//Connects the php document to the database
	include 'connect.php';
	//Connects the encryption.php document to this document
	include 'Encryption.php';
	//Gets the variables that have been posted, username, email and password.
	$username = $_POST['username'];
	$email = $_POST['email'];
	$passwordNotHashed = $_POST['password'];
	//Hashes the password that has been posted
	$password = hash_sha1($passwordNotHashed);
	//Strips the slashes from the username to prevent attacks
	$username = stripcslashes($username);

	//Validation errors that need to be meet
	$nameSymbolsValidation = false;
	$emailValidation = false;
	$passwordStrengthValidation = false;

	//Validation for the name when making an account
	if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
	  echo "Invalid name format, only letters and white space allowed";
		$nameSybolsValidation = true;
	}

	//Validation for the email when making an account
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  echo "Invalid email format";
		$emailValidation = true;
	}

	// Validate password strength
	$uppercase = preg_match('@[A-Z]@', $passwordNotHashed);
	$lowercase = preg_match('@[a-z]@', $passwordNotHashed);
	$number    = preg_match('@[0-9]@', $passwordNotHashed);
	$specialChars = preg_match('@[^\w]@', $passwordNotHashed);

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($passwordNotHashed) < 8) {
	    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
			$passwordStrengthValidation = true;
	}else{
	    echo 'Strong password.';
	}

	if($nameSymbolsValidation == true && $emailValidation == true && $passwordStrengthValidation == true) {
		header("Location: registerPage.php?err=1");
	} else if ($nameSymbolsValidation == true && $emailValidation == true) {
		header("Location: registerPage.php?err=2");
	} else if ($emailValidation == true && $passwordStrengthValidation == true) {
		header("Location: registerPage.php?err=3");
	} else if ($nameSymbolsValidation == true && $passwordStrengthValidation == true) {
		header("Location: registerPage.php?err=4");
	} else if ($nameSymbolsValidation == true) {
		header("Location: registerPage.php?err=5");
	} else if ($emailValidation == true) {
		header("Location: registerPage.php?err=6");
	} else if ($passwordStrengthValidation == true) {
		header("Location: registerPage.php?err=7");
	} else {
		$sql = "INSERT INTO users (Username,Email,Password,userClass,validMember)
		VALUES ('$username','$email','$password','Member','0')";

		if (mysqli_query($con, $sql)) {
				 header("Location: index.php");
    } else {
       header("Location: index.php?err=6");
    }
	}
?>
