<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
$path = "";
include($path."database/sql_functions.php");
include($path."functions/tree_functions.php");
$htm = get_merchant_tree($path);
echo($htm);

?>