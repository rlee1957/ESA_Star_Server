<?php

$merchant_id = "";
if(isset($_REQUEST["merchant_id"]))
	{
	$merchant_id = $_REQUEST["merchant_id"];
	$merchant_name = "";
	if(isset($_REQUEST["merchant_name"]))
		{
		$merchant_name = $_REQUEST["merchant_name"];
		
		$merchant_description = "";
		if(isset($_REQUEST["merchant_description"]))
			{
			$merchant_description = $_REQUEST["merchant_description"];
			$status = "";
			if(isset($_REQUEST["status"]))
				{
				$status = $_REQUEST["status"];
				$sql = "update merchants set merchant_name=?, merchant_description=?, status=? where merchant_id=?;";
				$params = array();
				$params[count($params)] = $merchant_name;
				$params[count($params)] = $merchant_description;
				$params[count($params)] = $status;
				$params[count($params)] = $merchant_id;
				$result = exe_shell($sql, $params, $path);
				$results["ws_status"] = "success";
				$results["ws_msg"] = "";
				}
			else
				{
				$results["ws_status"] = "failed";
				$results["ws_msg"] = "Status not specified. Status is a required input.";		
				}
			}
		else
			{
			$results["ws_status"] = "failed";
			$results["ws_msg"] = "Merchant Description not specified. Merchant Description is a required input.";	
			}
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "Merchant Name not specified. Merchant Name is a required input.";	
		}
	}
else
	{
	$results["ws_status"] = "failed";
	$results["ws_msg"] = "Merchant ID not specified. Merchant ID is a required input.";	
	}

?>