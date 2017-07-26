<?php

# Device Security
#echo("security1.php<br />");
$security["description"] .= date("Y-m-d H:i:s")." ~ Detecting device;<br />";
include($path."includes/security_get_device_info.php");
$device_id = NULL;
if($device_info != "")
	{
	$security["device"] = $device_info;
	include($path."includes/security_device_get_id.php");
	if($device_id == 0)
		{ 
		include($path."includes/security_device_insert.php"); 
		include($path."includes/security_device_get_id.php"); 
		}
	else
		{
		include($path."includes/security_check_blacklist.php");
		if($result["rowcount"] > 0)
			{
			$results["ws_status"] = "failed";
			$results["ws_msg"] = "This device has been blacklisted.";
			$security["request_status"] = "failed";
			$security["status_msg"] = "This device has been blacklisted.";
			$security["description"] .= "Device ID: ".$device_id."; Device Info: |".$device_info."|; Has been blacklisted and is not allowed access.<br />";
			}
		}
	$security["device_info"] = $device_info;
	$security["device_id"] = $device_id;
	}
else
	{
	$security["device_info"] = "No device information available";	
	}
$security["description"] .= "Device Information: ".$security["device_info"]."<br />";
$security["description"] .= "Device ID: ".$security["device_id"]."<br />";
/* TEMPORARY CODE FOR TESTING 
echo(json_encode($results));
/* END TEMPORARY CODE FOR TESTING */

?>
