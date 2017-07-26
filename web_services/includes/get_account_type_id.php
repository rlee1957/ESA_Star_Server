<?php

$sql = "select account_type_id from account_types where account_type = ?;";
$params = array();
$params[count($params)] = $account_type;
$result = sql_shell($sql, $params, $path);
$account_type_id = $result["recordset"][0]["account_type_id"];

?>