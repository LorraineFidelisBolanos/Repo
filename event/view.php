<html>
<head>
	<link rel="stylesheet" type="text/css" href="event.css"/>
</head>

<?php
						$dbhost="localhost";
						$dbuser="itech";
						$dbpassword="itech123.A";
						$dbname="sms";
					
						$connect=mysql_connect($dbhost, $dbuser, $dbpassword) or die ("Could not connect to database");
						
						mysql_select_db($dbname);
						$query=mysql_query("select * from event order by eventDate desc");
						
								
						
						echo '<table border="1" class="viewTable">
								<tr>
									<td>What</td>
									<td>Where</td>
									<td>When</td>
									<td>Who</td>
									<td>Action</td>
								</tr>';
						
						while ($row=mysql_fetch_array($query)){
			
							$id = $row['id'];
							echo '<tr>';
							echo'<td>' . $row["what"] . '</td>';
							echo'<td>' . $row["location"] . '</td>';
							echo'<td>' . $row["eventDate"]." "."@"." ".$row["eventTime"].'</td>';
							echo'<td>' . $row["subscriber"].'</td>';
							echo'<td>' . "<a href='edit.php?id=$id'>Edit</a>";
							echo '<td>'. "<a href='delete.php?id=$id'>Delete</a>";
							echo'</td>';
							echo'</tr>';
							
								}
								
								echo '</table>';
								
						
						
						
						

?>
<a href="event.php">Back</a>
</html>