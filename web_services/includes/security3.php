<?php

#echo("security3.php<br />");
if(($service_name != "add_account1")&&
    ($service_name != "check_username"))
	{
	if(!is_null($security["username"]))
		{
		if(isset($_REQUEST["security_token"]))
			{
			include("includes/security_token.php");
			}
		else
			{
			include("includes/security_credentials.php");	
			}
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "User name not provided.";
		$security["request_status"] = $results["ws_status"];
		$security["status_msg"] = $results["ws_msg"];
		$security["description"] .= "Security failed, user name not provided<br />";	
		}
	}

?>