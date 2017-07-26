<?php

$path = getcwd()."/";
echo($path);
exit();
ini_set('display_errors',1);  
error_reporting(E_ALL);

$page = "login";
include($path."framework/_show_errors.php");
include($path."framework/_session_start.php");


include($path."security/_master_key.php");
include($path."security/creds_esastar_admin.php");
if((isset($_SESSION["logged_on"]))&&($_SESSION["logged_on"]))
	{
	
	$params["username"] = $_SESSION["username"];
	$params["security_key"] = $_SESSION["security_key"];
	}
else
	{
	$application_name = "ESA-Star Administration Application";
	include($path."templates/random-login-form/login3.php");	
	}
#include($path."/templates/random-login-form/index.php");

?>
<!--
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/stylz.css">
<title>ESA-Star</title>
</head>

<body>
<div class=sheet>
</div>
<div class=explain>
</div>
</body>

</html>
-->