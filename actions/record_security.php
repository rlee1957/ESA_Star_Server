<?php

include($path."/framework/_show_errors.php");
include($path."/framework/_start_session.php");
$_SESSION["security"] = json_decode($_REQUEST["result"]);
echo("<textarea style='width: 100%; height: 300px;'>");
print_r($_SESSION);
echo("</textarea>");

?>
