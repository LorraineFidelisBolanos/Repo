<?php
$dbhost="localhost";
$dbuser="RP";
$dbpassword="1234bert";
$dbname="untitled2";

$connect =mysql_connect($dbhost, $dbuser, $dbpassword) or die("could not connect to database");
mysql_select_db($dbname);

//get id
if(isset($_GET["id"])) {

		$id = $_GET["id"];
	
	
	// sending query
	mysql_query("DELETE FROM direct WHERE id = '$id'")
	or die(mysql_error());  	
	
	header("Location: search.php");
}
?>