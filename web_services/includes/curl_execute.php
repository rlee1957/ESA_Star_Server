<?php
	
if(!isset($return_xml)){ $return_xml = false; }
# Initialize and set options for CURL
$ch = curl_init();
curl_setopt( $ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $url", "HTTP_X_FORWARDED_FOR: $url"));
//curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

# Execute curl request and return results
$return = curl_exec($ch);
if($errno = curl_errno($ch)) 
	{
	$error_message = curl_strerror($errno);
	echo "cURL error ({$errno}):\n {$error_message}";
	}
curl_close($ch);

if($return_xml)
	{
	# load xml
	$xml_data = simplexml_load_string($return);
	}

?>