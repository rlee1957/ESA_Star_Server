<?php

$sql = "SELECT LAST_INSERT_ID() as id;";
$params = array();
$result = sql_shell($sql, $params, $path);
$last_id = $result["recordset"][0]["id"];

?>