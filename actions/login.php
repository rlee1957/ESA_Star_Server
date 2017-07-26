<?php

include($path."/framework/_show_errors.php");
include($path."/framework/_start_session.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ESA-Star</title>
<link rel="stylesheet" type="text/css" href="/css/modal_dialog.css" />
</head>
<body>
<a href="https://www.esastar.com/web_services/web_service.php">test link</a><br /><br />
<form target="_self" method="get" action="https://www.esastar.com/web_services/web_service.php"><input type=submit value=get /></form>
<form target="_self" method="post" action="https://www.esastar.com/web_services/web_service.php"><input type=submit value=post /></form>
</body>

</html>