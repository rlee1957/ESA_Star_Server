<?php

$username_id = "";
if(isset($_REQUEST["username_id"])){ $username_id = $_REQUEST["username_id"]; }
$results["username_id"] = $username_id;
$password_id = "";
if(isset($_REQUEST["password_id"])){ $password_id = $_REQUEST["password_id"]; }
$results["password_id"] = $password_id;
$pid_id = "";
if(isset($_REQUEST["pid_id"])){ $pid_id = $_REQUEST["pid_id"]; }
$results["pid_id"] = $pid_id;
$passthrough = "";
if(isset($_REQUEST["passthrough"])){ $passthrough = $_REQUEST["passthrough"]; }
$results["passthrough"] = $passthrough;
$user_name = "";
if(isset($_REQUEST["user_name"]))
	{
	$user_name = $_REQUEST["user_name"];
	$results["user_name"] = $user_name;
	$password = "";
	if(isset($_REQUEST["password"]))
		{
		$password = $_REQUEST["password"];
		$results["password"] = $password;
		$pin = "";
		if(isset($_REQUEST["pin"]))
			{
			$pin = $_REQUEST["pin"];
			$results["pin"] = $pin;
			$sql = "
select 
	user_name,
	key_value,
	token
from 
	security_keys 
where 
	user_name = ?
";
			$params = array();
			$params[count($params)] = $user_name;
			$res = sql_shell($sql, $params, $path, "security_credentials");
			if($res["rowcount"] != 0)
				{
				$security_info = $res["recordset"][0];
				$sql = "
select	
	user_name,
	AES_DECRYPT(password, ?) as password,
	AES_DECRYPT(pin, ?) as pin
where
	user_name = ?
";
				$params = array();
				$params[count($params)] = $security_info["key_value"];
				$params[count($params)] = $security_info["key_value"];
				$params[count($params)] = $user_name;
				$res = sql_shell($sql, $params, $path, "esa_credentials");
				if($res["rowcount"] != 0)
					{
					$creds = $res["recordset"][0];
					if($password == $creds["password"])
						{
						if($pin == $creds["pin"])
							{
							$results["login_status"] = 1;
							$results["login_msg"] = "Login successful. Security keys dispensed.";	
							$_SESSION["security_info"] = $security_info;
							$_SESSION["login_status"] = "success";
							}	
						else
							{
							$results["login_status"] = 0;
							$results["login_msg"] = "Pin did not match.";	
							}
						}
					else
						{
						$results["login_status"] = 0;
						$results["login_msg"] = "Password did not match.";	
						}
					}
				else
					{
					$results["login_status"] = 0;
					$results["login_msg"] = "Username not found.";
					}
				}
			else
				{
				$results["login_status"] = 0;
				$results["login_msg"] = "Username not found.";
				}
			}
		else
			{
			$results["ws_status"] = "failed";
			$results["ws_msg"] = "Pin not specified. Pin is a required input.";	
			}
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "Password not specified. Password is a required input.";	
		}
	}
else
	{
	$results["ws_status"] = "failed";
	$results["ws_msg"] = "User name not specified. User name is a required input.";
	}

?>