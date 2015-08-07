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
</div>

</body>
</html>