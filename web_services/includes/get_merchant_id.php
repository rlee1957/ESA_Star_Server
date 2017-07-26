<?php

$sql = "select merchant_id from merchants where merchant_name = ? and date_added = ?;";
$params = array();
$params[count($params)] = $merchant_name;
$params[count($params)] = $datetimestamp;
$result = sql_shell($sql, $params, $path);
$merchant_id = $result["recordset"][0]["merchant_id"];

?>