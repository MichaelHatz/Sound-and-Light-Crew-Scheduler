var timeInterval = 5;

var parts = window.location.search.substr(1).split("&");
var $_GET = {};
for (var i = 0; i < parts.length; i++) {
    var temp = parts[i].split("=");
    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
}

var errorCode = ($_GET['err']);
var d = new Date();
var monthDate = d.getMonth();
console.log(arr);
//Setting the events on the page

// document.getElementById("event1").innerHTML = "<?php echo $informationDates[1]; ?>";
// document.getElementById("event2").innerHTML = "<?php echo $informationDates[2]; ?>";
// document.getElementById("event3").innerHTML = "<?php echo $informationDates[3]; ?>";
// document.getElementById("event4").innerHTML = "<?php echo $informationDates[4]; ?>";
// document.getElementById("event5").innerHTML = "<?php echo $informationDates[5]; ?>";
// document.getElementById("event6").innerHTML = "<?php echo $informationDates[6]; ?>";

$(document).ready(function() {

  if (errorCode == 1) {
    $("#EventMain").show();
    $("#CalendarMain").hide();
    $("#DocumentationMain").hide();
    $("#Settings").hide();
  } else if (errorCode == 2 || errorCode == 3) {
    $("#Settings").show();
    $("#CalendarMain").hide();
    $("#DocumentationMain").hide();
    $("#EventMain").hide();
  }


  $('#MonthUp').click(function() {

    monthDate += 1;
    leadingZeroMonth = ('0' + monthDate).slice(-2);

    $.ajax({
        url: 'calendarProcess.php',
        type: 'POST',
        data: {
            increaseMonth: leadingZeroMonth,
        },
        success: function(msg) {

        }
    });
  });

  $('#MonthDown').click(function() {

  });


  $("#Schedule").click(function() {
      $("#CalendarMain").fadeIn();
      $("#DocumentationMain").fadeOut();
      $("#EventMain").fadeOut();
      $("#Settings").fadeOut();
  });

  $("#Documentation").click(function() {
    $("#DocumentationMain").fadeIn();
    $("#CalendarMain").fadeOut();
    $("#EventMain").fadeOut();
    $("#Settings").fadeOut();
  });

  $("#Events").click(function() {
    $("#EventMain").fadeIn();
    $("#CalendarMain").fadeOut();
    $("#DocumentationMain").fadeOut();
    $("#Settings").fadeOut();
  });

  $("#SettingsSideBar").click(function() {
    $("#Settings").fadeIn();
    $("#CalendarMain").fadeOut();
    $("#DocumentationMain").fadeOut();
    $("#EventMain").fadeOut();
  });

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
