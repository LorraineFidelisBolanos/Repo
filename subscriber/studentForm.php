<div class="form">
<!--form for student-->
<fieldset><legend align="left" face="" color="black" size="5">Student Form</font></legend>
		
	<br>
	<table align="left" border="0" width="40%">
		<form action="studentProcess.php" method="POST">
			<tr>
				<td>First Name:</td>
				<td><input type="text" name="firstname"  maxlength="30" size="30" required="Required"></td>
			</tr>
			
			<tr>
				<td>Last Name:</td>
				<td><input type="text" name="lastname"  maxlength="30" size="30" required="Required"></td>
			</tr>
			
			<tr>
				<td>Year and Section:</td>
				<td><input type="text" name="yrSec"  maxlength="30" size="30" required="Required"></td>
			</tr>
			
			<tr>
				<td>Contact Number:</td>
				<td><input type="text" name="contact"  maxlength="30" size="30" required="Required"></td>
			</tr>		
	</table>
		
	<table>
			<tr align="right">
				<td>
				<input type="submit" value="SAVE">
				<input type="reset" value="CANCEL">
				</td>
			</tr>
	</table>
		</form>
</fieldset>
</div>

<div class="list">
	<?php
		$dbhost="localhost";
		$dbuser="itech";
		$dbpassword="itech123.A";
		$dbname="sms";
		
		$connect = mysql_connect($dbhost, $dbuser, $dbpassword) or die ("could not connect to database!");
		
		mysql_select_db($dbname);
		
		$query = "SELECT * FROM students ORDER BY id DESC";
		$execute=mysql_query($query);
		
		echo'<table  border="1">
				<tr>
					<td>Fisrt Name</td>
					<td>Last Name</td>
					<td>Year and Section</td>
					<td>Contact Number</td>
				</tr>';
				
		while ($row=mysql_fetch_array($execute)){
			
				
				echo '<tr>';
				echo'<td>' . $row["First_Name"] . '</td>';
				echo'<td>' . $row["Last_Name"] . '</td>';
				echo'<td>' . $row["Year_and_Section"] . '</td>';
				echo'<td>' . $row["Contact_Number"];
				echo'</td>';
				echo'</tr>';
				
					}
					
					echo '</table>';
			/*
			echo'<div style="padding: 10px; margin:10px; border:1px solid black;">';
			echo'<b>First Name: </b>'. $row["First_Name"]. "</br>";
			echo'<b>Last Name: </b>'. $row["Last_Name"]. "</br>";
			echo'<b>Year and Section: </b>'. $row["Year_and_Section"]. "</br>";
			echo'<b>Contact Number: </b>'. $row["Contact_Number"]. "</br>";
			echo'</div>';
			}*/
	?>
</div>
	