/*var canvas = document.getElementById("canvas");
context = canvas.getContext("2d");
*/
var passwordTXT = new XMLHttpRequest();
console.log("Is the script connected");

/*drawStuff();*/

//help

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

console.log("Change backgroundImage")


/*function drawStuff() {
	console.log("drawStuff");
	context.beginPath();
  	context.rect(300, 50, 800, 150);
  	context.strokeStyle = "#E9C46A"
  	context.lineWidth = 10;
  	context.stroke();
  	context.fillStyle = "#264653";
  	context.fill();
  	context.font = "30px Arial";
  	context.fillStyle = "#E9C46A"
  	context.fillText("Crew Scheduler Login", 550, 125);
  	context.closePath();



}


*/