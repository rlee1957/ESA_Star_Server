<?php

$sql = "select individual_id from individuals where full_name = ? and birth_date = ?;";
$params = array();
$params[count($params)] = $full_name;
$params[count($params)] = $birth_date;
$result = sql_shell($sql, $params, $path);
$does_individual_exist = false;
$individual_id = "";
if($result["rowcount"] > 0)
	{
	$does_individual_exist = true;
	$individual_id = $result["recordset"][0]["individual_id"];
	}
	
?>