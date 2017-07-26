<?php

#echo("security_device_insert.php<br />");
$sql = "insert into devices	(device_info) values (?);";
$params = array();
$params[] = $device_info;
$result = exe_shell($sql, $params, $path, "security_credentials");

?>