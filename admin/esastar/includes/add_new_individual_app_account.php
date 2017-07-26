<?php

$sql = "insert into accounts (application_id, entity_type_id, entity_id, account_type_id, individual_id, user_name, password, date_created) values (?, ?, ?, ?, ?, ?, ?, ?);";
$params = array();
$params[count($params)] = $application_id;
$params[count($params)] = $entity_type_id;
$params[count($params)] = $entity_id;
$params[count($params)] = $account_type_id;
$params[count($params)] = $individual_id;
$params[count($params)] = $user_name;
$params[count($params)] = $password;
$params[count($params)] = $datetimestamp;
$result = exe_shell($sql, $params, $path);
include("includes/show_results.php");

?>