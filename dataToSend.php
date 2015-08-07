<html>
<?php

						$dbhost="localhost";
						$dbuser="itech";
						$dbpassword="itech123.A";
						$dbname="sms";
					
						$connect=mysql_connect($dbhost, $dbuser, $dbpassword) or die ("Could not connect to database");
						
						mysql_select_db($dbname);
						$facultyQuery=mysql_query("select * from faculty order by Last_Name asc");
						$itechOfficerQuery=mysql_query("select * from itech_officer order by Last_Name asc");
						$studentsQuery=mysql_query("select * from students order by Last_Name asc");
						
						echo '<br/>';
			
						echo "Faculty";
						echo '<table border="1" class="viewTable">
								<tr>
									<td>Name</td>
									<td>Mobile Number</td>
								</tr>';
						
						while ($row=mysql_fetch_array($facultyQuery)){
							
							$id = $row['id'];
							echo '<tr>';
							echo'<td>' . $row["Last_Name"] .","." ".$row["First_Name"]. '</td>';
							echo'<td>' . $row["Cellphone_Number"] . '</td>';
							echo'</td>';
							echo'</tr>';
							
								}
								
								echo '</table>';
								
						echo '<br/>';
						//ITECH Officer List
						
						echo "ITECH Officers";
								
						echo '<table border="1" class="viewTable">
								<tr>
									<td>Name</td>
									<td>Mobile Number</td>
								</tr>';
						
						while ($row=mysql_fetch_array($itechOfficerQuery)){
							
							$id = $row['id'];
							echo '<tr>';
							echo'<td>' . $row["Last_Name"] .","." ".$row["First_Name"]. '</td>';
							echo'<td>' . $row["Cellphone_Number"] . '</td>';
							echo'</td>';
							echo'</tr>';
							
								}
								
								echo '</table>';
						echo '<br/>';
						//Students
						
						echo "Students";
								
						echo '<table border="1" class="viewTable">
								<tr>
									<td>Name</td>
									<td>Mobile Number</td>
								</tr>';
						
						while ($row=mysql_fetch_array($studentsQuery)){
							
							$id = $row['id'];
							echo '<tr>';
							echo'<td>' . $row["Last_Name"] .","." ".$row["First_Name"]. '</td>';
							echo'<td>' . $row["Cellphone_Number"] . '</td>';
							echo'</td>';
							echo'</tr>';
							
								}
								
								echo '</table>';		
								
								//"select * from event m,faculty mp where mp.Cellphone_Number AND m.eventDate order by eventDate desc"
?>
</html>