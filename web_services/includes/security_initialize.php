<?php

#echo("security_initialize.php<br />");
$security = array();
$security["kid"] = NULL;
$security["service"] = NULL;
if(isset($_REQUEST["service_name"]))
	{ $security["service"] = $_REQUEST["service_name"]; }
$security["device"] = NULL;
$security["device_id"] = NULL;
$security["application"] = NULL;
if(isset($_REQUEST["application_name"]))
	{ $security["application"] = $_REQUEST["application_name"]; }
$security["username"] = NULL;
if(isset($_REQUEST["user_name"]))
	{ $security["username"] = $_REQUEST["user_name"]; }
$security["request_status"] = NULL;
$security["status_msg"] = NULL;
$security["description"] = NULL;
$security["results"] = " ";
$security["request"] = " ";
$security["security_token"] = NULL;
$security["log_date"] = date("Y-m-d H:i:s");

?>