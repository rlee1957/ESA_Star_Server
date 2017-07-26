<?php

$preferred_name = "";
if(isset($_REQUEST["preferred_name"]))
	{
	$preferred_name = $_REQUEST["preferred_name"];
	$individual_id = "";
	if(isset($_REQUEST["individual_id"]))
		{
		$individual_id = $_REQUEST["individual_id"];
		$sql = "update individuals set preferred_name=? where individual_id=?;";
		$params = array();
		$params[count($params)] = $preferred_name;
		$params[count($params)] = $individual_id;
		$result = exe_shell($sql, $params, $path);
		$results["ws_status"] = "success";
		$results["ws_msg"] = "";
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "Individual ID not specified. Individual ID is a required input.";	
		}
	}

?>