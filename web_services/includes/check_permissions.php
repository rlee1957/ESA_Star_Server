<?php

#echo("check_permissions.php<br />");
$sql = "
select
	sa.account_id,
	a.user_name,
	ap.application_id,
	ap.application_name,
	r.role_id,
	r.role_name,
	p.full_name,
	p.birth_date
from
	system_administrator sa
join
	applications ap on ap.application_name = ?
join 
	role r on r.role_id = 1
join 
	account a on sa.account_id = a.account_id
join 
	people p on a.person_id = p.people_id
where
	a.user_name = ?
";
$params = array();
$params[] = $security["application"];
$params[] = $security["username"];
$res = sql_shell($sql, $params, $path, "esa_credentials");
if($res["rowcount"] != 0)
	{ 
	$results["account_id"] = $res["recordset"][0]["account_id"]; 
	$results["user_name"] = $res["recordset"][0]["user_name"];
	$results["application_id"] = $res["recordset"][0]["application_id"]; 
	$results["application_name"] = $res["recordset"][0]["application_name"]; 
	$results["role_id"] = $res["recordset"][0]["role_id"]; 
	$results["role_name"] = $res["recordset"][0]["role_name"];
	$results["security_token"] = $results["user_name"]."|".$res["recordset"][0]["full_name"]." ".$res["recordset"][0]["birth_date"]." ".$results["user_name"];
	$results["permission"] = "Identified in the system_administrator table.";
	}
else
	{
	$sql = "
select
	aar.account_id,
	a.user_name,
	ap.application_id,
	ap.application_name,
	r.role_id,
	r.role_name,
	p.full_name,
	p.birth_date
from
	acct_app_roles aar
join
	application_roles ar on aar.arid = ar.arid
join 
	role r on ar.role_id = r.role_id
join	
	account a on aar.account_id = a.account_id
join
	applications ap on ar.application_id = ap.application_id
join
	people p on a.person_id = p.people_id
where
	a.user_name = ? and
	ap.application_name = ?	
";
	$params = array();
	$params[] = $security["username"];
	$params[] = $security["application"];
	$res = sql_shell($sql, $params, $path, "esa_credentials");
	if($res["rowcount"] > 0)
		{ 
		$results["account_id"] = $res["recordset"][0]["account_id"]; 
		$results["user_name"] = $res["recordset"][0]["user_name"];
		$results["application_id"] = $res["recordset"][0]["application_id"]; 
		$results["application_name"] = $res["recordset"][0]["application_name"]; 
		$results["role_id"] = $res["recordset"][0]["role_id"]; 
		$results["role_name"] = $res["recordset"][0]["role_name"];
		$results["security_token"] = $results["user_name"]."|".$res["recordset"][0]["full_name"]." ".$res["recordset"][0]["birth_date"]." ".$results["user_name"];
		$results["permission"] = "Identified in the acct_app_roles table.";
		#echo("<textarea style='width: 100%; height: 300px;'>");
		#print_r($results);
		#echo("</textarea>");
		}
	else
		{
		$results["ws_status"] = "failed";
		$results["ws_msg"] = "User [".$security["username"]."] has not been authorized to access [".$security["application"]."].";
		$security["request_status"] = $results["ws_status"];
		$security["status_msg"] = $results["ws_msg"];
		$security["description"] .= "Insuficient permissions and authority.<br />";	
		}
	}
?>