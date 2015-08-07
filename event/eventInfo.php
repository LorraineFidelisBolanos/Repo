<html>
<header>
	<link rel="stylesheet" type="text/css" href="event.css"/>
</header>


<?php
$dbhost="localhost";
$dbuser="itech";
$dbpassword="itech123.A";
$dbname="sms";

$connect=mysql_connect($dbhost, $dbuser, $dbpassword) or die("Not connected!");


	mysql_select_db($dbname);
	
	$id=$_GET['id'];
	$execute=mysql_query("SELECT * FROM event WHERE id='$id'");
	
	while($row=mysql_fetch_array($execute)){
		
		echo '<div class="eventInfo">';
		echo "<b>What:</b>"." ".$row['what']."<br/>";
		echo "<b>Where:</b>"." ".$row['location']."<br/>";
		echo "<b>When:</b>"." ".$row['eventDate']." "."@"." ".$row['eventTime']."<br/>";
		echo "<b>Who:</b>"." ".$row['subscriber']."<br/>";
		echo'</div>';
	}
	


?>
</html>