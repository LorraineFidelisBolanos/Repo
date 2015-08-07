<?php
date_default_timezone_set("Asia/Manila");
include("puppy.php");

$calendar = new PuppyCalendar();


$calendar->build();
$cDays = $calendar->getCalendarDays();


// Make our own calendar!
$MyCalendar = array();

// Fill in blank days
for($i = 0; $i < $cDays[0]["DayRepNo"]; $i++) {
	array_push($MyCalendar, "-");
}

// Append Calendar Days
for($i = 0; $i < count($cDays); $i++) {
	array_push($MyCalendar, $cDays[$i]["Number"]);
}


// Print Table
echo '<table border="1" class="robartstable">
<tr>
	<td>Sun</td>
	<td>Mon</td>
	<td>Tue</td>
	<td>Wed</td>
	<td>Thu</td>
	<td>Fri</td>
	<td>Sat</td>
</tr>
<tr>';
for($i = 0; $i < count($MyCalendar); $i++) {
	
	echo '<td style="text-align:center;width:100px;height: 100px;">';
	
	// Print Day
	echo $MyCalendar[$i];
	
	// Check Event
	if($MyCalendar[$i] == 11) {
		echo "<br/>Robert's Birthday!";
	}
	
	echo '</td>';
	
	// New Row
	if(($i + 1) % 7 == 0) echo '</tr><tr>';
}
echo '</tr></table>';

	var_dump($calendar);
?>

'what'=>$row["what"],
					'where'=>$row["location"],
					'when'=>$row["eventDate"]."@".$row["eventTime"],
					'who'=>$row["subscriber"]