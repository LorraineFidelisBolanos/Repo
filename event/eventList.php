<?php
		$dbhost="localhost";
		$dbuser="itech";
		$dbpassword="itech123.A";
		$dbname="sms";
		
		//connection to the database
		$connect=mysql_connect($dbhost, $dbuser, $dbpassword) or die("could not connect to database");
		
		
		//select database to work with
		mysql_select_db($dbname);
		$arrayOfEvents=array();
		$query = "SELECT * FROM event ORDER BY eventDate DESC";
		$execute = mysql_query($query);
	
		while ($row=mysql_fetch_assoc($execute)){
			
			$arrayOfEvents[$row['eventDate']][]=$row;
			
			}
			var_dump($arrayOfEvents);
?>