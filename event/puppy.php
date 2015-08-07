<?php
/*==================================================
##################################################
# PUPPY LIBRARY
--------------------------------------------------
Version: 1.1.2
Author: Patrick Jinon
Email: patrick@charex.net
WWW: http://www.charex.net/
WWW: http://www.cyclohost.net/
##################################################


##################################################
# Usage / License
--------------------------------------------------
Puppy library is a collection of classes for the private use of my websites
or select projects I agree to use it in. It is not for sale nor allowed to be
used for commercial purposes.
##################################################


##################################################
# Version Changes
--------------------------------------------------
[2014-1-21] Version 1.1.3
- Added getAsHTMLTable() to PuppyCalendar

[2013-6-28] Version 1.1.2
- Minor modifications

[2013-3-29] Version 1.1.1
- Bug fixes
- Removed PuppyAccount

[2013-3-27] Version 1.1.0
- Added PuppyPassword
- Added PuppySQLR

[2013-2-16] Version 1.0.0
- Finished PuppyConfig, PuppyParser, PuppyCalendar, and PuppySQL
- Added PuppyAccount interface
##################################################


##################################################
# Classes and Functions
--------------------------------------------------
[PuppyConfig]
-- Constructor
---------- @param void
-- set()
---------- @param String Name
---------- @param String Value
-- get()
---------- @param String Name
---------- @return String Value

[PuppyParser]
-- set()
---------- @param String Text
-- get()
---------- @return Text
-- write()
---------- @param void
-- toAlphaNum()
---------- @param void
-- removeHTML()
---------- @param void
-- applyBreaksAndSpaces()
---------- @param void
-- parseLinks()
---------- @param void

[PuppyPassword]
-- Constructor
---------- @param int Password Length
---------- @param boolean Letters = true
---------- @param boolean Numbers = true
---------- @param boolean Symbols = true
-- generate()
---------- @param void

[PuppyCalendar]
-- Constructor
---------- @param void
-- setYear()
---------- @param int(4) Year
-- setMonth()
---------- @param int(2) Month
-- build()
---------- @param void
-- getCalendarDays()
---------- @param boolean WithSpaces = false
-- outputCalendarDays()
---------- @param void
-- printAsHTMLTable()
---------- @param void
-- getAsHTMLTable()
---------- @param void

[PuppySQL]
-- Constructor
---------- @param String Database Host
---------- @param String Database Username
---------- @param String Database Password
---------- @param String Database Name
-- close()
---------- @param void
-- run()
---------- @param String SQL Query
---------- @params String SQL Query Bindings
-- runa()
---------- @param String SQL Query
---------- @param Array SQL Query Bindings
-- insert()
---------- @param String Table Name
---------- @param Array Table Data
-- update()
---------- @param String Table Name
---------- @param Array Table Data
---------- @param String SQL Where Conditions
-- preview()
---------- @param void

[PuppySQLR]
-- Constructor
---------- @param PuppySQL Connection
-- setTable()
---------- @param String Table Name
-- call()
---------- @param String Column Target
---------- @param String Target Value
-- exists()
---------- @param void
-- set()
---------- @param String Column Name
---------- @param String New Value
-- get()
---------- @param String Column Name
-- reset()
---------- @param void
-- save()
---------- @param void

##################################################
==================================================*/


//==================================================
// Puppy Constants
//==================================================
define("PUPPYLIBRARY", true);
define("PUPPYVERSION", "1.1.2");
//==================================================



//==================================================
// PuppyConfig : Configuration storage
//==================================================
class PuppyConfig {
	
	private $configs;
	
	// Constructor
	function __construct() {
		$this->configs = array();
	}
	
	// Sets a value
	function set($name, $value) {
		$this->configs[$name] = $value;
	}
	
	// Gets a value
	function get($name) {
		return $this->configs[$name];
	}
	
}
//==================================================



//==================================================
// PuppyParser : Text parsing class
//==================================================
class PuppyParser {
	
	// Variables
	private $Text = "";
	private $AllowedTags = "<b><u><i>";
	private $maxWordLength = 40;
	
	// Sets the string to parse
	function set($new) {
		$this->Text = $new;
	}
	
	// Returns the string
	function get() {
		return stripslashes($this->Text);
	}
	
	// Prints the string
	function write() {
		echo stripslashes($this->Text);
	}
	
	// Removes non-alphanumeric characters
	function toAlphaNum($allow = "") {
		$pattern = '/[^A-Za-z0-9' . $allow . ']/';
		$this->Text = preg_replace($pattern, '', $this->Text);
	}
	
	// Removes HTML tags
	function removeHTML() {
		$this->text = strip_tags($this->text, $this->allowed_tags);
	}
	
