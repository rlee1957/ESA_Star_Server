<?php

$element_id = "";
if(isset($_REQUEST["element_id"])){ $element_id = $_REQUEST["element_id"]; }
$results["element_id"] = $element_id;
$passthrough = "";
if(isset($_REQUEST["passthrough"])){ $passthrough = $_REQUEST["element_id"]; }
$results["passthrough"] = $passthrough;
$user_name = "";
if(isset($_REQUEST["user_name"]))
	{ 
	
	$user_name = $_REQUEST["user_name"]; 
	$results["user_name"] = $user_name;
	if(strlen($_REQUEST["user_name"]) > 5)
		{
		$sql = "select user_name from accounts where user_name = ?";
		$params = array();
		$params[count($params)] = $user_name;
		$res = sql_shell($sql, $params, $path);
		$results["user_name_found"] = 0;
		$results["ws_message"] = "User name [".$user_name."] accepted.";
		if($res["rowcount"] != 0)
			{ 
			$results["user_name_found"] = 1; 
			$results["ws_msg"] = "User name [".$user_name."] is not available.";
			}
		$results["ws_status"] = "success";
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "User name must contain at least six characters.";	
		}
	}
else
	{
	$results["ws_status"] = "failed";
	$results["ws_msg"] = "User name not provided. User name is a required input.";	
	}
?>