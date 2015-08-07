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
	
	
	// sending query
	mysql_query("DELETE FROM event WHERE id = '$id'")
	or die(mysql_error());  	
	
	header("Location: view.php");
}
?>