	// WYSIWYG breaks and spaces
	function applyBreaksAndSpaces() {
		$this->text = nl2br($this->text);
		$this->text = str_replace('  ', '&nbsp;&nbsp;', $this->text);
	}
	
	// Parse links
	function parseLinks() {
		$text = preg_replace('"\b(http://\S+)"', '<a href="$1" target="_blank">$1</a>', $text);
	}
	
}
//==================================================



//==================================================
// PuppyPassword : Password generation class
//==================================================
class PuppyPassword {
	
	// Variables
	public $output;
	public $alpha;
	public $num;
	public $sym;
	public $length;
	
	public $letters = array();
	public $numbers = array();
	public $symbols = array();
	
	// Constructor
	function __construct($l = 7, $a = true, $n = true, $s = true) {
		
		// Set default variables
		$this->output = "";
		$this->alpha = $a;
		$this->num = $n;
		$this->sym = $s;
		$this->length = $l;
		
		// Generate letters
		for($i = 65; $i <= 90; $i++) {
			array_push($this->letters, chr($i));
			array_push($this->letters, chr($i + 32));
		}
		
		// Generate numbers
		for($i = 0; $i <= 9; $i++) {
			array_push($this->numbers, $i);
		}
		
		// Generate symbols
		for($i = 33; $i <= 47; $i++) {
			array_push($this->symbols, chr($i));
		}
		for($i = 58; $i <= 64; $i++) {
			array_push($this->symbols, chr($i));
		}
		for($i = 91; $i <= 95; $i++) {
			array_push($this->symbols, chr($i));
		}
		
	}
	
	// Generate a password
	function generate() {
		
		$this->output = "";
		
		// Prority: Letter > Symbol > Number
		$div = 0;
		if($this->alpha) $div++;
		if($this->num) $div++;
		if($this->sym) $div++;
		
		if($this->length >= $div) {
			
			$remainder = $this->length % $div;
			$left = $this->length - $remainder;
			
			$each = $left / $div;
			
			for($i = 0; $i < $each; $i++) {
				if($this->alpha) $this->output .= $this->letters[mt_rand(0, count($this->letters) - 1)];
				if($this->num) $this->output .= $this->numbers[mt_rand(0, count($this->numbers) - 1)];
				if($this->sym) $this->output .= $this->symbols[mt_rand(0, count($this->symbols) - 1)];
			}
			
			// Shuffle Time!
			$shuffler = str_split($this->output);
			while($remainder > 0) {
				array_push($shuffler, $shuffler[mt_rand(0, count($shuffler) - 1)]);
				$remainder--;
			}
			shuffle($shuffler);
			shuffle($shuffler);
			shuffle($shuffler);
			$this->output = implode("", $shuffler);
			
		} else {
			
			$this->length = $div;
			$this->generate();
			
		}
		
		return $this->output;
		
	}
	
}
//==================================================



//==================================================
// PuppyCalendar : PHP Calendar
//==================================================
class PuppyCalendar {
	
	// Variables
	public $CalendarDayNames = array("Sunday", "Monday", "Tueday", "Wednesday", "Thursday", "Friday", "Saturday");
	public $CalendarMonthNames = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	private $Year;
	private $Month;
	private $StartingDay;
	private $StartingDayRepNumber;
	private $DayCount;
	private $CalendarDays;
	
	// Constructor
	function __construct() {
		$now = time();
		$this->Year = date("Y", $now);
		$this->Month = date("n", $now);
		
		$this->build();
	}
	
	// Set new year
	function setYear($x) {
		$this->Year = $x;
	}
	
	// Set new month
	function setMonth($x) {
		$this->Month = $x;
	}
	
	// Build Calendar
	function build() {
		
		// Timestamp of the first day of the month
		$this->StartingDay = mktime(0, 0, 0, $this->Month, 1, $this->Year);
		
		// Number of days in current month
		$this->DayCount = date("t", $this->StartingDay);
		
		// Starting day name of the first day
		$this->StartingDayRepNumber = date("w", $this->StartingDay);
		
		// Reinstantiate calendar days
		$this->CalendarDays = array();
		
		// Fill calendar days
		for($i = 1; $i <= $this->DayCount; $i++) {
			$currentTimestamp = mktime(0, 0, 0, $this->Month, $i, $this->Year);
			$currentday = array(
				'Number' => $i,
				'DayRepNo' => date("w", $currentTimestamp),
				'DayRepName' => date("l", $currentTimestamp),
				'Timestamp' => $currentTimestamp
			);
			array_push($this->CalendarDays, $currentday);
		}
		
	}
	
