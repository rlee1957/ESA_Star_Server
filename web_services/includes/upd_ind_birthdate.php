<?php

$birth_date = "";
if(isset($_REQUEST["birth_date"]))
	{
	$birth_date = $_REQUEST["birth_date"];
	$individual_id = "";
	if(isset($_REQUEST["individual_id"]))
		{
		$individual_id = $_REQUEST["individual_id"];
		$sql = "update individuals set birth_date=? where individual_id=?;";
		$params = array();
		$params[count($params)] = $birth_date;
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