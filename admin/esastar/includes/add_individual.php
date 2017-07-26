<?php

$sql = "insert into individuals (full_name, birth_date, date_created) values (?, ?, ?);";
$params = array();
$params[count($params)] = $full_name;
$params[count($params)] = $birth_date;
$params[count($params)] = $datetimestamp;
$result = exe_shell($sql, $params, $path);
// include("includes/show_results.php");


?>