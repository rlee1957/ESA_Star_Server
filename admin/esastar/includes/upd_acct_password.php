<?php

$password = "";
if(isset($_REQUEST["password"]))
	{
	$password = $_REQUEST["password"];
	$account_id = "";
	if(isset($_REQUEST["account_id"]))
		{
		$account_id = $_REQUEST["account_id"];
		$sql = "update accounts set password=? where account_id=?;";
		$params = array();
		$params[count($params)] = $password;
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
	$results["ws_msg"] = "Password not specified. Password is a required input.";
	}

?>