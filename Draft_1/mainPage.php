<?php
	include_once 'calendarProcess.php';
?>


<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css" href="mainPageStyle.css">
	<head>
		<title>Sound and Light Crew Scheduling</title>
	</head>
	<body>
		<main>
		    <div class="toolbar">
		      <div class="toggle">
		      </div>
		      <div class="current-month">June 2016</div>
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
		      <div class="calendar__week">
		        <div class="calendar__day day">
		        	1<br><?php echo $Day1; ?>
		        </div>
		        <div class="calendar__day day">
		        	2<br><?php echo $Day2; ?>
		        </div>
		        <div class="calendar__day day">3</div>
		        <div class="calendar__day day">4</div>
		        <div class="calendar__day day">5</div>
		        <div class="calendar__day day">6</div>
		        <div class="calendar__day day">7</div>
		      </div>
		      <div class="calendar__week">
		        <div class="calendar__day day">8</div>
		        <div class="calendar__day day">9</div>
		        <div class="calendar__day day">10</div>
		        <div class="calendar__day day">11</div>
		        <div class="calendar__day day">12</div>
		        <div class="calendar__day day">13</div>
		        <div class="calendar__day day">14</div>
		      </div>
		      <div class="calendar__week">
		        <div class="calendar__day day">15</div>
		        <div class="calendar__day day">16</div>
		        <div class="calendar__day day">17</div>
		        <div class="calendar__day day">18</div>
		        <div class="calendar__day day">19</div>
		        <div class="calendar__day day">20</div>
		        <div class="calendar__day day">21</div>
		      </div>
		      <div class="calendar__week">
		        <div class="calendar__day day">22</div>
		        <div class="calendar__day day">23</div>
		        <div class="calendar__day day">24</div>
		        <div class="calendar__day day">25</div>
		        <div class="calendar__day day">26</div>
		        <div class="calendar__day day">27</div>
		        <div class="calendar__day day">28</div>
		      </div>
		      <div class="calendar__week">
		        <div class="calendar__day day">29</div>
		        <div class="calendar__day day">30</div>
		        <div class="calendar__day day">31</div>
		        <div class="calendar__day day">1</div>
		        <div class="calendar__day day">2</div>
		        <div class="calendar__day day">3</div>
		        <div class="calendar__day day">4</div>
		      </div>
		    </div>
		  </main>



	<!--
		<canvas id="canvas" width="1500" height="1080"></canvas>

		<script type="text/javascript">
			var canvas = document.getElementById("canvas");
			context = canvas.getContext("2d");
			//
			// window.addEventListener('resize', resizeCanvas, false);



  			function drawStuff() {

  				for (var i = 0; i < 9; i++) {
  					context.font = "15px Arial";
            var time = 8+i;
  					context.fillText(`${time}:00`, 500 + (100 * i), 650);
  				}


  			for (var i = 0; i < 9; i++) {
  				context.beginPath();
  				context.moveTo(500 + (100 * i),20);
  				context.lineTo(500 + (100 * i),620);
  				context.strokeStyle = "gray";
					context.stroke();
          context.closePath();
  			}

  			context.strokeStyle = "black";
  			context.strokeRect(400, 20, 1000, 600);



  				//First event
				context.beginPath();
  			context.moveTo(400, 90);
  			context.lineTo(1400, 90);
  			context.stroke();

				context.fillStyle = "#FFBD33";
				context.fillRect(500, 40, 800, 100);

				//Second event
				context.beginPath();
  			context.moveTo(400, 210);
  			context.lineTo(1400, 210);
  			context.stroke();

  			context.fillStyle = "#FFBD33";
				context.fillRect(500, 160, 800, 100);

				//Third event
				context.beginPath();
				context.moveTo(800, 330);
				context.lineTo(1400, 330);
				context.stroke();

				context.fillStyle = "#FFBD33";
				context.fillRect(500, 160, 800, 100);

  			}

				setInterval(function() {

							canvas.width = window.innerWidth;
							canvas.height = window.innerHeight;

							// Redraw everything after resizing the window
							drawStuff();

        }, 1000);

		</script>

		<div class="hot-container">
               <p>
                  <a href="index.html" class="btn">Log Out</a>
               </p>
        </div> -->
	</body>
</html>
