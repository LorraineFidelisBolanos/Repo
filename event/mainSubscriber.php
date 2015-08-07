<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
	
</head>
<body>


<div class="up">
<br>

										<form action="mainSubscriber.php" method="get" >
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subscriber: <select size="1" name="subscriber">
												 <option disabled selected>-Select Subscriber-</option>
												 <option value="1">Faculty</option>
												 <option value="2">Itech Officer</option>
												 <option value="3">Student</option>
												 </select>
											<input type="submit" value="OK">
										</form>
</div>	

<div class="down">
	<div class="form">
	<?php
	if ( !empty ( $_GET)){
		
		if ($_GET["subscriber"] == 1){
			include("facultyForm.php"); 
		}
		else if ($_GET["subscriber"] ==2){
			include("itechOfficer.php");
		}
		else {
			include("studentForm.php");
		}
	}
		
	?>
</div>
	
<div class="list">
	<?php
		$dbhost="localhost";
		$dbuser="itech";
		$dbpassword="itech123.A";
		$dbname="sms";
		
		$connect = mysql_connect($dbhost, $dbuser, $dbpassword) or die ("could not connect to database!");
		
		mysql_select_db($dbname);
		
		$query = "SELECT * FROM event ORDER BY id DESC";
		$execute=mysql_query($query);
		
		echo'<table  border="1">
				<tr>
					<td>What</td>
					<td>Where</td>
					<td>When</td>
				</tr>';
				
		while ($row=mysql_fetch_array($execute)){
			
				
				echo '<tr>';
				echo'<td>' . $row["what"] . '</td>';
				echo'<td>' . $row["location"] . '</td>';
				echo'<td>' . $row["eventDate"];
				echo'</td>';
				echo'</tr>';
				
					}
					
					echo '</table>';
			/*
			echo'<div style="padding: 10px; margin:10px; border:1px solid black;">';
			echo'<b>What: </b>'. $row["what"]. "</br>";
			echo'<b>Where: </b>'. $row["location"]. "</br>";
			echo'<b>When: </b>'. $row["eventDate"]. "</br>";
			echo'</div>';
			}*/
	?>
</div>
</div>

</body>
</html>