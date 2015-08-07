<table>
New Event
<form action="calendar.php" && "eventCalendar.php" method="POST">
	<tr>
		<td><p>Event</td>
		<td><textarea name="what" cols="59" rows="5" required="required"></textarea></td>
	</tr>
	<tr>
		<td><p>Where</td>
		<td><input type="text" name="where" size="76" required="required"></td>
	</tr>
	</table>
	<table>
	<tr>
	<td><p>Date</td>
		<td><select name="month" required="required">
								
									<?php
										$month= array('Month','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
										'September', 'October', 'November', 'December');
										foreach($month as $monValue){
											echo '<option value="'.$monValue.'">'.$monValue.'</option>';
										}
									?>
										
								
			</select></td>
		<td><select name="day" required="required">
											
										<option value="d">Day</option>
									<?php
										for($day=1;$day<=31;$day++){
										$days=array($day);
										
										foreach($days as $dayValue){
												echo'<option value="'.$dayValue.'">'.$dayValue.'</option>';
												}}
									?>
								
			</select></td>
		<td><select name="year" required="required">
								<option value="y">Year</option>
								<?php
									for($year=2010;$year<=date("Y", time());$year++){
										$years=array($year);
										foreach($years as $yearValue){
											echo '<option value="'.$yearValue.'">'.$yearValue.'</option>';
										}
									}
									
								?>
								<option value="">
									
								</option>
			</select></td>
		
	
			<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
			<td><p>Time</td>
						<td><select name="hour" required="required">
									<option value="">Hour</option>
								<?php
									for($hour=1;$hour<=12;$hour++){
										$hours= array($hour);
										foreach($hours as $hourValue){
											echo '<option value="'.$hourValue.'">'.$hourValue.'</option>';
										}
									}
									
								?>
							</select></td>
					
						<td><select name="minute" required="required">
							<option value="">Minute</option>
							<?php
								for($minute=0;$minute<=60;$minute++){
									$minutes= array($minute);
										foreach($minutes as $minuteValue){
											echo '<option value="'.$minuteValue.'">'.$minuteValue.'</option>';
										}
								}
							?>
							</select></td>
		</tr>
		<tr height="20">
			<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		</tr>
		<tr>
		<td><p>Subscriber</td>
						<td><select name="subscriber" required="required">
								<option value="faculty">subscriber</option>
								<option value="faculty">faculty</option>
								<option value="officer">officer</option>
								<option value="student">student</option>
								<option value="all">all</option>
							</select></td>	
		<td></td>
		<td></td>
		<td></td>

		<td><p>Event Type</td>
						<td><select name="eventType" required="required">
								<option value="regular">event type</option>
								<option value="regular">regular</option>
								<option value="urgent">urgent</option>
							</select></td>	
		<p>
		</tr>	
</table>
<center>
<br><br>
<br><br>
<table>
		<tr>
			<td><input type="submit" value="SAVE"></td>
			<td><input type="reset" value="CANCEL"></td>
		</tr>
</form>
</table>