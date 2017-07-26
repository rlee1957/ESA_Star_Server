<?php

$user_name = "";
if(isset($_REQUEST["user_name"]))
	{
	$user_name = $_REQUEST["user_name"];
	$account_id = "";
	if(isset($_REQUEST["account_id"]))
		{
		$account_id = $_REQUEST["account_id"];
		$sql = "update accounts set user_name=? where account_id=?;";
		$params = array();
		$params[count($params)] = $user_name;
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
	$results["ws_msg"] = "User Name not specified. User Name is a required input.";
	}

?>