<?php
	
	$dbhost="localhost";
		$dbuser="itech";
		$dbpassword="itech123.A";
		$dbname="sms";
		
		//connection to the database
		$connect=mysql_connect($dbhost, $dbuser, $dbpassword) or die("could not connect to database");
		
		date_default_timezone_set("Asia/Manila");
		//select database to work with
		mysql_select_db($dbname);
		//array of events
		$arrayOfEvents = array();
		$query = "SELECT id, what, eventDate FROM event ORDER BY eventDate DESC";
		$execute = mysql_query($query);
			
			//foreach($months as $monthsValue){
			//echo '<option value="'.$monthsValue.'">'.$monthsValue.'</option>';
	
	include("puppy.php");
	$Calendar	=	new PuppyCalendar();
	
	
	
			//month to display
	if(!isset($_GET["monthsOfTheYear"])) {
		$monthToDisplay = date("F", time());
	} else {
		$monthToDisplay = $_GET["monthsOfTheYear"];
	}
		
	switch ($monthToDisplay){
		case "January":
			print("January");
			$Calendar->setMonth(1);
			break;
		case "February":
			print("February");
			$Calendar->setMonth(2);
			break;
		case "March":
			print("March");
			$Calendar->setMonth(3);
			break;
		case "April":
			print("April");
			$Calendar->setMonth(4);
			break;
		case "May":
			print("May");
			$Calendar->setMonth(5);
			break;
		case "June":
			print("June");
			$Calendar->setMonth(6);
			break;
		case "July":
			print("July");
			$Calendar->setMonth(7);
			break;
		case "August":
			print("August");
			$Calendar->setMonth(8);
			break;
		case "September":
			print("September");
			$Calendar->setMonth(9);
			break;
		case "October":
			print("October");
			$Calendar->setMonth(10);
			break;
		case "November":
			print("November");
			$Calendar->setMonth(11);
			break;
		case "December":
			print("December");
			$Calendar->setMonth(12);
			break;

	}

	$Calendar->build();
	$cDays	=	$Calendar-> getCalendarDays();
	
	
	//Make our own calendar!
	$eventCalendar	=	array();
	
	//Fill in the blank days
	for($i=0;$i<$cDays[0]["DayRepNo"];$i++){
		array_push($eventCalendar, " ");
	}
	
	//Append calendar days
		for($i=0;$i<count($cDays);$i++){
			array_push($eventCalendar, $cDays[$i]["Number"]);
		}
	//Print Table
	echo	'<table class="calendarTable">
		<tr style="font-weight:bold;">
			<td>Sunday</td>
			<td>Monday</td>
			<td>Tuesday</td>
			<td>Wednesday</td>
			<td>Thursday</td>
			<td>Friday</td>
			<td>Saturday</td>
		</tr><tr>';
		
		$ROW = 1;
		for($i=0;$i<count($eventCalendar);$i++){
			echo '<td style="width:100px;height:100px;">';
			
			//print day
			echo $eventCalendar[$i] . "<br/>";
			
			// 2014
			$currentYeeeeeeear = date("Y", time());
			
			// February X, 2014
			$safkjgkj = date("Y-m-d", strtotime($monthToDisplay . " " . $eventCalendar[$i] . ", " . $currentYeeeeeeear));
			
			if($eventCalendar[$i] != ' ') {
				$check_events = mysql_query("SELECT * FROM event WHERE eventDate='" . $safkjgkj . "'");
				while($data = mysql_fetch_array($check_events)) {
					echo '<a href="javascript:void(0);"  onclick="window.open(\'eventinfo.php?id=' . $data['id'] . '\',\'EventInfo\',\'top=100,left=300,height=300,width=300\');">' . $data["what"] . "</a>";
					echo '<br/>';
				}
			}
			
			echo '</td>';
			
			//new row
			if(($i+1)%7==0) {
				$ROW++;
				echo '</tr><tr';
				if($ROW % 2 == 0) echo ' style="background:#cceeff;"';
				echo '>';
			}
		}
		
	echo	'</table>';
?>