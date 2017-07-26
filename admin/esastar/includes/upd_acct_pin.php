<?php

$pin = "";
if(isset($_REQUEST["pin"]))
	{
	$pin = $_REQUEST["pin"];
	$account_id = "";
	if(isset($_REQUEST["account_id"]))
		{
		$account_id = $_REQUEST["account_id"];
		$sql = "update accounts set pin=? where account_id=?;";
		$params = array();
		$params[count($params)] = $pin;
		$params[count($params)] = $account_id;
		$result = exe_shell($sql, $params, $path);
		$results["ws_status"] = "success";
		$results["ws_msg"] = "";
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "Account ID not specified. Account ID is a required input.";	
		}
	}
else
	{
	$results["ws_status"] = "failed";
	$results["ws_msg"] = "PIN not specified. PIN is a required input.";
	}

?>