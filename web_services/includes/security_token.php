<?php

#echo("security_token.php<br />");
$security_token = $_REQUEST["security_token"];
if(strpos($security_token, "|"))
	{
	$st = explode("|", $security_token);
	$sql = "
	select 
		user_name, 
		key_value,
		token,
		AES_ENCRYPT(?, UNHEX(SHA2(?, 512))) as provided_token
	from 
		security_keys 
	where 
		user_name = ?;
	";
	$params = array();
	$params[] = $st[0];
	$params[] = $st[1];
	$params[] = $security["username"];
	$result = sql_shell($sql, $params, $path, "security_credentials");
	#echo("<textarea style='width: 100%; height: 300px;'");
	#print_r($result);
	#echo("</textarea>");
	if($result["rowcount"] > 0)
		{
		if($result["recordset"][0]["token"] == $result["recordset"][0]["provided_token"])
			{
			$username = $result["recordset"][0]["user_name"];
			$security_key = $result["recordset"][0]["key_value"];
			$security["description"] .= "Security succeeded, username found and token accepted, security keys dispensed<br />";
			}
		else
			{
			$results["ws_status"] = "failed";
			$results["ws_msg"] = "Invalid Token.";
			$security["request_status"] = $results["ws_status"];
			$security["status_msg"] = $results["ws_msg"];
			$security["description"] .= "Security failed, invalid token.<br />";	
			}
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "User name not found.";
		$security["request_status"] = $results["ws_status"];
		$security["status_msg"] = $results["ws_msg"];
		$security["description"] .= "Security failed, user name not found.<br />";
		}
	}
else
	{
	$results["ws_status"] = "failed";
	$results["ws_msg"] = "Invalid Token.";
	$security["request_status"] = $results["ws_status"];
	$security["status_msg"] = $results["ws_msg"];
	$security["description"] .= "Security failed, invalid token.<br />";	
	}
	
?>