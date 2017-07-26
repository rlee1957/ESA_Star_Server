<?php

#echo("security_check_blacklist.php<br />");
$sql = "
select 
	did 
from 
	devices 
where 
	device_info = ? and 
	did in (select did from blacklist);
";
$params = array();
$params[] = $device_id;
$result = sql_shell($sql, $params, $path, "security_credentials");

?>