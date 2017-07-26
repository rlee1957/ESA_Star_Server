<?php

$path = "";
include($path."includes/treeview_prep.php");
$merchant_id = $_REQUEST["merchant_id"];
include($path."includes/check_room_information.php");
if($show_administration)
	{
	include("includes/mr_administer.php");	
	}
else
	{
	include("includes/mr_main.php");		
	}

?>
