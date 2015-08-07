<html>
	<head>
	<link rel="stylesheet" type="text/css" href="event.css"/>
	</head>
	<body>
		<div class="wrapper">
			<div class="eventWrapper">
				<div class="event">
					<?php
						include("table.php");
					?>
				</div>
				<div class="viewEvent">
				View
					<form method="post" action="view.php">
					<center><input type="submit" value="VIEW EVENTS"></center>
					</form>
					
				</div>
			</div>
				<div class="calendarWrapper">
				
					<div class="inputMonth">
						<center>Event Calendar</br>
						<form method="GET" action="#">
						<select name="monthsOfTheYear">
								<?php
									$months	=array('-Select Month-','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
										'September', 'October', 'November', 'December');
										foreach($months as $monthsValue){
											echo '<option value="'.$monthsValue.'">'.$monthsValue.'</option>';
										}
								?>
								<input type="submit" value="OK">	
						</select>
					</form>
					</div>
					
					<div name="showCalendar">
						Calendar
						<?php
							include("eventCalendar.php");
						?>
					</div>
				</div>
				</div>
		</div>
	</body>
</html>
	