	// Return the calendar days
	function getCalendarDays($withSpaces = false) {
		if($withSpaces) {
			
			// Create a new array for the spaces
			$CalendarSpaces = array();
			
			// Fill in the spaces
			for($i = 0; $i < $this->StartingDayRepNumber; $i++) {
				$currentday = array(
					'Number' => null,
					'DayRepNo' => null,
					'DayRepName' => null,
					'Timestamp' => null
				);
				array_push($CalendarSpaces, $currentday);
			}
			
			// Concatenate the calendar days
			$newCalendarDays = array_merge($CalendarSpaces, $this->CalendarDays);
			
			// Return value
			return $newCalendarDays;
			
		} else {
			return $this->CalendarDays;
		}
	}
	
	// Output the calendar days array
	function outputCalendarDays() {
		echo "<pre>\n";
		print_r($this->CalendarDays);
		echo "</pre>";
	}
	
	// Print as HTML Table
	function printAsHTMLTable() {
		
		// Create a new array
		$cDays = $this->getCalendarDays(true);
		
		echo '<table style="border-spacing:2px;"><tr>';
		// Print month and year
		echo '<td colspan="7" style="border:1px solid black;padding:5px;text-align:center;">' . date("F Y", $this->CalendarDays[0]['Timestamp']) . '</td></tr><tr>';
		// Print day names
		for($i = 0; $i < count($this->CalendarDayNames); $i++) {
			echo '<td style="border:1px solid black;padding:5px;">' . substr($this->CalendarDayNames[$i], 0, 3) . '</td>';
		}
		echo '</tr><tr>';
		// Print Days
		for($i = 0; $i < count($cDays); $i++) {
			echo '<td style="border:1px solid black;padding:5px;">' . $cDays[$i]['Number'] . '</td>';
			if(($i+1) % 7 == 0) echo '</tr><tr>';
		}
		echo '</tr></table>';
	}
	
	// Get as HTML Table
	function getAsHTMLTable() {
		
		// Create output buffer
		$output = "";
		
		// Create a new array
		$cDays = $this->getCalendarDays(true);
		
		$output .= '<table style="border-spacing:2px;"><tr>';
		// Print month and year
		$output .= '<td colspan="7" style="border:1px solid black;padding:5px;text-align:center;">' . date("F Y", $this->CalendarDays[0]['Timestamp']) . '</td></tr><tr>';
		// Print day names
		for($i = 0; $i < count($this->CalendarDayNames); $i++) {
			$output .= '<td style="border:1px solid black;padding:5px;">' . substr($this->CalendarDayNames[$i], 0, 3) . '</td>';
		}
		$output .= '</tr><tr>';
		// Print Days
		for($i = 0; $i < count($cDays); $i++) {
			$output .= '<td style="border:1px solid black;padding:5px;">' . $cDays[$i]['Number'] . '</td>';
			if(($i+1) % 7 == 0) $output .= '</tr><tr>';
		}
		$output .= '</tr></table>';
		
		// Return Output
		return $output;
	}
	
}
//==================================================



//==================================================
// PuppySQL : MySQL transactions class
//==================================================
class PuppySQL {
	
	private $Connection;
	private $LastQuery;
	
	// Constructor : Opens the connection
	function __construct($host, $username, $password, $dbname) {
		$this->Connection = mysql_connect($host, $username, $password);
		if($this->Connection) {
			mysql_select_db($dbname, $this->Connection);
		} else {
			die("Error: Could not connect to database!");
		}
	}
	
	// Close the connection
	function close() {
		mysql_close($this->Connection);
	}
	
	// Run a query
	function run() {
		
		// Fetch arguments
		$args = func_get_args();
		
		// Clean arguments
		if(count($args) > 1) {
			$q = array_shift($args);
			$q = str_replace('?', '%s', $q);
			foreach ($args as $k => $v){
				$args[$k] = mysql_real_escape_string($v, $this->Connection);
			}
			$q = vsprintf($q, $args);
		}
		
		else if(count($args) == 1) {
			$q = mysql_real_escape_string($args[0], $this->Connection);
		}
		
		else {
			return false;
		}
		
		// Query
		$this->LastQuery = mysql_query($q, $this->Connection);
		if($this->LastQuery) {
			return $this->LastQuery;
		} else {
			return false;
		}
		
	}
	
	// Execute query with array parameter
	function runa($query, $args) {
		
		// Clean arguments
		$q = str_replace('?', '%s', $query);
		foreach ($args as $k => $v){
			$args[$k] = mysql_real_escape_string($v);
		}
		$q = vsprintf($q, $args);
		
		// Query
		$this->LastQuery = mysql_query($q);
		if($this->LastQuery) {
			return $this->LastQuery;
		} else {
			return false;
		}
		
	}
	
