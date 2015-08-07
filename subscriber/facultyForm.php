<div class="form">
<!--form for faculty-->
<fieldset><legend align="left" face="" color="black" size="5">Faculty Form</font></legend>
	
	<br>
	<table align="left" border="0" width="40%">
		<form action="facultyProcess.php" method="POST">
			<tr>
				<td>First Name:</td>
				<td><input type="text" name="firstname" maxlength="30" size="30" required="Required"></td>
			</tr>
		
			<tr>
				<td>Last Name:</td>
				<td><input type="text" name="lastname" maxlength="30" size="30" required="Required"></td>
			</tr>
		
			<tr>
				<td>Cellphone Number:</td>
				<td><input type="text" name="cellphone" maxlength="30" size="30" required="Required"></td>
			</tr>
	</table>
		
	<table>
		<tr align="right">
			<td><input type="submit" value="SAVE">
				<input type="reset" value="CANCEL">
			</td>
		</tr>
		</form>
	</table>
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
		
		$query = "SELECT * FROM faculty ORDER BY id DESC";
		$execute=mysql_query($query);
		
		echo'<table  border="1">
				<tr>
					<td>Fisrt Name</td>
					<td>Last Name</td>
					<td>Cellphone Number</td>
				</tr>';
				
		while ($row=mysql_fetch_array($execute)){
			
				$id = $row['id'];
				echo '<tr>';
				echo'<td>' . $row["First_Name"] . '</td>';
				echo'<td>' . $row["Last_Name"] . '</td>';
				echo'<td>' . $row["Cellphone_Number"];
				echo'<td>' . "<a href='edit.php?id=$id'>Edit</a>";
				echo '<td>'. "<a href='delete.php?id=$id'>Delete</a>";
				echo'</td>';
				echo'</tr>';
				
					}
					
					echo '</table>';
			/*
			echo'<div style="padding: 10px; margin:10px; border:1px solid black;">';
			echo'<b>First Name: </b>'. $row["First_Name"]. "</br>";
			echo'<b>Last Name: </b>'. $row["Last_Name"]. "</br>";
			echo'<b>Cellphone Number: </b>'. $row["Cellphone_Number"]. "</br>";
			echo'</div>';
			}*/
	?>
</div>