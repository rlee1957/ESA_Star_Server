<?php

#echo("security_credentials.php<br />");
$account_security = array();
$account_security["user_name"] = $security["username"];
$account_security["password"] = "";
if(isset($_REQUEST["password"]))
	{ $account_security["password"] = $_REQUEST["password"]; }
else
	{
	$results["ws_status"] = "failed";
	$results["ws_msg"] = "No password provided.";
	$security["request_status"] = $results["ws_status"];
	$security["status_msg"] = $results["ws_msg"];
	$security["description"] .= "Security failed, no password provided.<br />";		
	}
if($results["ws_status"] == "")
	{
	$account_security["pin"] = "";
	if(isset($_REQUEST["pin"]))
		{ $account_security["pin"] = $_REQUEST["pin"]; }
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "No personal identification number provided.";
		$security["request_status"] = $results["ws_status"];
		$security["status_msg"] = $results["ws_msg"];
		$security["description"] .= "Security failed, no personal identification number provided.<br />";		
		}
	}
if($results["ws_status"] == "")
	{
	$sql = "
select 
	user_name, 
	key_value,
	token
from 
	security_keys 
where 
	user_name = ?;
	";
	$params = array();
	$params[] = $account_security["user_name"];
	$result = sql_shell($sql, $params, $path, "security_credentials");
	if($result["rowcount"] > 0)
		{
		$creds = $result["recordset"][0];
		$security["security_token"] = $creds["token"];
		$sql = "
	select
		account_id,
		user_name,
		AES_DECRYPT(password, ?) as password,
		AES_DECRYPT(pin, ?) as pin
	from
		account
	where
		user_name = ?
	";
		$params = array();
		$params[] = $creds["key_value"];
		$params[] = $creds["key_value"];
		$params[] = $creds["user_name"];
		$result = sql_shell($sql, $params, $path, "esa_credentials");
		
		if($result["rowcount"] > 0)
			{
			$account_credentials = $result["recordset"][0];
			if($account_security["password"] == $account_credentials["password"])
				{
				if($account_security["pin"] == $account_credentials["pin"])
					{
					}	
				else
					{
					$results["ws_status"] = "failed";
					$results["ws_msg"] = "PIN failed.";
					$security["request_status"] = $results["ws_status"];
					$security["status_msg"] = $results["ws_msg"];
					$security["description"] .= "PIN failed.<br />";	
					}				
				}			
			else
				{
				$results["ws_status"] = "failed";
				$results["ws_msg"] = "Password failed.";
				$security["request_status"] = $results["ws_status"];
				$security["status_msg"] = $results["ws_msg"];
				$security["description"] .= "Password failed.<br />";	
				}
			}
		else
			{
			$results["ws_status"] = "failed";
			$results["ws_msg"] = "User name not found in ESA.";
			$security["request_status"] = $results["ws_status"];
			$security["status_msg"] = $results["ws_msg"];
			$security["description"] .= "Security failed, user name not found in ESA database.<br />";	
			}
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "User name not found in security.";
		$security["request_status"] = $results["ws_status"];
		$security["status_msg"] = $results["ws_msg"];
		$security["description"] .= "Security failed, user name not found in security database.<br />";
		}
	}
	
?>