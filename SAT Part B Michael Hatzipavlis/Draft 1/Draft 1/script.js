var passwordTXT = new XMLHttpRequest();
console.log("Is the script connected");

function CheckPassword() {

	var str_username = document.getElementById("username").value;
	var str_password = document.getElementById("password").value;

	console.log("Check Password");
	console.log(str_username);
	console.log(str_password);
	document.getElementById("username").value = "";
	document.getElementById("password").value = "";

	if (str_username == "1234" && str_password == "1234") {
		window.location.href = "mainPage.html";
	}
}


