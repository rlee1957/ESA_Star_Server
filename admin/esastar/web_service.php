<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
$path = "";
include($path."database/sql_functions.php");
$results = array();
if(isset($_REQUEST["service_name"]))
	{
	$service_name = $_REQUEST["service_name"];
	$datetimestamp = date("Y-m-d H:i:s");
	$results["service_name"] = $service_name;
	include($path."includes/check_for_crawlers.php");
	if((isset($results["ws_status"]))&&($results["ws_status"] == "success"))
		{
		include($path."includes/".$service_name.".php");
		}
	}
else
	{
	$results["ws_status"] = "failed";
	$results["ws_msg"] = "Service Name not specified. Service Name is a required input.";
	}
echo(json_encode($results));


?>