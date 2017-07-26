<?php

/* TEMPORARY CODE FOR TESTING */
error_reporting(E_ALL);
ini_set('display_errors', '1');
$path = "../";
$results["ws_status"] = "";
$results["ws_msg"] = "";
include($path."database/sql_functions.php");
/* END TEMPORARY CODE FOR TESTING 

echo("get_device_id.php<br />");
*/
include($path."includes/get_device_id.php");
if($results["ws_status"] == "")
	{
	$application_name = "";
	$application_key = "";
	$proceed = true;
	if(isset($_REQUEST["application_name"]))
		{ 
		$application_name = $_REQUEST["application_name"]; 
		if(isset($_REQUEST["application_key"]))
			{ $application_key = $_REQUEST["application_key"]; }
		else
			{
			$results["ws_status"] = "failed";
			$results["ws_msg"] = "Insufficiant application key";
			$proceed = false;		
			}
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "Unrecognized application name";
		$proceed = false;	
		}

	if($proceed)
		{
		$sql = "select application_name, AES_DECRYPT(application_key, application_name) as apkey from application_keys where application_name = ?;";
		$params = array();
		$params[] = $application_name;
		$result = sql_shell($sql, $params, $path, "security_credentials");
		echo("<textarea style='width: 99%; height: 300px;'>");
		print_r($result);
		echo("</textarea>");
		if($result["rowcount"] > 0)
			{
			if($result["recordset"][0]["apkey"] != $application_key)
				{
				$results["ws_status"] = "failed";
				$results["ws_msg"] = "Unauthorized application name";	
				}
			}
		else
			{
			$results["ws_status"] = "failed";
			$results["ws_msg"] = "Unauthorized application name";	
			}
		}
	}
echo(json_encode($results));
	
?>