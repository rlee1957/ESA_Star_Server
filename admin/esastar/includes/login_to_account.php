<?php

$username_id = "";
if(isset($_REQUEST["username_id"])){ $username_id = $_REQUEST["username_id"]; }
$results["username_id"] = $username_id;
$password_id = "";
if(isset($_REQUEST["password_id"])){ $password_id = $_REQUEST["password_id"]; }
$results["password_id"] = $password_id;
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
		$sql = "select password from accounts where user_name = ?";
		$params = array();
		$params[count($params)] = $user_name;
		$res = sql_shell($sql, $params, $path);
		if($res["rowcount"] != 0)
			{
			if($res["recordset"][0]["password"] == $password)
				{
				$results["login_status"] = 1;
				$results["login_msg"] = "Login accepted.";
				}
			else
				{
				$results["login_status"] = 0;
				$results["login_msg"] = "Wrong password.";
				}
			}
		else
			{
			$results["login_status"] = 0;
			$results["login_msg"] = "Username not found.";	
			}
		$results["ws_status"] = "success";
		$results["ws_msg"] = "";
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