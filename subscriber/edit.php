<?php

$dbhost="localhost";
$dbuser="itech";
$dbpassword="itech123.A";
$dbname="sms";

$connect =mysql_connect($dbhost, $dbuser, $dbpassword) or die("could not connect to database");
mysql_select_db($dbname);

//get id
if(isset($_GET["id"])) {

		$id = $_GET["id"];
		
		//query id
		$result = mysql_query("SELECT * FROM faculty WHERE id  = '$id'");
		$test = mysql_fetch_array($result);
				if (!$result) 
						{
						die("Error: Data not found..");
						}
							$First_Name = $test["First_Name"];
							$Last_Name = $test["Last_Name"];
							$Cellphone_Number = $test["Cellphone_Number"];
							
}
//Post edit query
if(isset($_POST['save']))
{	
	$First_Name = $_POST["firstname"];
	$Last_Name= $_POST["lastname"];
	$Cellphone_Number = $_POST["cellphone"];
	


	mysql_query("UPDATE faculty SET First_Name ='$First_Name', Last_Name ='$Last_Name',
		 Cellphone_Number ='$Cellphone_Number ' WHERE id = '$id'")
				or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: facultyForm.php");			
}
	
@mysql_close();
?>


<!DOCTYPE html>

<html>
<head><title>EDIT</title></head>

<link rel = "stylesheet" type = "text/css" href = "cascaded.css"/>

<body>

<div class = "wrapper">
			
			
	
<div class="testing">

<div id = "header" align = "center">Directory Edit Form</div>


<form method="post">
	<table align = "center">
		
			<tr>
				<td>First Name:</td>
				<td><input type="text" name="firstname" maxlength="30" size="30" value= "<?php echo $First_Name ?>" required="Required"></td>
			</tr>
		
			<tr>
				<td>Last Name:</td>
				<td><input type="text" name="lastname" maxlength="30" size="30" value= "<?php echo $Last_Name ?>" required="Required"></td>
			</tr>
		
			<tr>
				<td>Cellphone Number:</td>
				<td><input type="text" name="cellphone" maxlength="30" size="30" value= "<?php echo $Cellphone_Number  ?>" required="Required"></td>
			</tr>
			
			<td></td>
			<td align = "right"><input type="Submit" name = "save" value="Save" /> &nbsp 
			<a href = "facultyForm.php'"><input type="button" value="Cancel"></a> </td>
		</tr>
		
	</table>

</form>
</div>

</body>

</html>





