<?php
	session_start();
	include_once 'calendarProcess.php';


	//This is the function for redirecting to the index page
	function redirect($DoDie = true) {
		header('Location: index.php');
		if ($DoDie)
				die();
	}

	//If user isn't logged in redirect towards the home page
	if(!isset($_SESSION['user_id'])) {
		redirect();
	}

	$errors = array (
			//First error is for nothing
      0 => "",
			//Following errors are for event information
      1 => "Incorrect event information, information is highlighted in red",
			4 => "Please have event attendies that are part of the Sound and Light Crew",
			//Following errors are for settings information
			2 => "Passwords entered are not the same",
			3 => "Password entered is the same as original password"
  );

  $error_id = isset($_GET['pg']) ? (int)$_GET['pg'] : 0;

	print_r($informationDates);
?>


<!DOCTYPE html>
<html>
	<!-- Link to jquery for the javascript files -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


	<!-- Link to all the css files -->
	<link rel="stylesheet" type="text/css" href="mainPageStyle.css">
	<link rel="stylesheet" type="text/css" href="toolbar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<head>
		<!-- Title at the top of the webpage -->
		<title>Sound and Light Crew Scheduling</title>
	</head>
	<body>

		<nav class="menu" tabindex="0">
			<div class="smartphone-menu-trigger"></div>
		  <header class="avatar">
				<!-- Avatar picture and the member name -->
				<img src="https://i.pravatar.cc/300" />
		    <h2 style="text-decoration: underline;"><?php echo $_SESSION['user_id'] ?></h2>
		  </header>
			<ul>
				<!-- Side menu with the buttons that take you to the documentation, schedule, events and more -->
		    <a id="Schedule"><li tabindex="0" class="icon-dashboard"><span>Schedule</span></li></a>
		    <a id="Documentation"><li tabindex="0" class="icon-customers"><span>Documentation</span></li></a>
		    <a id="Events"><li tabindex="0" class="icon-users"><span>Events</span></li></a>
		    <a id="SettingsSideBar"><li tabindex="0" class="icon-settings"><span>Settings</span></li></a>
				<a href="logout.php"><li tabindex="0" class="icon-users"><span>Logout</span></li></a>
		  </ul>
		</nav>




		<main id="CalendarMain">
		    <div class="toolbar">
		      <div class="toggle">
		      </div>
					<div style="width: 40%;">
						<button class="MonthDecrease" id="MonthDown">Previous Month</button>
						<div class="current-month">July 2019</div>
						<button class="MonthIncrease" id="MonthUp" Onclick="" >Next Month</button>
					</div>
		      <div class="search-input">
		        <input type="text" value="What are you looking for?">
		        <i class="fa fa-search"></i>
		      </div>
		    </div>
		    <div class="calendar">
		      <div class="calendar__header">
		        <div>mon</div>
		        <div>tue</div>
		        <div>wed</div>
		        <div>thu</div>
		        <div>fri</div>
		        <div>sat</div>
		        <div>sun</div>
		      </div>
		      <div class="calendar__week" id="calendarWeek">
		        <div class="calendar__day day">
		        	1<br class="breakNumber"><div class="event" id="event1"> <?php echo $informationDates[1]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	2<br class="breakNumber"><div class="event" id="event2"> <?php echo $informationDates[2]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	3<br class="breakNumber"><div class="event" id="event3"> <?php echo $informationDates[3]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	4<br class="breakNumber"><div class="event" id="event4"> <?php echo $informationDates[4]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	5<br class="breakNumber"><div class="event" id="event5"> <?php echo $informationDates[5]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	6<br class="breakNumber"><div class="event" id="event6"> <?php echo $informationDates[6]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	7<br class="breakNumber"><div class="event" id="event7"> <?php echo $informationDates[7]; ?> </div>
		        </div>
		      </div>
		      <div class="calendar__week">
		        <div class="calendar__day day">
		        	8<br class="breakNumber"><div class="event"> <?php echo $informationDates[8]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	9<br class="breakNumber"><div class="event"> <?php echo $informationDates[9]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	10<br class="breakNumber"><div class="event"> <?php echo $informationDates[10]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	11<br class="breakNumber"><div class="event"> <?php echo $informationDates[11]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	12<br class="breakNumber"><div class="event"> <?php echo $informationDates[12]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	13<br class="breakNumber"><div class="event"> <?php echo $informationDates[13]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	14<br class="breakNumber"><div class="event"> <?php echo $informationDates[14]; ?> </div>
		        </div>
		      </div>
		      <div class="calendar__week">
		        <div class="calendar__day day">
		        	15<br class="breakNumber"><div class="event"> <?php echo $informationDates[15]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	16<br class="breakNumber"><div class="event"> <?php echo $informationDates[16]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	17<br class="breakNumber"><div class="event"> <?php echo $informationDates[17]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	18<br class="breakNumber"><div class="event"> <?php echo $informationDates[18]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	19<br class="breakNumber"><div class="event"> <?php echo $informationDates[19]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	20<br class="breakNumber"><div class="event"> <?php echo $informationDates[20]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	21<br class="breakNumber"><div class="event"> <?php echo $informationDates[21]; ?> </div>
		        </div>
		      </div>
		      <div class="calendar__week">
		        <div class="calendar__day day">
		        	22<br class="breakNumber"><div class="event"> <?php echo $informationDates[22]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	23<br class="breakNumber"><div class="event"> <?php echo $informationDates[23]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	24<br class="breakNumber"><div class="event"> <?php echo $informationDates[24]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	25<br class="breakNumber"><div class="event"> <?php echo $informationDates[25]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	26<br class="breakNumber"><div class="event"> <?php echo $informationDates[26]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	27<br class="breakNumber"><div class="event"> <?php echo $informationDates[27]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	28<br class="breakNumber"><div class="event"> <?php echo $informationDates[28]; ?> </div>
		        </div>
		      </div>
		      <div class="calendar__week">
		        <div class="calendar__day day">
		        	29<br class="breakNumber"><div class="event"> <?php echo $informationDates[29]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	30<br class="breakNumber"><div class="event"> <?php echo $informationDates[30]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	31<br class="breakNumber"><div class="event"> <?php echo $informationDates[31]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	1<br class="breakNumber"><div class="event"> <?php echo $informationDates[32]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	2<br class="breakNumber"><div class="event"> <?php echo $informationDates[33]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	3<br class="breakNumber"><div class="event"> <?php echo $informationDates[34]; ?> </div>
		        </div>
		        <div class="calendar__day day">
		        	4<br class="breakNumber"><div class="event"> <?php echo $informationDates[35]; ?> </div>
		        </div>
		      </div>
		    </div>
		</main>

		<main id="DocumentationMain" style="display: none">
			<div>
				<div class="collapsedSubHeading" id="MissionStatementHeading">
					Mission Statement
				</div>
				<div class="collapsedBodyParagraph" id="MissionStatementBody" style="display: none">
					<div style="padding: 10px; text-align: justify;">
						Hello. Here at the Sound and Light Crew, we aim to provide Balwyn High School students an insight into the intricacies of the Audio-Visual field. Students who are part of the Sound and Light Crew will leave high school with experience working with stage lighting, sound design, and DSLR cameras. The crew provides a positive working enviroment, and is a great opportunity for Balwyn High students with an interest in the AV field to get some hands-on experience.
					</div>
					<br style="line-height: 30px;">
					- Rein Kivivali, Audio Visual Technition, Head of Sound and Light Crew.
				</div>
			</div>
			<br>
			<div>
				<div class="collapsedSubHeading" id="WebsiteHeading">
					Using the website
				</div>
				<div class="collapsedBodyParagraph" id="WebsiteBody" style="display: none">
					<div style="padding: 10px; text-align: justify;">
						Firstly I would like to thank you for using the Sound and Light Crew Scheduling website, learning how to use the program is quite simple. Firstly on the left sidebar, you will find the menus for the website ranging from the schedule, to documentation and settings. You can access these menus by clicking on them and then you can access the appropriate menus from that. On the right hand side you will find further information relating to the selected field.
					</div>
				</div>
			</div>
			<br>
			<div>
				<div class="collapsedSubHeading" id="BioBoxHeading">
					BioBox
				</div>
				<div class="collapsedBodyParagraph" id="BioBoxBody" style="display: none">
					<div style="padding: 10px; text-align: justify;">

					</div>
				</div>
			</div>
			<br>
			<div style="margin-bottom: 40px;">
				<div class="collapsedSubHeading" id="CrewCallsHeading">
					Crew Calls
				</div>
				<div class="collapsedBodyParagraph" id="CrewCallsBody" style="display: none">
					<div style="padding: 10px; text-align: justify;">
						The Sound and Light crew take their crew calls very seriously. Information regarding Crew Calls can be found on the School email, once accepted information will be displayed on the Scheduler. A crew member can decline a crew call but must reason for doing so. If a crew member does not give an appropriate reason, they may be interviewed further. When responding to the crew calls, please don't press "tentative".
					</div>
					<br style="line-height: 30px;">
					<div style="padding: 10px; text-align: justify;">
						- Joseph Seery, Sound and Light Crew Captain.
					</div>
				</div>
			</div>


		</main>

		<main id="EventMain" style="display: none">
			<form id="EventForm" method="post" action="processEvent.php">
				<h2>Events</h2>
				<br>
				<h4>Start Date of the Event:</h4>
				<input type="date" name="startDate"></input>
				<br>
				<h4>Start Time of the Event:</h4>
				<input type="time" name="startTime"></input>
				<br>
				<h4>End Time of the Event:</h4>
				<input type="time" name="endTime"></input>
				<br>
				<h4>Event Description:</h4>
				<input type="text" name="eventDescription"></input>
				<br>
				<h4>People attending the event:</h4>
				<input type="text" name="users"></input>
				<p id="errorBoxEvent" class="errorBox"></p>
				<br>
				<br>
				<input type="button" name="submitEvent" onclick="document.getElementById('EventForm').submit();" value="Submit" />
			</form>

			<div class="Users">
				<h2>Members</h2>
				<br>
				<form id="UserAction" method="post" action="processMembers.php">
					<?php echo $MemberList ?>
				</form>
			</div>
		</main>

		<main id="Settings" style="display: none">
			<h2>Settings</h2>
			<br>
			<form id="SettingsForm" method="post" action="processSetting.php">
				<h4>Username:</h4>
				<input type="text" name="username" value="<?php echo $username ?>"></input>
				<br>
				<h4>Password:</h4>
				<input type="password" name="password"></input>
				<br>
				<h4>Repeat Password:</h4>
				<input type="password" name="repeatedPassword"></input>
				<br>
				<h4>Email:</h4>
				<!-- Add value to the input box for the email -->
				<input type="text" name="userEmail" value="<?php echo $_SESSION['user_email'] ?>"></input>
				<br>
				<br>
				<input type="button" name="submitEvent" onclick="document.getElementById('SettingsForm').submit();" value="Submit" />
			</form>
		</main>

		<script type="text/javascript">
			var accountlevel = "<?php echo $userclass; ?>";

			var el = document.getElementById("EventMain");
			var elsidebar = document.getElementById("Events");

			if (accountlevel == "Member") {
				elsidebar.remove();
				el.remove();
			} else {

			}



		</script>

	</body>
	<!-- Link to the javacript files -->
	<script type="text/javascript">
		var arr = "<?php json_encode($informationDates); ?>";

		for(var i=0;i<12;i++){
        alert(arr[i]);
    }
	</script>
	<script src="scriptMainPage.js"></script>
</html>
