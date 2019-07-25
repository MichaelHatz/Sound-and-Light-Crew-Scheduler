var timeInterval = 5;

$(document).ready(function() {
  $("#Schedule").click(function() {
      $("#CalendarMain").fadeIn();
      $("#DocumentationMain").fadeOut();
      $("#EventMain").fadeOut();

  });

  $("#Documentation").click(function() {
    $("#CalendarMain").fadeOut();
    $("#DocumentationMain").fadeIn();
    $("#EventMain").fadeOut();
  });

  $("#Events").click(function() {
    $("#CalendarMain").fadeOut();
    $("#DocumentationMain").fadeOut();
    $("#EventMain").fadeIn();
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

});
