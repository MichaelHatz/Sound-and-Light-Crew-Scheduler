var timeInterval = 5;



$(document).ready(function() {
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
