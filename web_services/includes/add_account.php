<?php

$sql = "insert into accounts (individual_id, user_name, password, date_created) values (?, ?, ?, ?);";
$params = array();
$params[count($params)] = $individual_id;
$params[count($params)] = $user_name;
$params[count($params)] = $password;
$params[count($params)] = $datetimestamp;
$result = exe_shell($sql, $params, $path);
//include("includes/show_results.php");

?>