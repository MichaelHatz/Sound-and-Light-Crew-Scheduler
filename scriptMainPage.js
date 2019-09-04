var parts = window.location.search.substr(1).split("&");
var $_GET = {};
for (var i = 0; i < parts.length; i++) {
    var temp = parts[i].split("=");
    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
}

//Get the ID of the page, this is so in Jquery we can redirect the page if we need to
var pageID = ($_GET['pg']);
//Define a new Date variable
var d = new Date();
//Get the current month
var monthDate = d.getMonth();
//Get the current year
var yearDate = d.getFullYear();

//The names of the months according to a index
const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];


$(document).ready(function() {

  //Set the date for the year
  $('#idCurrentMonth').html(monthNames[monthDate] + " " + yearDate);

  if (pageID == 1) {
    $("#EventMain").show();
    $("#CalendarMain").hide();
    $("#DocumentationMain").hide();
    $("#Settings").hide();
  } else if (pageID == 2 || pageID == 3) {
    $("#Settings").show();
    $("#CalendarMain").hide();
    $("#DocumentationMain").hide();
    $("#EventMain").hide();
  }

  //Month up function when the button has been pressed
  $('#MonthUp').click(function() {
    //Increae the month if the function is called
    monthDate += 1;
    //This adds a 0 infront of the digit if it is 1 character to make it 2
    leadingZeroMonth = ('0' + monthDate).slice(-2);

    if (monthDate > 11) {
      monthDate = 0;
      yearDate += 1
      $('#idCurrentMonth').html(monthNames[monthDate] + " " + yearDate)
    } else {
      $('#idCurrentMonth').html(monthNames[monthDate] + " " + yearDate)
    }
    //ajax send a request to the server without refreshing the page
    $.ajax({
        url: 'calendarProcess.php',
        type: 'POST',
        data: {
            increaseMonth: leadingZeroMonth,
            increaseYear: yearDate,
        },
        success: function(result) {
          var array = JSON.parse(result);
          for (var i = 0; i < array.length; i++) {
            $('#event'+i).html(array[i]);

          }
        }
    });
  });

  $('#MonthDown').click(function() {

    monthDate -= 1;
    leadingZeroMonth = ('0' + monthDate).slice(-2);

    if (monthDate < 0) {
      monthDate = 11;
      yearDate -= 1;
      $('#idCurrentMonth').html(monthNames[monthDate] + " " + yearDate)
    } else {
      $('#idCurrentMonth').html(monthNames[monthDate] + " " + yearDate)
    }

    $.ajax({
        url: 'calendarProcess.php',
        type: 'POST',
        data: {
            increaseMonth: leadingZeroMonth,
            increaseYear: yearDate,
        },
        success: function(result) {
          var array = JSON.parse(result);
          for (var i = 0; i < array.length; i++) {
            $('#event'+i).html(array[i]);

          }

        }
    });
  });
  //Fades out everything and fades in the calenar menu
  $("#Schedule").click(function() {
      $("#CalendarMain").fadeIn();
      $("#DocumentationMain").fadeOut();
      $("#EventMain").fadeOut();
      $("#Settings").fadeOut();
  });
  //Fades out everything and fades in the documentation menu
  $("#Documentation").click(function() {
    $("#DocumentationMain").fadeIn();
    $("#CalendarMain").fadeOut();
    $("#EventMain").fadeOut();
    $("#Settings").fadeOut();
  });
  //Fades out everything and fades in the event menu
  $("#Events").click(function() {
    $("#EventMain").fadeIn();
    $("#CalendarMain").fadeOut();
    $("#DocumentationMain").fadeOut();
    $("#Settings").fadeOut();
  });
  //Fades out everything and fades in the settings menu
  $("#SettingsSideBar").click(function() {
    $("#Settings").fadeIn();
    $("#CalendarMain").fadeOut();
    $("#DocumentationMain").fadeOut();
    $("#EventMain").fadeOut();
  });
  //Reveals the documentation when the menu has been clicked
  $("#WebsiteHeading").click(function() {
  	$("#WebsiteBody").toggle();
  });
  $("#BioBoxHeading").click(function() {
  	$("#BioBoxBody").toggle();
  });
  $("#CrewCallsHeading").click(function() {
  	$("#CrewCallsBody").toggle();
  });
  $("#MissionStatementHeading").click(function() {
    $("#MissionStatementBody").toggle();
  });
});
