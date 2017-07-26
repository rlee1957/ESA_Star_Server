<?php

include($path."database/merchant_tracking.php");
$atb = "adding to blacklist.";
if(!isset($_REQUEST["tracking_id"]))
	{
	$results["ws_status"] = "failed";
	$results["ws_msg"] = "Tracking Identification not provided ~ possible invasion ".$atb;
	}
else
	{
	if(!isset($_REQUEST["merchant_id"]))
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "Merchant Identification not provided ~ unauthorized ".$atb;
		include($path."includes/add_to_blacklist.php");
		}
	else
		{
		if($_REQUEST["tracking_id"] != $tracking_id)
			{
			$results["ws_status"] = "failed";
			$results["ws_msg"] = "Tracking Identification failed ~ unauthorized ".$atb;
			include($path."includes/add_to_blacklist.php");
			}
		else
			{
			if($_REQUEST["merchant_id"] != $merchant_id)
				{
				$results["ws_status"] = "failed";
				$results["ws_msg"] = "Merchant Identification failed ~ unauthorized ".$atb;
				include($path."includes/add_to_blacklist.php");
				}
			else
				{
				$results["ws_status"] = "success";
				$results["ws_msg"] = "";	
				}	
			}
		}
	}


?>