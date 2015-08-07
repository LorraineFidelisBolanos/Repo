<!--process for itech-->
	<?php
		$dbhost="localhost";
		$dbuser="itech";
		$dbpassword="itech123.A";
		$dbname="sms";
		
		//connection to database
		$connect=mysql_connect($dbhost, $dbuser, $dbpassword) or die ("could not connect to database");
		echo"Connected!";
		
		//select database to work with
		mysql_select_db($dbname);
		
		//variable that hold input values
		$First_Name 	    =  $_POST["firstname"];
		$Last_Name 	        =  $_POST["lastname"];
		$Year_and_Section   =  $_POST["yrSec"];
		$Cellphone_Number   =  $_POST["cellphone"];
		$Position		    =  $_POST["position"];
		
		//insert into database
		$query="INSERT INTO itech_officer(First_Name, Last_Name, Year_and_Section, Cellphone_Number, Position)
			VALUES('$First_Name','$Last_Name', '$Year_and_Section', '$Cellphone_Number', '$Position')";
			$execute = mysql_query($query);
		
		if($execute){
			echo "Your message has been posted!</br>";
			}
		else{
			echo "Your message has not been posted!</br>";
			}
			
			@mysql_close();
		?>
		
		
		