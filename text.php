<?php

    /*
     * Telerivet API Example (PHP) - Sending SMS from a form on your website
     * --------------------------------------------------------------------
     * To run this example:
     * 1. Save a copy of this file
     * 2. Replace the API settings below with the values from the API page 
     * 3. Upload the modified file to your web server with the extension .php.
     * 4. Open the page in your browser (e.g. http://your-web-server.com/send_api_example.php)
     */
    
    $api_key = 'LF96LQZUWCGULHFDKMGANGZ6K3QHR4LF';
    $project_id = 'PJ65a59ad3de7f7d2a';
    $phone_id = 'PN55ec6f9115b8b864';    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $to_number = $_POST['to_number'];
        $content = $_POST['content'];
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,"https://api.telerivet.com/v1/projects/$project_id/messages/outgoing");
        curl_setopt($curl, CURLOPT_USERPWD, "{$api_key}:");  
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
            'content' => $content,
            'phone_id' => $phone_id,
            'to_number' => $to_number,
        ), '', '&'));        
        
        // if you get SSL errors, download SSL certs from https://telerivet.com/_media/cacert.pem .
        // curl_setopt($curl, CURLOPT_CAINFO, dirname(__FILE__) . "cacert.pem");    
        
        $json = curl_exec($curl);    
        $network_error = curl_error($curl);
        curl_close($curl);    
        
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
    }
    else
    {
        $message_html = '';   
        $to_number = '';
        $content = '';
    }
?>

<html>
<head>
<title>Telerivet API Example: Send SMS</title>
</head>
<body>
<div style='width:400px;margin:0 auto'>
<?php echo $message_html; ?>
<h2>Telerivet API Example: Send SMS</h2>
<form method='POST'>
    <strong>Phone Number</strong><br />
    <input type='text' style='width:400px' value="<?php echo htmlspecialchars($to_number); ?>" name='to_number' />
    <br /><br />
    <strong>Message</strong><br />
    <textarea name='content' style='width:400px;height:50px'><?php echo htmlspecialchars($content); ?></textarea>
    <br /><br />
    <input type='submit' value='Send' />
</form>
</div>
</html>