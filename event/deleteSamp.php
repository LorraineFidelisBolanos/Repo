<?php
	
		$dbhost="localhost";
		$dbuser="itech";
		$dbpassword="itech123.A";
		$dbname="sms";
	
	$connect=mysql_connect($dbhost,$dbuser, $dbpassword);
	echo 'connected';
	
	$search=	$_POST['search'];
	mysql_select_db($dbname);
	
	
	
	$query=	"DELETE FROM event WHERE what='$search'";
	$execute=mysql_query($query);
	
	while ($row=mysql_fetch_array($execute)){
			echo'<div style="padding: 10px;margin:10px;border:1px solid black;">';
			echo"<b>fName: </b>". $row["what"]."<br/>";
			echo"<b>lName: </b>". $row["location"]."<br/>";
			echo"<b>email: </b>". $row["eventDate"];
			echo '</div>';
			}
	echo "Successfully Deleted!";
?>
