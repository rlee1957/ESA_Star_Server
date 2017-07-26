<?php

$name_suffix = "";
if(isset($_REQUEST["name_suffix"]))
	{
	$name_suffix = $_REQUEST["name_suffix"];
	$individual_id = "";
	if(isset($_REQUEST["individual_id"]))
		{
		$individual_id = $_REQUEST["individual_id"];
		$sql = "update individuals set name_suffix=? where individual_id=?;";
		$params = array();
		$params[count($params)] = $name_suffix;
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