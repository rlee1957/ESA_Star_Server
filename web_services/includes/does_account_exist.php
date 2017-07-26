<?php

$sql = "select account_id from accounts where individual_id = ?;";
$params = array();
$params[count($params)] = $individual_id;
$result = sql_shell($sql, $params, $path);
$does_account_exist = false;
$account_id = "";
if($result["rowcount"] > 0)
	{
	$does_account_exist = true;
	$account_id = $result["recordset"][0]["account_id"];
	}

?>