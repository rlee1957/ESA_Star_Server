<?php

$first_name = "";
if(isset($_REQUEST["first_name"]))
	{
	$first_name = $_REQUEST["first_name"];
	$individual_id = "";
	if(isset($_REQUEST["individual_id"]))
		{
		$individual_id = $_REQUEST["individual_id"];
		$sql = "update individuals set first_name=? where individual_id=?;";
		$params = array();
		$params[count($params)] = $first_name;
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