<?php

$sql = "insert into merchants (parent_id, merchant_name, merchant_description, date_added, status) values (?, ?, ?);";
$params = array();
$params[count($params)] = $parent_id;
$params[count($params)] = $merchant_name;
$params[count($params)] = $merchant_description;
$params[count($params)] = $datetimestamp;
$params[count($params)] = $status;
$result = exe_shell($sql, $params, $path);
// include("includes/show_results.php");

?>
