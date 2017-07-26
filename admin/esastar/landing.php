<?php

$p = getcwd()."/";
$pa = explode("/", $p);
$path = "/".$pa[1]."/".$pa[2]."/".$pa[3]."/";
#echo($path);
#exit();
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
	include($path."admin/esastar/includes/login.php");	
	}

?>
