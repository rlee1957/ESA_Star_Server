<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

if(!isset($path)){$path = "";}
#else{ $path = ""; }
#echo("web_service.php<br />");

$results = array();
$results["ws_status"] = "";
$results["ws_msg"] = "";
include($path."database/sql_functions.php");
include($path."includes/security_initialize.php");

include($path."includes/security2.php");

if($results["ws_status"] == "")
	{
	if(isset($_REQUEST["service_name"]))
		{
		$service_name = $_REQUEST["service_name"];
		$datetimestamp = date("Y-m-d H:i:s");
		$results["service_name"] = $service_name;
		include($path."includes/security3.php");
		if((isset($results["ws_status"]))&&($results["ws_status"] == ""))
			{
			include($path."includes/check_permissions.php");
			if((isset($results["ws_status"]))&&($results["ws_status"] == ""))
				{
				include($path."services/".$service_name.".php");
				}
			}
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "Service Name not specified. Service Name is a required input.";
		$security["request_status"] = $results["ws_status"];
		$security["status_msg"] = $results["ws_msg"];
		$security["description"] .= "Security failed, service name not specified.<br />";	
		}
	}

if($results["ws_status"] == "")
	{
	$results["ws_status"] = "Success";	
	$security["request_status"] = "Success";
	$security["status_msg"] = "";
	$security["description"] .= "Service successfully processed.<br />";	
	}
#echo("<textarea style='width: 100%; height: 300px;'>");
#print_r($results);
#echo("</textarea>");
$security["description"] .= "Request: ".json_encode($_REQUEST).";<br />";	
$response = json_encode($results);
$security["results"] = $response;
echo($response);
include($path."includes/security_log.php");


?>