<?php

$passthrough = "";
if(isset($_REQUEST["passthrough"])){ $passthrough = $_REQUEST["passthrough"]; }
$results["passthrough"] = $passthrough;
$merchant_name = "";
if(isset($_REQUEST["merchant_name"]))
	{
	$merchant_name = $_REQUEST["merchant_name"];
	$results["merchant_name"] = $merchant_name;
	include("includes/does_merchant_exist.php");
	$results["does_merchant_exist"] = $does_merchant_exist;
	if(!$does_merchant_exist)
		{
		$merchant_description = "";
		if(isset($_REQUEST["merchant_description"]))
			{
			$merchant_description = $_REQUEST["merchant_description"];
			$results["merchant_description"] = $merchant_description;
			$status = "";			
			if(isset($_REQUEST["status"]))
				{
				$status = $_REQUEST["status"];
				$parent_id = null;			
				if(isset($_REQUEST["parent_id"]))
					{
					$parent_id = $_REQUEST["parent_id"];
					include("includes/add_merchant.php");
					include("includes/get_merchant_id.php");				
					$results["merchant_id"] = $merchant_id;
					}
				else
					{
					$results["ws_status"] =	"failed";
					$results["ws_msg"] =	"Parent ID not specified. Parent ID is required input.";		
					}
				}
			else
				{
				$results["ws_status"] =	"failed";
				$results["ws_msg"] =	"Status not specified. Status is required input.";		
				}
			}
		else
			{
			$results["ws_status"] =	"failed";
			$results["ws_msg"] =	"Merchant Description not specified. Merchant Description is required input.";	
			}
		}
	else
		{
		$results["ws_status"] =	"failed";
		$results["ws_msg"] = "Merchant Name already exists. Merchant Name must be unique.";
		}
	}
else
	{
	$results["ws_status"] =	"failed";
	$results["ws_msg"] =	"Merchant name not specified. Merchant name is required input.";	
	}

?>