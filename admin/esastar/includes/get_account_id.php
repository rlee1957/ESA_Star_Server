<?php

$sql = "select account_id from accounts where individual_id = ? and user_name = ? and password = ? and date_created = ?;";
$params = array();
$params[count($params)] = $individual_id;
$params[count($params)] = $user_name;
$params[count($params)] = $password;
$params[count($params)] = $datetimestamp;
$result = sql_shell($sql, $params, $path);
$account_id = $result["recordset"][0]["account_id"];

?>