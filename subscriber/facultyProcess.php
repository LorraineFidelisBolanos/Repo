<!--process for faculty-->
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
		$Cellphone_Number   =  $_POST["cellphone"];
		
		//insert into database
		$query="INSERT INTO faculty(First_Name, Last_Name, Cellphone_Number)
			VALUES('$First_Name','$Last_Name','$Cellphone_Number')";
			$execute = mysql_query($query);
		
		if($execute){
			echo "Your message has been posted!</br>";
			}
		else{
			echo "Your message has not been posted!</br>";
			}
			
			@mysql_close();
		?>
		
		
		