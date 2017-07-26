<?php

$passthrough = "";
if(isset($_REQUEST["passthrough"])){ $passthrough = $_REQUEST["passthrough"]; }
$results["passthrough"] = $passthrough;
$full_name = "";
if(isset($_REQUEST["full_name"]))
	{
	$full_name = $_REQUEST["full_name"];
	$results["full_name"] = $full_name;
	$birth_date = "";
	if(isset($_REQUEST["birth_date"]))
		{
		$birth_date = $_REQUEST["birth_date"];
		$results["birth_date"] = $birth_date;
		$application_id = 2;
		$entity_type_id = 1; 
		$entity_id = 0; 
		$account_type_id = 3;
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
				include("includes/does_individual_exist.php");
				$results["does_individual_exist"] = $does_individual_exist;
				if(!$does_individual_exist)
					{
					include("includes/add_individual.php");
					include("includes/get_individual_id.php");				
					}
				$entity_id = $individual_id;
				$results["individual_id"] = $individual_id;
				include("includes/does_account_exist.php");
				$results["does_account_exist"] = $does_account_exist;
				if(!$does_account_exist)
					{
					include("includes/add_account.php");
					include("includes/get_account_id.php");
					}
				$results["account_id"] = $account_id;
				}
			else
				{
				$results["ws_status"] =	"failed";
				$results["ws_msg"] =	"Password not specified. Password is required input.";	
				}
			}
		else
			{
			$results["ws_status"] =	"failed";
			$results["ws_msg"] =	"User name not specified. User name is required input.";	
			}
		}
	else
		{
		$results["ws_status"] =	"failed";
		$results["ws_msg"] =	"Birth date not specified. Birth date is required input.";
		}	
	}
else
	{
	$results["ws_status"] =	"failed";
	$results["ws_msg"] =	"Full name not specified. Full name is required input.";
	}

?>