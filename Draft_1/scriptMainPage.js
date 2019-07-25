var timeInterval = 5;

$(document).ready(function() {
  $("#Schedule").click(function() {
      console.log("Making the calendar class appear");
      $("#CalendarMain").fadeIn();
  });

  $("#Documentation").click(function() {
    $("#CalendarMain").fadeOut();
    $("#DocumentationMain").fadeIn();
  });
});
