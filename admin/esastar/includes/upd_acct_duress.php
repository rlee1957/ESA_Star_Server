<?php

$duress_phrase = "";
if(isset($_REQUEST["duress_phrase"]))
	{
	$duress_phrase = $_REQUEST["duress_phrase"];
	$account_id = "";
	if(isset($_REQUEST["account_id"]))
		{
		$account_id = $_REQUEST["account_id"];
		$sql = "update accounts set duress_phrase=? where account_id=?;";
		$params = array();
		$params[count($params)] = $duress_phrase;
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

?>