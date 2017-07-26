<?php

#echo("security_device_get_id.php<br />");
$sql = "
select 
	did 
from 
	devices 
where 
	device_info = ?;
";
$params = array();
$params[] = $device_info;
$result = sql_shell($sql, $params, $path, "security_credentials");
if($result["rowcount"] > 0){ $device_id = $result["recordset"][0]["did"]; }
else{ $device_id = 0; }

?>