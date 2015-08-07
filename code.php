<?php
//cron job /home/public_html/kjhfwkef.php
// Loop start
$to_number = "";
$content = "";

$api_key = 'LF96LQZUWCGULHFDKMGANGZ6K3QHR4LF';
$project_id = 'PJ65a59ad3de7f7d2a';
$phone_id = 'PN55ec6f9115b8b864';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL,"https://api.telerivet.com/v1/projects/$project_id/messages/outgoing");
curl_setopt($curl, CURLOPT_USERPWD, "{$api_key}:");  
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
	'content' => $content,
	'phone_id' => $phone_id,
	'to_number' => $to_number,
), '', '&'));        

$json = curl_exec($curl);    
$network_error = curl_error($curl);
curl_close($curl);    
// Loop End


if ($network_error) 
{ 
	$message_html = "<div style='color:#900'>".htmlspecialchars($network_error)."</div>";
}    
else
{
	$res = json_decode($json, true);        

	if (isset($res['error']))
	{
		$message_html = "<div style='color:#900'>".htmlspecialchars($res['error']['message'])."</div>";
	}
	else
	{
		$message_html = "Message sent! (status: ". htmlspecialchars($res['status']). ")";
		$content = '';
	}
}
?>