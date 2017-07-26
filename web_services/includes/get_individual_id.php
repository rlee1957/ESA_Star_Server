<?php

$sql = "select individual_id from individuals where full_name = ? and birth_date = ? and date_created = ?;";
$params = array();
$params[count($params)] = $full_name;
$params[count($params)] = $birth_date;
$params[count($params)] = $datetimestamp;
$result = sql_shell($sql, $params, $path);
$individual_id = $result["recordset"][0]["individual_id"];

?>