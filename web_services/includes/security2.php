<?php

# Application Security
#echo("security2.php<br />");
/* TEMPORARY CODE FOR TESTING 
error_reporting(E_ALL);
ini_set('display_errors', '1');
$path = "../";
$results["ws_status"] = "";
$results["ws_msg"] = "";
include($path."database/sql_functions.php");
/* END TEMPORARY CODE FOR TESTING */

include($path."includes/security1.php");
if($results["ws_status"] == "")
	{
	$application_name = "";
	$application_key = "";
	$proceed = true;
	if(isset($_REQUEST["application_name"]))
		{ 
		$application_name = $_REQUEST["application_name"]; 
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "Unspecified application name";
		$security["request_status"] = $results["ws_status"];
		$security["status_msg"] = $results["ws_msg"];
		$security["description"] .= "Security failed, unspecified application name.<br />";
		$proceed = false;	
		}
	if($proceed)
		{
		$sql = "
select 
	application_name, 
	AES_DECRYPT(application_key, UNHEX(SHA2(application_name, 512))) as apkey 
from 
	application_keys 
where 
	application_name = ?;
";
		$params = array();
		$params[] = $application_name;
		$result = sql_shell($sql, $params, $path, "security_credentials");
		if($result["rowcount"] > 0)
			{
			if(isset($_REQUEST["application_key"]))
				{ 
				$application_key = $_REQUEST["application_key"]; 
				if($result["recordset"][0]["apkey"] != $application_key)
					{
					$results["ws_status"] = "failed";
					$results["ws_msg"] = "Unrecognized application key";
					$security["request_status"] = $results["ws_status"];
					$security["status_msg"] = $results["ws_msg"];
					$security["description"] .= "Security failed, unrecognized application key.<br />";
					}
				}
			else
				{
				$results["ws_status"] = "failed";
				$results["ws_msg"] = "No application key provided";
				$security["request_status"] = $results["ws_status"];
				$security["status_msg"] = $results["ws_msg"];
				$security["description"] .= "Security failed, no application key provided.<br />";
				$proceed = false;		
				}
			}
		else
			{
			$results["ws_status"] = "failed";
			$results["ws_msg"] = "Unauthorized application name";	
			$security["request_status"] = $results["ws_status"];
			$security["status_msg"] = $results["ws_msg"];
			$security["description"] .= "Security failed, unauthorized application name.<br />";
			}
		}
	}
$security["description"] .= "Application Name: ".$application_name."<br />";
$security["description"] .= "Application Key: ".$application_key."<br />";
/* TEMPORARY CODE FOR TESTING 
echo(json_encode($results));
 END TEMPORARY CODE FOR TESTING */
	
?>