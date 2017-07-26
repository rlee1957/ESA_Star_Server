<?php

#echo("security_get_device_info.php<br />");
$devic = array();
if((isset($_SERVER['SERVER_ADDR']))&&(trim($_SERVER['SERVER_ADDR']) != ""))
	{ $devic["server_ip"]  = $_SERVER['SERVER_ADDR']; }

if((isset($_SERVER['HTTP_CLIENT_IP']))&&(trim($_SERVER['HTTP_CLIENT_IP']) != ""))
	{ $devic["client_ip"]  = $_SERVER['HTTP_CLIENT_IP']; }

if((isset($_SERVER['HTTP_X_FORWARDED_FOR']))&&(trim($_SERVER['HTTP_X_FORWARDED_FOR']) != ""))
	{ $devic["forward_ip"] = $_SERVER['HTTP_X_FORWARDED_FOR']; }

if((isset($_SERVER['REMOTE_ADDR']))&&(trim($_SERVER['REMOTE_ADDR']) != ""))
	{ $devic["remote_ip"]  = $_SERVER['REMOTE_ADDR']; }

if((isset($_SERVER['HTTP_USER_AGENT']))&&(trim($_SERVER['HTTP_USER_AGENT']) != ""))
	{ $devic["agent"] = $_SERVER['HTTP_USER_AGENT']; }

$device_info = "";
if(count($devic) > 0)
	{ 
	$device_info = json_encode($devic);
	}

?>