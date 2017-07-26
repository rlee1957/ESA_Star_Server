<?php

#echo("security_log.php<br />");
$sql = "
insert into security_log (kid, service, device, application, username, request_status, status_msg, description, results, log_date) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
$params = array();
$params[] = $security["kid"];
$params[] = $security["service"];
$params[] = $security["device"];
$params[] = $security["application"];
$params[] = $security["username"];
$params[] = $security["request_status"];
$params[] = $security["status_msg"];
$params[] = $security["description"];
$params[] = $security["results"];
$params[] = $security["log_date"];
$result = exe_shell($sql, $params, $path, "security_credentials");
#echo("<textarea style='width: 100%; height: 300px;'>");
#print_r($result);
#echo("</textarea>");

?>