	// Insert data into table
	function insert($table, $dataArray) {
		
		// Get the column names and values
		$colname = '';
		$coldata = '';
		foreach($dataArray as $k => $v) {
			$colname .= " " . $k . ",";
			$coldata .= " '?',";
		}
		$colname = substr($colname, 1, strlen($colname) - 2);
		$coldata = substr($coldata, 1, strlen($coldata) - 2);
		
		// Build and run query
		$sql = "INSERT INTO " . $table . " (" . $colname . ") VALUES (" . $coldata . ")";
		$this->LastQuery = $this->runa($sql, $dataArray);
		if(!$this->LastQuery) {
			return false;
		} else {
			return true;
		}
		
	}
	
	// Update table
	function update($table, $dataArray, $where) {
		
		// SET values
		$setString = "";
		foreach($dataArray as $k => $v) {
			$setString .= $k . "='?',";
		}
		$setString = substr($setString, 0, strlen($setString) - 1);
		
		// Build and run query
		$sql = "UPDATE " . $table . " SET " . $setString . " WHERE " . $where;
		$this->LastQuery = $this->runa($sql, $dataArray);
		if(!$this->LastQuery) {
			return false;
		} else {
			return true;
		}
		
	}
	
	// Preview the results of an SQL query
	function preview($data = false) {
		
		if(!$data) {
			$data = $this->LastQuery;
		}
		
		if(mysql_num_rows($data) < 1) {
			echo "Returned 0 results.";
		}
		
		else {
			$cols = mysql_num_fields($data);
			
			echo '<table style="border:1px solid #ccc;border-spacing:2px;">';
			
			echo '<tr>';
			for($i = 0; $i < $cols; $i++) {
				echo '<td style="border:1px solid #ccc;padding:5px;font-weight:bold;">' . mysql_field_name($data, $i) . '</td>';
			}
			echo '</tr>';
			
			while($row = mysql_fetch_array($data)) {
				
				echo '<tr>';
				for($i = 0; $i < $cols; $i++) {
					echo '<td style="border:1px solid #ccc;padding:5px;">' . $row[$i] . '</td>';
				}
				echo '</tr>';
			}
			
			echo '</table>';
		}
		
	}
	
	
}
//==================================================



//==================================================
// PuppySQLR : MySQL table row reader class
//==================================================
class PuppySQLR {
	
	// Variables
	private $p = null;
	private $table;
	private $exist;
	private $cols;
	private $olddata;
	private $data;
	
	// Constructor
	function __construct($PuppySQL) {
		$this->p = $PuppySQL;
		$this->reset();
	}
	
	// Sets Table
	function setTable($TName) {
		$this->table = $TName;
	}
	
	// Calls out a row
	function call($Column, $Value) {
		$query = $this->p->run("SELECT * FROM ? WHERE ? = '?'", $this->table, $Column, $Value);
		if(mysql_num_rows($query) == 1) {
			
			$this->exist = true;
			$fetch = mysql_fetch_row($query);
			$columns = mysql_num_fields($query);
			for($i = 0; $i < $columns; $i++) {
				$this->cols[$i] = mysql_field_name($query, $i);
				$this->data[$this->cols[$i]] = $fetch[$i];
			}
			$this->olddata = $this->data;
			
		} else {
			$this->exist = false;
		}
	}
	
	// Check if row exists
	function exists() {
		return $this->exist;
	}
	
	// Sets row value
	function set($Name,$Value) {
		$this->data[$Name] = $Value;
	}
	
	// Gets row value
	function get($Name) {
		return $this->data[$Name];
	}
	
	// Resets object
	function reset() {
		$this->table = null;
		$this->exist = false;
		$this->cols = array();
		$this->data = array();
	}
	
	// Saves changes or inserts new row
	function save() {
		
		$ret = false;
		
		if(!$this->exist) {
			
			// Create
			$query = $this->p->insert($this->table, $this->data);
			if($query) {
				$ret = true;
			}
			
		} else {
			
			// Update
			$newvals = array();
			for($i = 0; $i < count($this->cols); $i++) {
				if($this->olddata[$this->cols[$i]] != $this->data[$this->cols[$i]]) {
					$newvals[$this->cols[$i]] = $this->data[$this->cols[$i]];
				}
			}
			
			$where = $this->cols[0] . " = '" . $this->data[$this->cols[0]] . "'";
			
			$query = $this->p->update($this->table, $newvals, $where);
			if($query) {
				$ret = true;
			}
			
		}
		
		return $ret;
		
	}
	
}
//==================================================
?>