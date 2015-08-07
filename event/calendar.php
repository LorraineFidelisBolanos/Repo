<p>

<?php
	if(!empty($_POST)) {
		
		$dbhost="localhost";
		$dbuser="itech";
		$dbpassword="itech123.A";
		$dbname="sms";
		
		//connection to the database
		$connect=mysql_connect($dbhost, $dbuser, $dbpassword) or die("could not connect to database");
		
		
		//select database to work with
		mysql_select_db($dbname);
		
		date_default_timezone_set("Asia/Manila");
		
		//variables that hold input values
		$what		=	$_POST["what"];
		$location	=	$_POST["where"];
		$year		=	$_POST["year"];
		$month		=	$_POST["month"];
		$day		=	$_POST["day"];
		$hour		=	$_POST["hour"];
		$minute		=	$_POST["minute"];
		$subscriber	=	$_POST["subscriber"];
		$eventType	=	$_POST["eventType"];
		$datePosted	=	date("Y-m-d H:i:s", time());
		$eventDateTime = strtotime($month . " " . $day . ", " . $year . " " . $hour.':'.$minute);
		$eventDate	=	date("Y-m-d", $eventDateTime);
		$eventTime	=	date("H:i:s", $eventDateTime);
		
		//insert data into database
		$query= "INSERT INTO event(what,location,eventDate,eventTime,subscriber,eventType,datePosted) 
				VALUES('$what','$location','$eventDate','$eventTime','$subscriber','$eventType','$datePosted')";
		$execute= mysql_query($query);
		
		if($execute){
			echo "Your message has been posted!</br>";	
			}
		else{
			echo "Your message has not been posted!</br>";
		}
		//close connection
		@mysql_close();
		}
?>
<a href="event.php">Back</a>
<form action="eventCalendar.php" method="post">

</form>