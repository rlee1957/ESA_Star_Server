<?php

$sql = "select merchant_id from merchants where merchant_name = ?;";
$params = array();
$params[count($params)] = $merchant_name;
$result = sql_shell($sql, $params, $path);
$does_merchant_exist = false;
$merchant_id = "";
if($result["rowcount"] > 0)
	{
	$does_merchant_exist = true;
	$merchant_id = $result["recordset"][0]["merchant_id"];
	}
	
?>